<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $table = 'blog_categories';

    protected $fillable = [
        'nama_kategori',
    ];

    public function blogs()
    {
        // relationship uses category_id after migration
        return $this->hasMany(Blog::class, 'category_id');
    }
}
