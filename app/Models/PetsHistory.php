<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetsHistory extends Model
{
    protected $table = 'pets_history';
    protected $fillable = [
                'pet_id',
                'Pet_Name',
                'Species',
                'Breed',
                'Age',
                'Sex',
                'Neutered_Spay',
                'Color',
                'Weight',
                'Special_Markings',
                'Microchip_Number',
                'image',
                'Status',
            ];
}
