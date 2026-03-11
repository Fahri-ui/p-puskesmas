<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'thumbnail',
        'image',
        'category_id',
        'status',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Relationship
    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    // Scope untuk blog yang dipublish
    public function scopePublished($query)
    {
        return $query->where('status', 'publish')
                     ->whereNotNull('published_at')
                     ->where('published_at', '<=', now());
    }
}