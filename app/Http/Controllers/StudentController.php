<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Employee;
use App\Jobs\sendMailJob;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    public function index(){

        $student = Student::latest();
        if(request('roll_no')){
            $student->where('roll_no','like','%'.request('roll_no').'%');
        }
        if(request('class_id')){
            $student->where('class_id','=',request('class_id'));
        }
        return view('Students.all-student',['Student' => $student->paginate(3), 'Classes' => Employee::GetClass() ?? '']);
    }

    public function create(){
        $student;
        if(request('student_id')){
            $student = Student::find(request('student_id'));
        }
        return view('Students.add-student',['Classes' => Classes::all(),'Student' => $student ?? '']);
    }

    public function store(){
        $values = request()->validate([
            'admission_no' =>  ['required', Rule::unique('students','admission_no')->ignore(request('id'))],
            'roll_no'=> ['required', Rule::unique('students','roll_no')->ignore(request('id'))],
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
            'email' => ['required','email',Rule::unique('students','email')->ignore(request('id'))],
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
        $guardian_password = rand(10000000,99999999);
        $name = $values['first_name'].' '.$values['last_name'];
        User::updateOrCreate([
            'email' => $values['email'],
        ],[
            'name' => $name,
            'email' => $values['email'],
            'password' => Hash::make($password),
            'type' => 'student',
        ]);
        User::updateOrCreate([
            'email' => $values['guardian_email'],
        ],[
            'name' => $values['guardian_name'],
            'email' => $values['guardian_email'],
            'password' => Hash::make($guardian_password),
            'type' => 'guardian',
        ]);

        Student::updateOrCreate([
            'id' => request('id'),
        ],$values);


        Mail::to($values['email'])->send(new WelcomeMail($name,$values['roll_no'],$password,'student'));
        Mail::to($values['guardian_email'])->send(new WelcomeMail($values['guardian_name'],$values['roll_no'],$guardian_password,'student'));
            // dispatch(new sendMailJob($values['guardian_name'],$values['roll_no'],$guardian_password,$values['guardian_email'],'student'));
            // dispatch(new sendMailJob($name,$values['roll_no'],$password,$values['email'],'student'));

        return redirect()->route('addStudent')->with('success',"successfuly Student Create");
    }
}
