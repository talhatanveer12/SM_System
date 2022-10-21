<?php

namespace App\Models;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Lessons(): BelongsTo
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }
}
