<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $table = 'parts';

    protected $fillable = [
        'type',
        'price',
        'make',
        'model',
        'fuelType'
    ];
}
