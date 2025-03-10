<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }

    public function getData()
    {
        $data = Product::orderBy('created_at', 'desc')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<a href="' . route('admin.product.edit', $data->id) . '" class="btn btn-sm btn-primary">Edit</a> 
                        <button class="btn btn-sm btn-danger btn-delete" data-id="' . $data->id . '">Delete</button>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:products',
            'type' => 'required',
            'name' => 'required'
        ]);

        Product::create($request->all());
        return redirect()->route('admin.product.index')->with('success', 'Product added successfully.');
    }

    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();

        return response()->json(['success' => 'Data deleted successfully.']);
    }


    public function edit($id)
    {
        $data = Product::find($id);
        return view('admin.product.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|unique:products',
            'type' => 'required',
            'name' => 'required'
        ]);

        Product::find($id)->update($request->all());
        return redirect()->route('admin.product.index');
    }
}
