<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'gender',
        'first_name',
        'last_name',
        'email',
        'contact_number',
        'country',
        'city',
        'job_title',
        'company',
    ];
}
