<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'service_id',
        'customer_id',
        'service_type',
        'schedule_date',
        'mechanic_id',
        'status',
        'jasa',
        'sparepart',
        'aksesoris'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function mechanic()
    {
        return $this->belongsTo(User::class, 'mechanic_id')->where('role', 'mechanic');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            $lastService = Service::latest()->first();
            $nextNumber = $lastService ? ((int) substr($lastService->service_id, 4)) + 1 : 1;
            $service->service_id = 'SRV-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        });
    }

    protected $casts = [
        'schedule_date' => 'date',
    ];
}
