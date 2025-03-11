<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    public function index()
    {
        return view('admin.customer.index');
    }

    public function getData()
    {
        $data = Customer::orderBy('created_at', 'desc')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<a href="' . route('admin.customer.edit', $data->id) . '" class="btn btn-sm btn-primary">Edit</a> 
                        <button class="btn btn-sm btn-danger btn-delete" data-id="' . $data->id . '">Delete</button>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric|min:10',
        ]);

        Customer::create($request->all());
        return redirect()->route('admin.customer.index')->with('success', 'Customer added successfully.');
    }

    public function destroy($id)
    {
        $data = Customer::findOrFail($id);
        $data->delete();

        return response()->json(['success' => 'Data deleted successfully.']);
    }


    public function edit($id)
    {
        $data = Customer::find($id);
        return view('admin.customer.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric|min:10',
        ]);

        Customer::find($id)->update($request->all());
        return redirect()->route('admin.customer.index');
    }
}
