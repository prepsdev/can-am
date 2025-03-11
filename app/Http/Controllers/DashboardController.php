<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Service::where('mechanic_id', auth()->id())
            ->where('status', '!=', 'Finished')
            ->get();
        return view('admin.dashboard', compact('data'));
    }
}
