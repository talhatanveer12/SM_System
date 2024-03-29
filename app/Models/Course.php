<?php

namespace App\Models;

use App\Models\Lesson;
use App\Models\Classes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];


    /**
     * The roles that belong to the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(Classes::class, 'assign_courses', 'course_id', 'class_id');
    }

    public function class_lesson(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'lessons', 'class_id', 'course_id');
    }

    /**
     * Get all of the comments for the Course
     *
     * @return HasMany
     */
    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }
}
