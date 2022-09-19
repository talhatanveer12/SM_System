<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Classes;
use App\Models\AssignCourse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function create(){
        return view('Courses.add-courses',[ 'Courses' => Course::all()]);
    }

    public function store(){
        $values = request()->validate([
            'course_name' => 'required|unique:courses,course_name',
            'course_code' => 'required|unique:courses,course_code',
            'course_type' => 'required',
        ]);
        Course::create($values);
        return back()->with('success',"successfuly Course Create");
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

        $values = request()->validate([
            'class_id' => 'required',
            'course_id' => 'required',
        ]);

        AssignCourse::where('class_id',$values['class_id'])->delete();
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
        return back()->with('success',"successfuly delete Assign Course");
    }
}
