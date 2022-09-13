<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Employee;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
    public function index(){
        $employee = Employee::latest();
        if(request('CNIC_No')){
            $employee->where('cnic_no','like','%'.request('CNIC_No').'%');
        }
        if(request('Course')){
            $employee->where('course_id','=',request('course_id'));
        }
        return view('Employees.all-employee',['Employee' => $employee->get(),'Course' => Course::all()]);
    }
    public function create(){
        $class = Course::all();
        return view('Employees.add-employee',['Classes' => $class]);
    }
    public function store(){
        //dd(request()->all());
        $values = request()->validate([
            'reg_no' => 'required|unique:employees,reg_no',
            'employee_no'=> 'required|unique:employees,employee_no',
            'course_id' => 'required',
            'date_of_birth' => '|required|date',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'category' => 'required',
            'email' => 'required|email|unique:employees,email',
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
        $name = $values['first_name'].$values['last_name'];
        User::create([
            'name' => $name,
            'email' => $values['email'],
            'type' => 'teacher',
            'password' => Hash::make($password),
        ]);

        Employee::create($values);
        Mail::to($values['email'])->send(new WelcomeMail($name,$values['employee_no'],$password));

        return back()->with('success',"successfuly Employee Create");
    }
}
