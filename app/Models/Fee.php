<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fee extends Model
{
    use HasFactory;

    protected $guarded = [];


    /**
     * Get the user that owns the Fee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function students(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
