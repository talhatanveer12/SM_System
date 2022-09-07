<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Classes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{
    public function index(){
        $get_ids = Lesson::select('class_id','course_id')->groupBy('class_id','course_id')->get();
        $course_name;
        $lesson_name = array();
        $class_name;
        $swap = -1;
        foreach ($get_ids as $key => $value) {
            if($swap != $value['class_id']){
                unset($course_name);
                $swap = $value['class_id'];
            }
            $classes_name = Classes::select('class_name')->where('id', '=', $value['class_id'])->first();
            $courses_name = Course::select('course_name')->where('id', '=', $value['course_id'])->first();
            $get_lessons = Lesson::select('lesson_name')->where('class_id','=',$value->class_id)->where('course_id','=',$value->course_id)->get();
            foreach ($get_lessons as $key_1 => $value_1) {
                $lesson_name[] = $value_1['lesson_name'];
            }
            $course_name[$courses_name['course_name']] = $lesson_name;
            $class_name[$classes_name['class_name']] = $course_name;
            unset($lesson_name);
        }

        return view('Lesson-Plan.lesson',['Classes' => Classes::all(),'Lesson_detail' => $class_name ?? '']);
    }

    public function store(){
        $values = request()->validate([
            'class_id' => 'required',
            'course_id' => 'required',
            'lesson_name' => 'required|unique:lessons,lesson_name',
        ]);
        Lesson::create($values);
        return back()->with('success',"successfuly Lesson created");
    }

    public function syllabus_index(){
        $topic_name;
        $completion_date;
        $lesson;
        $Course_name = '';
        if(request('class_id') && request('course_id')){
            $Course_name = Course::select('course_name')->where('id','=',request('course_id'))->first();
            $result = Lesson::where('class_id','=',request('class_id'))->where('course_id','=',request('course_id'))->get();
            foreach ($result as $key => $value) {
                $get_topic = Topic::where('lesson_id','=',$value->id)->get();
                if(count($get_topic)){
                    $lesson[$value->lesson_name] = $get_topic;
                }
                else{
                    $lesson[$value->lesson_name] = '';
                }
                unset($topic_name);
            }
            //dd($lesson);
        }
        return view('Lesson-Plan.syllabus-status',['Classes' => Classes::all(),'Courses' => Course::all(),'Course_name' => $Course_name,'lesson' => $lesson ?? '']);
    }
}
