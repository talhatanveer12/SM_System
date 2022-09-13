<?php

use App\Models\timetable;
use Illuminate\Validation\Rule;
use App\Models\EmployeeAttendance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\MarksGradingController;
use App\Http\Controllers\FeeParticularsController;
use App\Http\Controllers\EmployeeAttendanceController;
use App\Http\Controllers\FeeParticularAmountController;

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
Route::get('/adminDashboard', [DashboardController::class,'adminDashboard'])->middleware('admin');
Route::get('/studentDashboard',[DashboardController::class,'studentDashboard']);

Route::get('/layout',function(){
    return view('components.layout.layout');
});


Route::get('/account-settings',[SessionController::class,'accountSettings']);
Route::get('/',[SessionController::class,'create']);
Route::post('/login',[SessionController::class,'store']);
Route::post('/logout',[SessionController::class, 'logout']);
Route::post('/changepassword',[SessionController::class,'ChangePassword']);

Route::get('/institute-profile',[InstituteController::class,'index']);
Route::post('/updatelogo/{institute}', [InstituteController::class,'storeLogo']);
Route::post('/update/{institute}', [InstituteController::class,'store']);

Route::get('/fee-particulars',[FeeParticularAmountController::class,'index']);
Route::post('/update', [FeeParticularAmountController::class,'store']);

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


Route::get('/Lesson',[LessonController::class,'index']);
Route::post('/save-lesson',[LessonController::class,'store']);
Route::get('/syllabus-status',[LessonController::class,'syllabus_index']);
Route::get('/manage-lesson-plan',[LessonController::class,'lessonPlan']);


Route::get('/Topic',[TopicController::class,'index']);
Route::post('/save-topic', [TopicController::class,'store']);
Route::post('/update-topics-details',[TopicController::class,'update']);

Route::get('/create-test',[TestController::class,'index']);
Route::post('/add-test',[TestController::class,'store']);

Route::get('/create-exam',[ExamController::class,'index']);
Route::post('/add-exam',[ExamController::class,'store']);
Route::get('/add-exam-marks',[ExamController::class,'storeResult']);
Route::post('/save-exam-marks',[ExamController::class,'saveResult']);
Route::get('/result-cards',[ExamController::class,'ResultCard']);
Route::get('/view-result',[ExamController::class,'viewResult']);

Route::get('/fee-collect',[FeeController::class,'index']);
Route::post('/save-fee-collect',[FeeController::class,'store']);
Route::get('/fee-slip',[FeeController::class,'feeSlip']);


Route::get('/getcourse/{id}',[AjaxController::class,'getcourse']);
Route::get('/getlesson/{id}/{class_id}',[AjaxController::class,'getlesson']);
Route::get('/changeTopicStatus/{id}',[AjaxController::class,'changeTopicStatus']);
Route::get('/getexamresult/{id}/{exam_id}/{class_id}',[AjaxController::class,'getexamresult']);
Route::get('/checkFeeSubmit/{id}/{month}', [AjaxController::class,'checkFeeSubmit']);

// Route:post('/full-calender/action',[LessonController::class,'addfunction']);

Route::get('/title',function(){
    //$v = JSON.stringify([{title:"lesson no 1",start:"2022-09-14",end:"2022-09-14"}]);
    $data = timetable::whereDate('start', '>=', '2022-09-13')
                       ->whereDate('end',   '<=', '2022-09-13')
                       ->get(['id', 'lesson as title', 'start', 'end']);
        return response()->json($data);
});


Route::post('/save-timetable',function(){
    $values = request()->validate([
        'course_id' => 'required',
        'lesson_id' => 'required',
        'start' => 'required',
        'end' => 'required',

    ]);
    timetable::create($values);

    return back()->with('success',"successfuly Student Create");
    //dd(request()->all());
});
