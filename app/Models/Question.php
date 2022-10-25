<?php

namespace App\Models;

use App\Models\Option;
use App\Models\LessonTest;
use App\Models\TestQuestion;
use App\Models\StudentTestResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];


    /**
     * The lesson_tests that belong to the Question
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function lesson_tests(): BelongsToMany
    {
        return $this->belongsToMany(LessonTest::class, 'test_questions', 'question_id', 'lesson_test_id');
    }

    /**
     * Get all of the comments for the Question
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options(): HasMany
    {
        return $this->hasMany(Option::class, 'question_id');
    }

    /**
     * Get the user associated with the Question
     *
     * @return HasOne
     */
    public function answers(): HasOne
    {
        return $this->hasOne(StudentTestResult::class, 'question_id');
    }


}
