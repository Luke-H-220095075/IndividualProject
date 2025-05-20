<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicle extends Model
{
    protected $table = 'vehicles';

    protected $fillable = ['vrn'];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
