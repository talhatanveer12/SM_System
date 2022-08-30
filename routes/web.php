<?php

use App\Models\User;
use App\Models\Course;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Employee;
use App\Mail\WelcomeMail;
use App\Models\AssignCourse;
use App\Models\MarksGrading;
use App\Models\FeeParticulars;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\MarksGradingController;
use App\Http\Controllers\FeeParticularsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/adminDashboard', function () {
    return view('Dashboard.admin-dashboard');
});

Route::get('/',[SessionController::class,'create']);
Route::post('/login',[SessionController::class,'store']);
Route::post('/logout',[SessionController::class, 'logout']);
Route::post('/changepassword',[SessionController::class,'ChangePassword']);

Route::get('/institute-profile',[InstituteController::class,'index']);
Route::post('/updatelogo/{institute}', [InstituteController::class,'storeLogo']);
Route::post('/update/{institute}', [InstituteController::class,'store']);

Route::get('/fee-particulars',[FeeParticularsController::class,'index']);
Route::post('/update', [FeeParticularsController::class,'store']);
Route::post('/add-class',function(){
    $values = request()->validate([
        'class_name' => 'required|unique:classes,class_name',
    ]);
    $values['class_limit'] = 40;
    Classes::create($values);

    return back()->with('success',"successfuly Class Create");
});


Route::get('/marks-grading', [MarksGradingController::class,'index']);
Route::post('/marks-grading/update', [MarksGradingController::class,'store']);

Route::get('/account-settings', function () {
    return view('General-Settings.account-settings');
});


Route::get('/all-classes', function (Classes $classes) {
    $classes = DB::table('classes')->get();
    return view('Classes.all-classes', [ 'Classes' => $classes]);
});

Route::get('/edit-delete-class', function (Classes $classes) {
    $classes = DB::table('classes')->get();
    return view('Classes.edit-delete-classes', [ 'Classes' => $classes]);
});

Route::get('/delete/{id}', function ($id) {
    //dd($id);
    Classes::where('id', $id)->delete();
    return back()->with('success',"successfuly Class Delete");
    // $classes = DB::table('classes')->get();
    // return view('Classes.edit-delete-classes', [ 'Classes' => $classes]);
});

Route::get('/add-student',function(){
    $class = Classes::all();
    return view('Students.add-student',['Classes' => $class]);
});

Route::get('/add-employee',function(){
    $class = Course::all();
    return view('Employees.add-employee',['Classes' => $class]);
});


Route::get('/all-student',function(){
    $student = Student::all();
    return view('Students.all-student',['Student' => $student]);
});

Route::get('/all-employee',function(){
    $employee = Employee::all();
    return view('Employees.all-employee',['Employee' => $employee]);
});

Route::post('/save-employee-detail', function(){

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
    ]);

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
});
Route::post('/save-student-detail', function(){

    //dd(request()->all());
    //Mail::to('talhatanveer930@gmail.com')->send(new WelcomeMail('Talha','122121','12121212'));
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

    //dd(rand(10000000,99999999));
    //dd(request()->all());
});

Route::post('/save-assign-course', function(){

    //dd(request()->all());
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
});


Route::get('/add-courses', function (Course $course) {
    $course = Course::all();
    return view('Courses.add-courses',[ 'Courses' => $course]);
});


Route::get('/assign-courses',function(){
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
    return view('Courses.assign-courses',['Courses' => $course , 'Classes' => $class, 'assignData' => $AssignData]);
});


Route::post('/save-course', function(){

    // dd(request()->all());
    $values = request()->validate([
        'course_name' => 'required|unique:courses,course_name',
        'course_code' => 'required|unique:courses,course_code',
        'course_type' => 'required',
    ]);

    Course::create($values);

    return back()->with('success',"successfuly Course Create");
});

Route::get('/temp', function () {
    return view('Classes.temp');
});


Route::get('/email', function () {
    Mail::to('talhatanveer930@gmail.com')->send(new WelcomeMail('Talha','122121','12121212'));
    return new WelcomeMail('Talha','122121','12121212');
});
