<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckUp extends Model
{
    protected $table = 'checkup';
    protected $primay_key = 'owner_id';
    protected $fillable = [
        'owner_id',
        'owner_fullname',
        'owner_address',
        'owner_email',
        'pet_name',
        'breed',
        'weight',
        'species',
        'age',
        'sex',
        'appointment_date',
        'checkup_type',
        'symptoms',
        'preferred_vet',
    ];
}
