<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Service;
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
                return '<a href="' . route('admin.service.edit', $data->id) . '" class="btn btn-sm btn-primary">Edit</a> 
                        <button class="btn btn-sm btn-danger btn-delete" data-id="' . $data->id . '">Delete</button>';
            })
            ->editColumn('owner', function ($data) {
                return $data->customer->name;
            })
            ->rawColumns(['action'])
            ->make(true);
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

        $service = Service::create([
            'customer_id' => $request->customer_id,
            'service_type' => $request->service_type,
            'schedule_date' => $request->schedule_date
        ]);
        return redirect()->route('admin.service.create.detail', ['id' => $service->id])->with('success', 'Service added successfully. Now add the details.');
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
}
