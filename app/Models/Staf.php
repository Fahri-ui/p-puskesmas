<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staf extends Model
{
    protected $table = 'staf';

    protected $fillable = [
        'foto',
        'nama',
        'telepon',
        'email',
        'jenis_kelamin',
        'tanggal_lahir',
        'profesi',
        'nip',
        'jabatan',
        'deskripsi',
        'alamat',
        'pendidikan_terakhir',
        'bergabung_sejak',
        'urutan'
    ];
}
