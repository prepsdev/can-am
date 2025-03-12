<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceDetailAccecories extends Model
{
    protected $fillable = [
        'service_detail_id',
        'product_id'
    ];
}
