<?php

namespace App\Models;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentTestResult extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the user associated with the StudentTestResult
     *
     * @return HasOne
     */
    public function questions(): HasOne
    {
        return $this->hasOne(Question::class, 'id','question_id');
    }

    /**
     * Get the user associated with the StudentTestResult
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lesson(): HasOne
    {
        return $this->hasOne(Lesson::class, 'id', 'lesson_id');
    }
}
