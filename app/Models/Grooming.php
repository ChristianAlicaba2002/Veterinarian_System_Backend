<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grooming extends Model
{
    protected $table = 'grooming';
    protected $primaryKey = 'grooming_id';
    protected $fillable = [
        'client_id',
        'first_name',
        'last_name',
        'address',
        'phone_number',
        'pet_name',
        'breed',
        'service_type',
        'appointment_date',
        'appointment_time',
        'groomer_name',
        'notes',
    ];
}
