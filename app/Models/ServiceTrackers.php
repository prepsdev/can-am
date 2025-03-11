<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceTrackers extends Model
{
    protected $table = 'service_trackers';
    protected $fillable = [
        'service_id',
        'way',
        'estimate',
        'progress',
        'check',
        'finish',
    ];

    protected $casts = [
        'way' => 'datetime',
        'estimate' => 'datetime',
        'progress' => 'datetime',
        'check' => 'datetime',
        'finish' => 'datetime',
    ];
}
