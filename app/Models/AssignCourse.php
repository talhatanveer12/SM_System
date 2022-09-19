<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Classes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssignCourse extends Model
{
    use HasFactory;

    public function scopeAssignCourse(){
        return Classes::with('courses')->get();
    }

    protected $guarded = [];

}
