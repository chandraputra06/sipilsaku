<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'badges' => 'array',
        ];
    }

    public function orders()
    {
        return $this->hasMany(CourseOrder::class);
    }

    public function videos()
    {
        return $this->hasMany(CourseVideo::class)->orderBy('sort_order')->orderBy('created_at');
    }

    public function getPublishedVideos()
    {
        return $this->videos()->where('is_active', true)->get();
    }
}