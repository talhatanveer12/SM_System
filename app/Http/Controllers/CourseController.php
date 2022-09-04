<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Classes;
use App\Models\AssignCourse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function create(){
        $course = Course::all();
        return view('Courses.add-courses',[ 'Courses' => $course]);
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
        $course = Course::all();
        $class = Classes::all();
        $assign = AssignCourse::select('class_id')->groupBy('class_id')->get();
        $AssignData;
        $temp = array();
        foreach ($assign as $key => $value) {
            $variable = Classes::find($value['class_id'])->courses;
            $class_name = Classes::select('class_name')->where('id', '=', $value['class_id'])->first();
            foreach ($variable as $key1 => $value1) {
                $temp[] = $value1['course_name'];
            }
            $AssignData[$class_name['class_name']] = $temp;
            unset($temp);
        }
        //dd($AssignData);
        return view('Courses.assign-courses',['Courses' => $course , 'Classes' => $class, 'assignData' => $AssignData ?? '']);
    }

    public function StoreAssignCourse(){
        $values = request()->validate([
            'class_id' => 'required|unique:assign_courses,class_id',
            'course_id' => 'required',
        ]);

        foreach ($values['course_id'] as $key => $value) {
            AssignCourse::create([
                'class_id' => $values['class_id'],
                'course_id' => $value,
            ]);
        }
        return back()->with('success',"successfuly Courses Assign");
    }
}