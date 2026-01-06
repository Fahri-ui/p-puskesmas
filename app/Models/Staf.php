<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staf extends Model
{
    protected $fillable = [
        'name',
        'nip',
        'jabatan',
        'no_telepon',
        'email',
        'alamat',
        'foto',
        'tgl_lahir',
        'jenis_kelamin',
        'status',
    ];
}
