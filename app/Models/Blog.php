<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'gambar',
        'kategori_id',
        'penulis_id',
        'status',
        'tanggal_publish',
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'kategori_id');
    }

    public function penulis()
    {
        return $this->belongsTo(User::class, 'penulis_id');
    }
}
