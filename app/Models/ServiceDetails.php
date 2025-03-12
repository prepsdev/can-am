<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceDetails extends Model
{
    protected $fillable = [
        'service_id',
        'customer_id',
        'vehicle_id',
        'oli_mesin',
        'oli_gardan',
        'oli_gear_box',
        'break_cleaner',
        'carbu_cleaner',
        'crush_washer',
        'busi',
        'o_ring_filter',
        'filter_oli',
        'information',
        'jasa',
        'sparepart',
        'aksesoris'
    ];

    protected $appends = ['total_sparepart'];

    public function getTotalSparepartAttribute()
    {
        $totalSparepart = 0;
        $totalSparepart += optional($this->oliMesin)->price ?? 0;
        $totalSparepart += optional($this->oliGardan)->price ?? 0;
        $totalSparepart += optional($this->oliGearBox)->price ?? 0;
        $totalSparepart += optional($this->breakCleaner)->price ?? 0;
        $totalSparepart += optional($this->carbuCleaner)->price ?? 0;
        $totalSparepart += optional($this->crushWasher)->price ?? 0;
        $totalSparepart += optional($this->busi)->price ?? 0;
        $totalSparepart += optional($this->oRingFilter)->price ?? 0;
        $totalSparepart += optional($this->filterOli)->price ?? 0;

        return $totalSparepart;
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function oliMesin()
    {
        return $this->belongsTo(Product::class, 'oli_mesin');
    }

    public function oliGardan()
    {
        return $this->belongsTo(Product::class, 'oli_gardan');
    }

    public function oliGearBox()
    {
        return $this->belongsTo(Product::class, 'oli_gear_box');
    }

    public function breakCleaner()
    {
        return $this->belongsTo(Product::class, 'break_cleaner');
    }

    public function carbuCleaner()
    {
        return $this->belongsTo(Product::class, 'carbu_cleaner');
    }

    public function crushWasher()
    {
        return $this->belongsTo(Product::class, 'crush_washer');
    }

    public function busi()
    {
        return $this->belongsTo(Product::class, 'busi');
    }

    public function oRingFilter()
    {
        return $this->belongsTo(Product::class, 'o_ring_filter');
    }

    public function filterOli()
    {
        return $this->belongsTo(Product::class, 'filter_oli');
    }
}
