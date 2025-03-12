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
            ->where('status', '!=', 'Finished')
            ->whereDate('schedule_date', date('Y-m-d'))
            ->get();
        $dataAdmin = Service::where('status', '!=', 'Finished')
            ->whereDate('schedule_date', date('Y-m-d'))
            ->get();

        $totalCustomer = Customer::count();
        $totalFinish = Service::where('status', 'Finished')
            ->count();
        $totalToday = Service::whereDate('schedule_date', date('Y-m-d'))
            ->count();
        $totalEarn = ServiceDetails::whereHas('service', function ($query) {
            $query->where('status', 'Finished');
        })->sum(DB::raw('jasa + sparepart + aksesoris'));
        $graphData = ServiceDetails::select(
            'oli_mesin',
            'oli_gardan',
            'oli_gear_box',
            'break_cleaner',
            'carbu_cleaner',
            'crush_washer',
            'busi',
            'o_ring_filter',
            'filter_oli'
        )
            ->with([
                'oliMesin:id,name',
                'oliGardan:id,name',
                'oliGearBox:id,name',
                'breakCleaner:id,name',
                'carbuCleaner:id,name',
                'crushWasher:id,name',
                'Busi:id,name',
                'oRingFilter:id,name',
                'filterOli:id,name'
            ])
            ->get()
            ->flatMap(function ($item) {
                return [
                    'oli_mesin' => $item->oli_mesin,
                    'oli_gardan' => $item->oli_gardan,
                    'oli_gear_box' => $item->oli_gear_box,
                    'break_cleaner' => $item->break_cleaner,
                    'carbu_cleaner' => $item->carbu_cleaner,
                    'crush_washer' => $item->crush_washer,
                    'busi' => $item->busi,
                    'o_ring_filter' => $item->o_ring_filter,
                    'filter_oli' => $item->filter_oli,
                ];
            })
            ->sortByDesc(function ($value) {
                return $value;
            })
            ->take(2)
            ->map(function ($value, $key) {
                // Ambil model terkait
                $service = ServiceDetails::with([
                    'oliMesin:id,name',
                    'oliGardan:id,name',
                    'oliGearBox:id,name',
                    'breakCleaner:id,name',
                    'carbuCleaner:id,name',
                    'crushWasher:id,name',
                    'Busi:id,name',
                    'oRingFilter:id,name',
                    'filterOli:id,name'
                ])->first();

                $relationMap = [
                    'oli_mesin' => $service->oliMesin,
                    'oli_gardan' => $service->oliGardan,
                    'oli_gear_box' => $service->oliGearBox,
                    'break_cleaner' => $service->breakCleaner,
                    'carbu_cleaner' => $service->carbuCleaner,
                    'crush_washer' => $service->crushWasher,
                    'busi' => $service->Busi,
                    'o_ring_filter' => $service->oRingFilter,
                    'filter_oli' => $service->filterOli,
                ];

                return [
                    'name' => optional($relationMap[$key])->name,
                    'value' => $value
                ];
            });


        return view('admin.dashboard', compact('dataAdmin', 'dataMechanic', 'totalCustomer', 'totalFinish', 'totalToday', 'totalEarn', 'graphData'));
    }
}
