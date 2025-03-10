<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MechanicController extends Controller
{
    public function index()
    {
        return view('admin.mechanic.index');
    }

    public function getData()
    {
        $data = User::orderBy('created_at', 'desc')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return '<a href="' . route('admin.mechanic.edit', $data->id) . '" class="btn btn-sm btn-primary">Edit</a> 
                        <button class="btn btn-sm btn-danger btn-delete" data-id="' . $data->id . '">Delete</button>
                        <button class="btn btn-sm btn-warning btn-reset-password" data-id="' . $data->id . '">Reset Password</button>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        return view('admin.mechanic.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users|alpha_dash',
            'name' => 'required',
            'phone' => 'required|numeric|min:10',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'username'  => $request->username,
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'role' => 'mechanic',
        ]);

        return redirect()->route('admin.mechanic.index')->with('success', 'Mechanic added successfully.');
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();

        return response()->json(['success' => 'Data deleted successfully.']);
    }


    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.mechanic.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric|min:10',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        return redirect()->route('admin.mechanic.index')->with('success', 'Mechanic updated successfully.');
    }

    public function resetPassword($id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'password' => bcrypt('password'),
        ]);

        return response()->json(['success' => true, 'message' => 'Password reset successfully.']);
    }
}
