<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profil extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description', // ✅ Fixed typo: 'decription' → 'description'
    ];

    // Optional: Accessor untuk URL image
    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::url($this->image) : asset('images/placeholder-profil.png');
    }
}
