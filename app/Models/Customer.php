<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'city', 'address', 'phone'];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
