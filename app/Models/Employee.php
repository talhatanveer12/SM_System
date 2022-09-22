<?php

namespace App\Models;

use App\Models\Course;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeGetCourse(){
        if(auth()->user()->type == 'teacher'){
            return Course::where('id','=',Employee::select('course_id')->where('email','=',auth()->user()->email)->first()->course_id)->get();
        }
        else{
            return Course::all();
        }
    }

    public function scopeGetClass(){

        if(auth()->user()->type == 'teacher'){
            return Course::where('id','=',Employee::select('course_id')->where('email','=',auth()->user()->email)->first()->course_id)->with('classes')->first()->classes;
        }
        else
            return Classes::all();

    }

    /**
     * Get the user that owns the Employee
     *
     * @return BelongsTo
     */
    public function courses(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
