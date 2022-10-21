<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\timetable;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function index(){
        $color = ['#3366CC','#DC3912','#FF9900','#109618','#990099','#0099C6','#DD4477'];
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
            $count = 0;
            foreach ($temp as $key => $value) {
                $result['title'] = $value->courses->course_name.' '.$value->lessons->lesson_name;
                $result['start'] = $value->start;
                $result['end'] = $value->end;
                $result['allDay'] =  false;
                $result['color'] = $color[$count];
                $count = $count+1;
                if($count > 6){
                    $count = 0;
                }
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
        return back()->with('success',"successfully Lesson Timetable Add");
    }
}
