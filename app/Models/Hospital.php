<?php


namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Hospital extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'address',
        'email',
        'password',
        'is_admin',
    ];
    protected $hidden = [
        'password',
    ];
}
