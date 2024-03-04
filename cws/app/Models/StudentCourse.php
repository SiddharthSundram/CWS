<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    use HasFactory;
    public function course(): HasMany
    {
        return $this->HasMany(Course::class, 'course_id', 'id');
    }

}
