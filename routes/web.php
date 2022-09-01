<?php

use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Employee;
use App\Mail\WelcomeMail;
use App\Models\Attendance;
use App\Models\AssignCourse;
use App\Models\MarksGrading;
use App\Models\FeeParticulars;
use Illuminate\Validation\Rule;
use App\Models\EmployeeAttendance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;
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

Route::get('/account-settings', function () {
    return view('General-Settings.account-settings');
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

Route::post('/add-class',[ClassesController::class,'store']);
Route::get('/all-classes',[ClassesController::class,'index']);
Route::get('/edit-delete-class',[ClassesController::class,'show']);
Route::get('/delete/{id}',[ClassesController::class,'destroy']);

Route::get('/marks-grading', [MarksGradingController::class,'index']);
Route::post('/marks-grading/update', [MarksGradingController::class,'store']);

Route::get('/add-student',[StudentController::class,'create']);
Route::get('/all-student',[StudentController::class,'index']);
Route::post('/save-student-detail',[StudentController::class,'store']);


Route::get('/add-employee',[EmployeeController::class,'create']);
Route::get('/all-employee',[EmployeeController::class,'index']);
Route::post('/save-employee-detail',[EmployeeController::class,'store']);


Route::post('/save-assign-course',[CourseController::class,'StoreAssignCourse']);
Route::get('/add-courses',[CourseController::class,'create']);
Route::get('/assign-courses',[CourseController::class,'AssignCourse']);
Route::post('/save-course', [CourseController::class,'store']);

Route::get('/marks-student-attendance',[AttendanceController::class,'index']);
Route::get('/student-attendance-report',[AttendanceController::class,'show']);
Route::post('/save-student-attendance', [AttendanceController::class,'store']);

Route::get('/marks-employee-attendance',[EmployeeAttendanceController::class,'index']);
Route::post('/save-employee-attendance',[EmployeeAttendanceController::class,'store']);
Route::get('/employee-attendance-report',[EmployeeAttendanceController::class,'show']);


Route::get('/Lesson',function(){
    return view('Lesson-Plan.lesson',['Classes' => Classes::all(),'Courses' => Course::all()]);
});


Route::post('/save-lesson', function () {

    dd(Course::find()->classes);
    $values = request()->validate([
        'class_id' => 'required',
        'course_id' => 'required',
        'lesson_name' => 'required|unique:lessons,lesson_name',
    ]);

    Lesson::create($values);
    return back()->with('success',"successfuly Lesson created");

});


Route::get('/getcourse/{id}',function($id){

    $result = Classes::find($id)->courses;
    $r ='';
    foreach ($result as $key => $value) {
        $r .= '<option value="'.$value->id.'">'.$value->course_name.'</option>';
    }
    return $r;
});




// Route::get('/temp', function () {
//     return view('Classes.temp');
// });


// Route::get('/email', function () {
//     Mail::to('talhatanveer930@gmail.com')->send(new WelcomeMail('Talha','122121','12121212'));
//     return new WelcomeMail('Talha','122121','12121212');
// });
