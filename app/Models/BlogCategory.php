<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $fillable = [
        'nama_kategori',
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'kategori_id');
    }
}
