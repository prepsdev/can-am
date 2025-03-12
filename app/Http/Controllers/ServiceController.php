<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Service;
use App\Models\ServiceDetailAccecories;
use App\Models\ServiceDetails;
use App\Models\ServiceTrackers;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    public function index()
    {
        return view('admin.service.index');
    }

    public function getData()
    {
        $data = Service::orderBy('created_at', 'desc')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                $buttons = '<a href="' . route('admin.service.detail', $data->service_id) . '" class="btn btn-sm btn-info">Detail</a>';
                if ($data->status != 'Finished') {
                    $buttons .= ' <a href="' . route('admin.service.edit', $data->id) . '" class="btn btn-sm btn-primary">Edit</a> 
                                  <button class="btn btn-sm btn-danger btn-delete" data-id="' . $data->id . '">Delete</button>';
                }

                return $buttons;
            })
            ->editColumn('owner', function ($data) {
                return $data->customer->name;
            })
            ->editColumn('schedule_date', function ($data) {
                return $data->schedule_date->format('d F Y');
            })
            ->editColumn('status', function ($data) {
                if ($data->status == 'Mechanic Unassigned') {
                    return '<span class="badge bg-danger">' . $data->status . '</span>';
                } elseif ($data->status == 'Finished') {
                    return '<span class="badge bg-success">' . $data->status . '</span>';
                } else {
                    return '<span class="badge bg-warning">' . $data->status . '</span>';
                }
            })
            ->editColumn('price', function ($data) {
                if ($data->status == "Finished") {
                    $details = ServiceDetails::where('service_id', $data->service_id)->get();
                    $totalPrice = 0;
                    foreach ($details as $detail) {
                        $totalPrice += ($detail->jasa ?? 0) + ($detail->sparepart ?? 0) + ($detail->aksesoris ?? 0);
                    }
                    return 'Rp ' . number_format($totalPrice, 0, ',', '.');
                } else {
                    return "Not Finished Yet";
                }
            })
            ->editColumn('time', function ($data) {
                if ($data->status == "Finished") {
                    $tracker = ServiceTrackers::where('service_id', $data->service_id)->first();
                    $progress = Carbon::parse($tracker->progress);
                    $check = Carbon::parse($tracker->check);

                    $time = $progress->diff($check);
                    return $time;
                } else {
                    return "Not Finished Yet";
                }
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    public function getServiceTotal($id)
    {
        $serviceDetails = ServiceDetails::where('id', $id)->first();

        $totalPrice = 0;
        $totalPrice += optional($serviceDetails->oliMesin)->price ?? 0;
        $totalPrice += optional($serviceDetails->oliGardan)->price ?? 0;
        $totalPrice += optional($serviceDetails->oliGearBox)->price ?? 0;
        $totalPrice += optional($serviceDetails->breakCleaner)->price ?? 0;
        $totalPrice += optional($serviceDetails->carbuCleaner)->price ?? 0;
        $totalPrice += optional($serviceDetails->crushWasher)->price ?? 0;
        $totalPrice += optional($serviceDetails->busi)->price ?? 0;
        $totalPrice += optional($serviceDetails->oRingFilter)->price ?? 0;
        $totalPrice += optional($serviceDetails->filterOli)->price ?? 0;

        return response()->json(['total' => $totalPrice]);
    }

    public function create()
    {
        $customers = Customer::all();
        return view('admin.service.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'service_type' => 'required',
            'schedule_date' => 'required'
        ]);

        $data = Service::create([
            'customer_id' => $request->customer_id,
            'service_type' => $request->service_type,
            'schedule_date' => $request->schedule_date
        ]);

        ServiceTrackers::create([
            'service_id' => $data->service_id
        ]);
        return redirect()->route('admin.service.detail', ['id' => $data->service_id])->with('success', 'Service added successfully. Now add the details.');
    }

    public function destroy($id)
    {
        $data = Service::findOrFail($id);
        $data->delete();

        return response()->json(['success' => 'Data deleted successfully.']);
    }


    public function edit($id)
    {
        $data = Service::find($id);
        return view('admin.service.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|unique:services',
            'type' => 'required',
            'name' => 'required'
        ]);

        Service::find($id)->update($request->all());
        return redirect()->route('admin.service.index');
    }

    public function detail($id)
    {
        $registeredVehicleIds = ServiceDetails::where('service_id', $id)->pluck('vehicle_id')->toArray();

        $service = Service::where('service_id', $id)->first();
        $servicedetails = ServiceDetails::where('service_id', $id)->orderBy('created_at', 'desc')->get();
        $vehicles = Vehicle::where('customer_id', $service->customer_id)
            ->whereNotIn('id', $registeredVehicleIds)
            ->get();
        $mechanics = User::where('role', 'mechanic')->get();
        $curr = request()->segment(4);
        $oli_mesin = Product::where('type', 'Oli Mesin')->get();
        $oli_gardan = Product::where('type', 'Oli Gardan')->get();
        $oli_gear_box = Product::where('type', 'Oli Gear Box')->get();
        $break_cleaner = Product::where('type', 'Break Cleaner')->get();
        $carbu_cleaner = Product::where('type', 'Carbu Cleaner')->get();
        $crush_washer = Product::where('type', 'Crush Washer')->get();
        $busi = Product::where('type', 'Busi')->get();
        $o_ring_filter = Product::where('type', 'O Ring Filter')->get();
        $filter_oli = Product::where('type', 'Filter Oli')->get();
        $acc = Product::where('type', 'Aksesoris')->get();
        $tracker = ServiceTrackers::where('service_id', $id)->first();

        return view('admin.service.detail', compact('service', 'servicedetails', 'mechanics', 'curr', 'vehicles', 'oli_mesin', 'oli_gardan', 'oli_gear_box', 'break_cleaner', 'carbu_cleaner', 'crush_washer', 'busi', 'o_ring_filter', 'filter_oli', 'acc', 'tracker'));
    }

    public function selectMechanic(Request $request, $id)
    {
        $data = Service::where('service_id', $id)->firstOrFail();
        $data->update([
            'mechanic_id' => $request->mechanic_id,
            'status' => 'Waiting Mechanic',
        ]);

        return redirect()->route('admin.service.detail', ['id' => $id])->with('success', 'Mechanic selected successfully.');
    }

    public function addInformation(Request $request, $id)
    {
        $data = ServiceDetails::findOrFail($id);
        $data->update([
            'information' => $request->information,
        ]);

        return redirect()->route('admin.service.detail', ['id' => $data->service_id])->with('success', 'Information added successfully.');
    }

    public function storeDetail(Request $request, $id)
    {
        $request->validate([
            'vehicle_id' => 'required',
        ]);

        $serviceDetail = ServiceDetails::create([
            'service_id' => $id,
            'customer_id' => Service::where('service_id', $id)->first()->customer_id,
            'vehicle_id' => $request->vehicle_id,
            'oli_mesin' => $request->oli_mesin ?: null,
            'oli_gardan' => $request->oli_gardan ?: null,
            'oli_gear_box' => $request->oli_gear_box ?: null,
            'break_cleaner' => $request->break_cleaner ?: null,
            'carbu_cleaner' => $request->carbu_cleaner ?: null,
            'crush_washer' => $request->crush_washer ?: null,
            'busi' => $request->busi ?: null,
            'o_ring_filter' => $request->o_ring_filter ?: null,
            'filter_oli' => $request->filter_oli ?: null,
            'information' => $request->information ?: null,
        ]);

        if ($request->has('acc') && is_array($request->acc)) {
            foreach ($request->acc as $productId) {
                ServiceDetailAccecories::create([
                    'service_detail_id' => $serviceDetail->id,
                    'product_id' => $productId,
                ]);
            }
        }

        return redirect()->route('admin.service.detail', ['id' => $id])->with('success', 'Service details added successfully.');
    }

    public function deleteDetail($id)
    {
        $serviceDetail = ServiceDetails::findOrFail($id);
        $move = $serviceDetail->service_id;
        $serviceDetail->delete();

        ServiceDetailAccecories::where('service_detail_id', $id)->delete();

        return redirect()->route('admin.service.detail', ['id' => $move])->with('success', 'Service detail deleted successfully.');
    }

    public function onmywayService($serviceId)
    {
        $service = Service::where('service_id', $serviceId)->firstOrFail();

        $service->status = 'On Progress - On My Way';
        $service->save();

        $tracker = ServiceTrackers::where('service_id', $serviceId)->firstOrFail();

        $tracker->way = now();
        $tracker->save();

        return redirect()->route('admin.service.detail', ['id' => $serviceId])->with('success', 'You Are on our way!');
    }

    public function estimateService($serviceId)
    {
        $service = Service::where('service_id', $serviceId)->firstOrFail();

        $service->status = 'On Progress - Arrived';
        $service->save();

        $tracker = ServiceTrackers::where('service_id', $serviceId)->firstOrFail();

        $tracker->estimate = now();
        $tracker->save();

        return redirect()->route('admin.service.detail', ['id' => $serviceId])->with('success', 'You are just arrived.');
    }

    public function startService($serviceId)
    {
        $service = Service::where('service_id', $serviceId)->firstOrFail();

        $service->status = 'On Progress - Fixing';
        $service->save();

        $tracker = ServiceTrackers::where('service_id', $serviceId)->firstOrFail();

        $tracker->progress = now();
        $tracker->save();

        return redirect()->route('admin.service.detail', ['id' => $serviceId])->with('success', 'Service has been started successfully.');
    }

    public function finalService($serviceId)
    {
        $service = Service::where('service_id', $serviceId)->firstOrFail();

        $service->status = 'On Progress - Final Check';
        $service->save();

        $tracker = ServiceTrackers::where('service_id', $serviceId)->firstOrFail();

        $tracker->check = now();
        $tracker->save();

        return redirect()->route('admin.service.detail', ['id' => $serviceId])->with('success', 'Service is on final check.');
    }

    public function finishService($serviceId)
    {
        $service = Service::where('service_id', $serviceId)->firstOrFail();

        $service->status = 'Finished';
        $service->save();

        $tracker = ServiceTrackers::where('service_id', $serviceId)->firstOrFail();

        $tracker->finish = now();
        $tracker->save();

        return redirect()->route('admin.service.detail', ['id' => $serviceId])->with('success', 'Service has been finished successfully.');
    }

    public function payService(Request $request, $id)
    {
        $request->validate([
            'jasa' => 'required',
            'sparepart' => 'required',
            'aksesoris' => 'required'
        ]);

        $price_jasa = str_replace('.', '', str_replace('Rp ', '', $request->jasa));
        $price_aksesoris = str_replace('.', '', str_replace('Rp ', '', $request->aksesoris));

        $data = ServiceDetails::findOrFail($id);
        $data->update([
            'jasa'  => $price_jasa,
            'sparepart' => $request->sparepart,
            'aksesoris' => $price_aksesoris,
        ]);

        return redirect()->back()->with('success', 'Payment has been processed.');
    }
}
