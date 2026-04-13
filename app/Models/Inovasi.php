<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inovasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'file_path',
    ];
}
