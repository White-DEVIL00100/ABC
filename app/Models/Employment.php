<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    protected $fillable = [
        'name',
        'email',
        'contact_number',
        'birth_date',
        'nationality',
        'identity_number',
        'gender',
        'marital_status',
        'educational_level',
        'specialization',
        'field',
        'section_id',
        'cv',
        'building_number',
        'additional_number',
        'street',
        'city',
        'district',
        'postal_code',
        'skills',
    ];
}
