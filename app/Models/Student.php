<?php

namespace App\Models;

use App\Models\Classes;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeStudentId(){
        if(auth()->user()->type == 'student'){
            // $student_id  = Cache::rememberForever('users', function () {
            //     return Student::where('email','=',auth()->user()->email)->first();
            // });
            return  Student::where('email','=',auth()->user()->email)->first();
        }
        else{
            // $student_id  = Cache::rememberForever('users', function () {
            //     return Student::where('guardian_email','=',auth()->user()->email)->first();
            // });
            return  Student::where('guardian_email','=',auth()->user()->email)->first();;
            //return Student::where('guardian_email','=',auth()->user()->email)->first();
        }
    }


    /**
     * Get the user that owns the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classes(): BelongsTo
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}
