<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_layanan',
        'slug',
        'deskripsi',
        'icon',
        'aktif',
        'urutan',
    ];

}
