<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DealerController extends Controller
{
    public function index()
    {
        return view('admin.dealer.index');
    }

    public function getData()
    {
        $data = Dealer::get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($user) {
                return '<a href="#" class="btn btn-sm btn-primary">Edit</a> 
                        <button class="btn btn-sm btn-danger" onclick="deleteDealer(' . $user->id . ')">Delete</button>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.dealer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);

        Dealer::create($request->all());
        return redirect()->route('admin.dealer.index');
    }

    public function delete($id)
    {
        Dealer::find($id)->delete();
        return redirect()->route('admin.dealer.index');
    }
}
