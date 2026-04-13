<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staf extends Model
{
    use HasFactory;
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
        'klaster',
        'peran_klaster',
    ];
}
