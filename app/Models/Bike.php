<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'brand',
        'type',
        'rent_price',
        'gear_count',
        'image',
        'available',
    ];

    protected $casts = [
        'available' => 'boolean',
    ];
}
