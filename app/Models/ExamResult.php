<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamResult extends Model
{
    use HasFactory;
    protected $guarded = [];
    // public function courses(){
    //     return $this->belongsTo(Course::class);
    // }

    /**
     * Get the user that owns the ExamResult
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function courses(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    /**
     * Get the user that owns the ExamResult
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function students(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
