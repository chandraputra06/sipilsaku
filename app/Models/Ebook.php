<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'slug',
        'author',
        'cover',
        'description',
        'price',
        'is_popular',
        'is_active',
    ];
}