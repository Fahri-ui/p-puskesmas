<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'nama_layanan',
        'slug',
        'deskripsi',
        'icon',
        'aktif',
        'urutan',
    ];
}
