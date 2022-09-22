<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Classes;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicController extends Controller
{
    public function index(){
        $get_ids = Lesson::select('course_id')->groupBy('course_id')->get();
        $course_name;
        $lesson_name;
        $topic_name;
        $class_name;
        $swap = -1;
        foreach ($get_ids as $key => $value) {
            $courses_name = Course::select('course_name')->where('id', '=', $value['course_id'])->first();
            $get_lessons = Lesson::select('lesson_name','id')->where('course_id','=',$value->course_id)->get();
            //dd($get_lessons);
            foreach ($get_lessons as $key_1 => $value_1) {
                $get_topic = Topic::where('lesson_id','=',$value_1['id'])->get();
                if(count($get_topic)){
                    foreach ($get_topic as $key_2 => $value_2) {
                        $topic_name[] = $value_2['topic_name'];
                    }
                    $lesson_name[$value_1['lesson_name']] = $topic_name;
                    unset($topic_name);
                }
                else{
                    $lesson_name = '-1';
                }
            }
            if($lesson_name != '-1')
                $course_name[$courses_name['course_name']] = $lesson_name ;
            unset($lesson_name);
        }
        return view('Lesson-Plan.topic',['Courses' => Employee::GetCourse() ?? '','topic_detail' => $course_name ?? '']);
    }

    public function store(){
        $values = request()->validate([
            'class_id' => 'required',
            'course_id' => 'required',
            'lesson_id' => 'required',
            'topic_name' => 'required|unique:topics,topic_name',
        ]);
        Topic::create([
            'lesson_id' => request('lesson_id'),
            'topic_name' => request('topic_name'),
        ]);
        return back()->with('success',"successfuly Topic created");
    }

    public function update(){
        Topic::where('id','=',request('topic_id'))->update([
            'completion_date' => request('completion_date'),
        ]);

        return back()->with('success',"successfuly Topic update");
    }
}
