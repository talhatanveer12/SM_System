<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Classes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicController extends Controller
{
    public function index(){
        $get_ids = Lesson::select('class_id','course_id')->groupBy('class_id','course_id')->get();
        $course_name;
        $lesson_name;
        $topic_name;
        $class_name;
        $swap = -1;
        foreach ($get_ids as $key => $value) {
            if($swap != $value['class_id']){
                unset($course_name);
                $swap = $value['class_id'];
            }
            $classes_name = Classes::select('class_name')->where('id', '=', $value['class_id'])->first();
            $courses_name = Course::select('course_name')->where('id', '=', $value['course_id'])->first();
            $get_lessons = Lesson::select('lesson_name','id')->where('class_id','=',$value->class_id)->where('course_id','=',$value->course_id)->get();
            //dd($get_lessons);
            foreach ($get_lessons as $key_1 => $value_1) {
                $get_topic = Topic::where('lesson_id','=',$value_1['id'])->get();
                if(count($get_topic)){
                    foreach ($get_topic as $key_2 => $value_2) {
                        $topic_name[] = $value_2['topic_name'];
                    }
                    $lesson_name[$value_1['lesson_name']] = $topic_name;
                    unset($topic_name);
                    $course_name[$courses_name['course_name']] = $lesson_name;
                    $class_name[$classes_name['class_name']] = $course_name;
                    unset($lesson_name);
                }
                else{
                    //$lesson_name[] = $value_1['lesson_name'];
                }
            }

        }
        //dd($class_name);
        return view('Lesson-Plan.topic',['Classes' => Classes::all(),'topic_detail' => $class_name ?? '']);
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
