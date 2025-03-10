<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'city', 'address'];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
