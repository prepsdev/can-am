<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class VehicleController extends Controller
{
    public function index()
    {
        return view('admin.vehicle.index');
    }

    public function getData()
    {
        $data = Vehicle::orderBy('created_at', 'desc')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<a href="' . route('admin.vehicle.edit', $data->id) . '" class="btn btn-sm btn-primary">Edit</a> 
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
        return view('admin.vehicle.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'owner_id' => 'required',
            'vin' => 'required',
            'type' => 'required',
        ]);

        Vehicle::create([
            'customer_id'  => $request->owner_id,
            'vin' => $request->vin,
            'type' => $request->type,
        ]);
        return redirect()->route('admin.vehicle.index')->with('success', 'Vehicle added successfully.');
    }

    public function destroy($id)
    {
        $data = Vehicle::findOrFail($id);
        $data->delete();

        return response()->json(['success' => 'Data deleted successfully.']);
    }


    public function edit($id)
    {
        $data = Vehicle::find($id);
        return view('admin.vehicle.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);

        Vehicle::find($id)->update($request->all());
        return redirect()->route('admin.vehicle.index');
    }
}
