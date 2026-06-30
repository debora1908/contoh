<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'username',
        'password',
        'role',
        'status'
    ];

    protected $hidden = [
        'password'
    ];
}
