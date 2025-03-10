<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['customer_id', 'vin', 'type'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
