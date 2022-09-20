<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Classes;
use App\Models\Student;
use App\Models\timetable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{
    public function index(){
        return view('Lesson-Plan.lesson',['Classes' => Classes::all(),'Lesson_detail' => Course::with('lessons')->get() ?? '']);
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

    public function lessonPlan(Request $request){
        // $temp = timetable::with('courses','lessons')->get();
        // $result;
        // $a = array();
        // foreach ($temp as $key => $value) {
        //     $result['title'] = $value->courses->course_name.' '.$value->lessons->lesson_name;
        //     $result['start'] = $value->start;
        //     $result['end'] = $value->end;
        //     $a[] = $result;
        // }
        // dd(response()->json($a));


        //dd(timetable::with('courses')->get());
        // $data = timetable::whereDate('start', '>=', '2022-09-13')
        //                ->whereDate('end',   '<=', '2022-09-13')
        //                ->get(['id', 'lesson as title', 'start', 'end']);
        //dd($data);


        //dd(response()->json(timetable::with('courses','lessons')->get()));

        //

        if(request()->ajax())
    	{
            //dd("sdsda");
            dd(request()->ajax());
    		$data = timetable::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'lesson', 'start', 'end']);
            return response()->json($data);
    	}
        return view('Lesson-Plan.manage-lesson-plan',['Course' => Course::all()]);
    }

    public function viewSyllabus(){
        $Class_id = Student::StudentId();
        $Course = Classes::find($Class_id->class_id)->courses;
        $lesson;
        $Course_name = '';
        if(request('course_id')){
            $Course_name = Course::select('course_name')->where('id','=',request('course_id'))->first();
            $result = Lesson::where('class_id','=',$Class_id->class_id)->where('course_id','=',request('course_id'))->get();
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
        }
        return view('Lesson-Plan.view-syllabus-status',['Courses' => $Course,'','lesson' => $lesson ?? '','Course_name' => $Course_name]);
    }
}
