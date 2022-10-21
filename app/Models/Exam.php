<?php

namespace App\Models;

use App\Models\ExamResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

     /**
     * Get all of the comments for the Classes
     *
     * @return HasMany
     */
    public function examResults(): HasMany
    {
        return $this->hasMany(ExamResult::class, 'exam_id');
    }
}
