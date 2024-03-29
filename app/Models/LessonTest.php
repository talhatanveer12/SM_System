<?php

namespace App\Models;

use App\Models\Lesson;
use App\Models\Question;
use App\Models\TestResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class LessonTest extends Model
{
    use HasFactory;
    protected $guarded = [];


    // /**
    //  * Get the user that owns the LessonTest
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function lessons(): BelongsTo
    // {
    //     return $this->belongsTo(Lesson::class, 'lesson_id', 'other_key');
    // }

    /**
     * The roles that belong to the LessonTest
     *
     * @return BelongsToMany
     */
    public function questions(): BelongsToMany
    {
        return $this->belongsToMany(Question::class, 'test_questions', 'lesson_test_id', 'question_id');
    }

    /**
     * Get the user that owns the LessonTest
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lessons(): BelongsTo
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }


    public function testresult(): HasMany
    {
        return $this->hasMany(TestResult::class, 'lesson_test_id');
    }

    public function scopeGetLessonTest(){
        if(auth()->user()->type == 'student' ){
            return LessonTest::with('lessons','testresult')->get();
        }
        else{
            return LessonTest::with('lessons','testresult')->get();
        }
    }
}
