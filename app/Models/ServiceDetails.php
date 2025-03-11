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
    ];

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
}
