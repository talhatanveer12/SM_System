<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Classes;
use App\Models\AssignCourse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    public function create(){
        $result;
        if(request('course_id')){
            $result = Course::find(request('course_id'));
            //dd($result);
        }
        return view('Courses.add-courses',[ 'Courses' => Course::all(),'UpdateCourse' => $result ?? '']);
    }

    public function store(){
        $values = request()->validate([
            'course_name' => ['required',Rule::unique('courses','course_name')->ignore(request('course_id'))],
            'course_code' => ['required',Rule::unique('courses','course_code')->ignore(request('course_id'))],
            'course_type' => 'required',
        ]);
        Course::updateOrCreate([
            'id' => request('course_id'),
        ],$values);

        return redirect()->route('AddCourse')->with('success',"successfuly Course Add");
    }

    public function AssignCourse(){
        $result;
        if(request('class_id')){
            $result = Classes::where('id',request('class_id'))->with('courses')->first();
            //dd($result);
        }
        return view('Courses.assign-courses',['Courses' => Course::all(), 'Classes' => Classes::all(), 'assignData' => Classes::with('courses')->get() ?? '','UpdateCourse' => $result ?? '']);
    }

    public function StoreAssignCourse(){
       // dd(request()->all());
        $values = request()->validate([
            'class_id' => 'required',
            'course_id' => 'required',
        ]);

        AssignCourse::where('class_id',$values['class_id'])->delete();
        //Lesson::whereNotIn('course_id',$values['course_id'])->delete();

        foreach ($values['course_id'] as $key => $value) {
            AssignCourse::create([
                'class_id' => $values['class_id'],
                'course_id' => $value,
            ]);
        }
        return redirect()->route('AssignCourse')->with('success',"successfuly Courses Assign");
    }

    public function delete($id){
        AssignCourse::where('class_id',$id)->delete();
        //Lesson::wher();
        return back()->with('success',"successfuly delete Assign Course");
    }
    public function deleteCourse($id){
        Course::where('id',$id)->delete();
        return back()->with('success',"successfuly Delete Exam");
    }

}
