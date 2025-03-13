<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Service;
use App\Models\ServiceDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $dataMechanic = Service::where('mechanic_id', auth()->id())
            ->whereDate('schedule_date', date('Y-m-d'))
            ->get();
        $dataAdmin = Service::whereDate('schedule_date', date('Y-m-d'))
            ->get();

        $totalCustomer = Customer::count();
        $totalFinish = Service::where('status', 'Finished')
            ->count();
        $totalToday = Service::whereDate('schedule_date', date('Y-m-d'))
            ->count();
        $totalEarn = ServiceDetails::whereHas('service', function ($query) {
            $query->where('status', 'Finished');
        })->sum(DB::raw('jasa + sparepart + aksesoris'));
        $graphData = ServiceDetails::with([
            'oliMesin:id,name',
            'oliGardan:id,name',
            'oliGearBox:id,name',
            'breakCleaner:id,name',
            'carbuCleaner:id,name',
            'crushWasher:id,name',
            'Busi:id,name',
            'oRingFilter:id,name',
            'filterOli:id,name'
        ])->get();

        $relationMap = [
            'oli_mesin' => 'oliMesin',
            'oli_gardan' => 'oliGardan',
            'oli_gear_box' => 'oliGearBox',
            'break_cleaner' => 'breakCleaner',
            'carbu_cleaner' => 'carbuCleaner',
            'crush_washer' => 'crushWasher',
            'busi' => 'Busi',
            'o_ring_filter' => 'oRingFilter',
            'filter_oli' => 'filterOli',
        ];

        $graphCollection = collect([]);

        foreach ($relationMap as $column => $relation) {
            $grouped = $graphData->groupBy($column)->map(function ($items, $productId) use ($relation) {
                if (empty($productId)) {
                    return null; // Abaikan jika product_id kosong
                }

                $total = $items->count();
                $productName = optional($items->first()->{$relation})->name;

                return [
                    'name' => $productName,
                    'value' => $total
                ];
            })->filter();

            $graphCollection = $graphCollection->merge($grouped);
        }


        return view('admin.dashboard', compact('dataAdmin', 'dataMechanic', 'totalCustomer', 'totalFinish', 'totalToday', 'totalEarn', 'graphCollection'));
    }
}
