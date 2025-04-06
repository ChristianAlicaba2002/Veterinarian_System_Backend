<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Authenticatable
{
    use HasFactory,Notifiable, HasApiTokens;

    protected $table = 'clients';
    protected $primaryKey = 'client_id';
    protected $fillable = [
        'client_id',
        'first_name',
        'last_name',
        'email',
        'password',
        'phone_number',
        'address',
        'remember_token',
        'notes'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
