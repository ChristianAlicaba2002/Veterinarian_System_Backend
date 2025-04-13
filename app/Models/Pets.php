<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pets extends Model
{
    protected $table = 'pets';
    protected $primaryKey = 'pet_id';
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
