<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    protected $table = 'adoption';
    protected $fillable = [
        'client_id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'address',
        'pet_id',
        'image',
        'Pet_Name',
        'Age',
        'Species',
        'Sex',
        'Color',
        'Breed',
        'Microchip_Number',
        'Neutered_Spay',
        'Special_Markings',
        'Weight',
        'adoption_date',
        'Status',
    ];
}
