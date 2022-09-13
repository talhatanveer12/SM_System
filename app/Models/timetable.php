<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class timetable extends Model
{
    use HasFactory;

    protected $guarded = [];


    /**
     * Get the user that owns the timetable
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function courses(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function lessons(): BelongsTo
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }
}
