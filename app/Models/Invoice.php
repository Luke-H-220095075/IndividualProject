<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';

    protected $fillable = [
        'title',
        'total',
        'parts',
    ];

    public function booking() {
        return $this->hasOne(Booking::class);
    }
}
