<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staf extends Model
{
    protected $table = 'staf';

    protected $fillable = [
        'name',
        'jabatan',
        'bidang',
        'deskripsi',
        'email',
        'foto',
        'status',
        'urutan',
    ];
}
