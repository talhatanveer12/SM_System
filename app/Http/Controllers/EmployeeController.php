<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Employee;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
    public function index(){
        $employee = Employee::latest();
        if(request('cnic_no')){
            $employee->where('cnic_no','like','%'.request('cnic_no').'%');
        }
        if(request('course_id')){
            $employee->where('course_id','=',request('course_id'));
        }
        elseif(request('course_id') || request('cnic_no')){
            $employee->where('cnic_no','like','%'.request('cnic_no').'%')->where('course_id','=',request('course_id'));
        }
        return view('Employees.all-employee',['Employee' => $employee->paginate(3),'Course' => Course::all()]);
    }
    public function create(){
        $teacher;
        if(request('emp_id')){
            $teacher = Employee::find(request('emp_id'));
        }
        return view('Employees.add-employee',['Classes' => Course::all(),'Teacher' => $teacher ?? '']);
    }
    public function store(){
        //dd(request()->all());
        $values = request()->validate([
            'reg_no' => ['required', Rule::unique('employees','reg_no')->ignore(request('id'))],
            'employee_no'=> ['required', Rule::unique('employees','employee_no')->ignore(request('id'))],
            'course_id' => 'required',
            'date_of_birth' => '|required|date',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'category' => 'required',
            'email' => ['required','email', Rule::unique('employees','email')->ignore(request('id'))],
            'religion' => 'required',
            'joining_date' => 'required|date',
            'cnic_no' => 'required',
            'phone' => 'required',
            'eduction' => 'required',
            'specialization' => 'required',
            'employee_address' => 'required',
            'employee_photo' => '',
        ]);
        if(isset($values['employee_photo'])){
            $values['employee_photo'] = request()->file('employee_photo')->store('employeeImage');
        }

        $password = rand(10000000,99999999);
        $name = $values['first_name'].' '.$values['last_name'];
        User::updateOrCreate([
            'email' => $values['email'],
        ],[
            'name' => $name,
            'email' => $values['email'],
            'type' => 'teacher',
            'password' => Hash::make($password),
        ]);

        Employee::updateOrCreate([
            'id' => request('id'),
        ],$values);
        Mail::to($values['email'])->send(new WelcomeMail($name,$values['employee_no'],$password,'teacher'));

        return redirect()->route('addEmployee')->with('success',"successfuly Employee Record Add");
    }
}
