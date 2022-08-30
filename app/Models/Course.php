<?php

namespace App\Models;

use App\Models\Classes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];


    /**
     * The roles that belong to the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(Classes::class, 'assign_courses', 'class_id', 'course_id');
    }
}
