<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\timetable;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function index(){
        $temp;
        if(auth()->user()->type == 'teacher'){
        $temp = timetable::whereHas('courses', function ($query) {
            $query->where('id','=', Employee::select('course_id')->where('email','=',auth()->user()->email)->first()->course_id);
            })->with('courses','lessons')->get();
        }
        else{
            $temp = timetable::with('courses','lessons')->get();
        }
        if($temp){
            $result;
            $a = array();
            foreach ($temp as $key => $value) {
                $result['title'] = $value->courses->course_name.' '.$value->lessons->lesson_name;
                $result['start'] = $value->start;
                $result['end'] = $value->end;
                $result['allDay'] =  false;
                $a[] = $result;
            }
        }
        return response()->json($a ?? '');

    }

    public function store(){
        $values = request()->validate([
        'course_id' => 'required',
        'lesson_id' => 'required',
        'start' => 'required',
        'end' => 'required',
        ]);
        timetable::create($values);
        return back()->with('success',"successfuly Student Create");
    }
}
