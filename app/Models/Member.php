<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// File: app/Models/Member.php
class Member extends Model
{
    protected $table = 'members';

    protected $fillable = [
        'nama', 'nim', 'email', 'nomor_telepon', 'alamat', 'status',
    ];
}
