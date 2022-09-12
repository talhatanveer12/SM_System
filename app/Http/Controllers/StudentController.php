<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Classes;
use App\Models\Student;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    public function index(){
        $student = Student::latest();
        if(request('roll_no')){
            $student->where('roll_no','like','%'.request('roll_no').'%');
        }
        if(request('Class')){
            $student->where('class_id','=',request('class_id'));
        }
        return view('Students.all-student',['Student' => $student->get(), 'Classes' => Classes::all()]);
    }

    public function create(){
        $class = Classes::all();
        return view('Students.add-student',['Classes' => $class]);
    }

    public function store(){
        $values = request()->validate([
            'admission_no' => 'required|unique:students,admission_no',
            'roll_no'=> 'required|unique:students,roll_no',
            'class_id' => 'required',
            'date_of_birth' => '|required|date',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'category' => 'required',
            'father_name' => '',
            'father_occupation' => '',
            'father_phone' => '',
            'father_photo' => '',
            'mother_name' => '',
            'mother_phone' => '',
            'mother_occupation' => '',
            'mother_photo' => '',
            'guardian_photo' => '',
            'guardian_occupation' => '',
            'student_photo' => '',
            'email' => 'required|email|unique:students,email',
            'religion' => 'required',
            'admission_date' => 'required|date',
            'guardian_options' => '',
            'guardian_relation' => 'required',
            'guardian_name' => 'required',
            'guardian_email' => 'required|email',
            'guardian_phone' => 'required|numeric',
            'guardian_address' => 'required',
        ]);

        if(isset($values['student_photo'])){
            $values['student_photo'] = request()->file('student_photo')->store('studentImage');
        }
        if(isset($values['mother_photo'])){
            $values['mother_photo'] = request()->file('mother_photo')->store('motherImage');
        }
        if(isset($values['father_photo'])){
            $values['father_photo'] = request()->file('father_photo')->store('fatherImage');
        }
        if(isset($values['guardian_photo'])){
            $values['guardian_photo'] = request()->file('guardian_photo')->store('guardianImage');
        }
        $values['guardian_options'] = 'father';
        $password = rand(10000000,99999999);
        $name = $values['first_name'].$values['last_name'];
        User::create([
            'name' => $name,
            'email' => $values['email'],
            'type' => 'student',
            'password' => Hash::make($password),
        ]);

        Student::create($values);
       // Mail::to($values['email'])->send(new WelcomeMail($name,$values['roll_no'],$password));
        return back()->with('success',"successfuly Student Create");
    }
}