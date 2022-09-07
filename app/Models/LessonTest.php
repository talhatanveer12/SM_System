<?php

namespace App\Models;

use App\Models\Lesson;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
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
}
