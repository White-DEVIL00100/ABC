<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransportRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'date',
        'from',
        'to',
        'weight',
        'length',
        'width',
        'height',
        'freight_type',
        'load_type',
    ];
}
