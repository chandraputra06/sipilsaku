<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseBadge extends Model
{
    protected $guarded = [];

    public function course()
    {
        return $this->belongsToMany(Course::class, 'course_badges', 'badge_id', 'course_id');
    }
}
