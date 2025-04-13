<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    protected $table = 'adoption';
    protected $fillable = [
        'pet_id',
        'Pet_Name',
        'Species',
        'Breed',
        'Age',
        'Sex',
        'adoption_date',
        'adopter_name',
        'adopter_contact',
        'adoption_fee',
        'status'
    ];
}
