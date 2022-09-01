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
        if(request('Roll_No')){
            $student->where('roll_no','like','%'.request('Roll_No').'%');
        }
        if(request('Class')){
            $student->where('class_id','=',request('Class'));
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
            'email' => 'required|email|unique:students,email',
            'religion' => 'required',
            'admission_date' => 'required|date',
            'guardian_options' => 'required',
            'guardian_relation' => 'required',
            'guardian_name' => 'required',
            'guardian_email' => 'required|email',
            'guardian_phone' => 'required|numeric',
            'guardian_address' => 'required',
        ]);
        $password = rand(10000000,99999999);
        $name = $values['first_name'].$values['last_name'];
        User::create([
            'name' => $name,
            'email' => $values['email'],
            'type' => 'student',
            'password' => Hash::make($password),
        ]);

        Student::create($values);
        Mail::to($values['email'])->send(new WelcomeMail($name,$values['roll_no'],$password));
        return back()->with('success',"successfuly Student Create");
    }
}
