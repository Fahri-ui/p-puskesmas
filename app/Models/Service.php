<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'excerpt',
        'deskripsi',
        'is_active',
        'jam_buka',
        'jam_tutup',
        'open_days'
    ];
}
