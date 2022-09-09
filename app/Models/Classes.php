<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Student;
use App\Models\AssignCourse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Classes extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * The courses that belong to the Classes
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'assign_courses', 'class_id', 'course_id');
    }

    public function course_lessons(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'lessons', 'class_id', 'course_id');
    }

    /**
     * Get all of the comments for the Classes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'class_id');
    }
}
