<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits_between:10,15',
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user = auth()->user();

        // Update user details
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->route('admin.profile.edit')->with('success', 'Profile updated successfully.');
    }
}
