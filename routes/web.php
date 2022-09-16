<?php

use App\Models\Employee;
use App\Models\timetable;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\TopicController;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\TestResultController;
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
Route::get('/teacherDashboard',[DashboardController::class,'teacherDashboard']);

Route::get('/layout',function(){
    return view('components.layout.layout');
});


Route::get('/account-settings',[SessionController::class,'accountSettings']);
Route::get('/',[SessionController::class,'create'])->name('login');
Route::post('/login',[SessionController::class,'store']);
Route::post('/logout',[SessionController::class, 'logout']);
Route::post('/changepassword',[SessionController::class,'ChangePassword']);
Route::get('/forgot-password',[SessionController::class,'getForgotPassword'])->middleware('guest')->name('password.request');
Route::post('/forgot-password',[SessionController::class,'postForgetPassword'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}',[SessionController::class,'getResetPassword'])->middleware('guest')->name('password.reset');
Route::post('/reset-password',[SessionController::class,'postResetPassword'])->middleware('guest')->name('password.update');

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
Route::get('/view-attendance',[AttendanceController::class,'viewAttendance']);
Route::get('/get-attendance',[AttendanceController::class,'getAttendance']);

Route::get('/marks-employee-attendance',[EmployeeAttendanceController::class,'index']);
Route::post('/save-employee-attendance',[EmployeeAttendanceController::class,'store']);
Route::get('/employee-attendance-report',[EmployeeAttendanceController::class,'show']);


Route::get('/Lesson',[LessonController::class,'index']);
Route::post('/save-lesson',[LessonController::class,'store']);
Route::get('/syllabus-status',[LessonController::class,'syllabus_index']);
Route::get('/manage-lesson-plan',[LessonController::class,'lessonPlan']);
Route::get('/view-syllabus-status',[LessonController::class,'viewSyllabus']);


Route::get('/Topic',[TopicController::class,'index']);
Route::post('/save-topic', [TopicController::class,'store']);
Route::post('/update-topics-details',[TopicController::class,'update']);

Route::get('/create-test',[TestController::class,'index']);
Route::post('/add-test',[TestController::class,'store']);
Route::get('/view-test',[TestController::class,'viewTest']);
Route::get('/test-page/{id}/{lesson_id}',[TestResultController::class,'show']);
Route::post('/save-result',[TestResultController::class,'saveResult']);

Route::get('/create-exam',[ExamController::class,'index']);
Route::post('/add-exam',[ExamController::class,'store']);
Route::get('/add-exam-marks',[ExamController::class,'storeResult']);
Route::post('/save-exam-marks',[ExamController::class,'saveResult']);
Route::get('/result-cards',[ExamController::class,'ResultCard']);
Route::get('/view-result',[ExamController::class,'viewResult']);
Route::get('/view-exam',[ExamController::class,'viewExam']);

Route::get('/fee-collect',[FeeController::class,'index']);
Route::post('/save-fee-collect',[FeeController::class,'store']);
Route::get('/fee-slip',[FeeController::class,'feeSlip']);
Route::get('/view-fee-detail',[FeeController::class,'viewFee']);
Route::get('/online-payment',[FeeController::class,'onlinePayment'])->name('online-payment');

Route::post('/send-online-payment',[FeeController::class,'sendOnlinePayment']);

Route::get('/getcourse/{id}',[AjaxController::class,'getcourse']);
Route::get('/getlesson/{id}/{class_id}',[AjaxController::class,'getlesson']);
Route::get('/changeTopicStatus/{id}',[AjaxController::class,'changeTopicStatus']);
Route::get('/getexamresult/{id}/{exam_id}/{class_id}',[AjaxController::class,'getexamresult']);
Route::get('/checkFeeSubmit/{id}/{month}', [AjaxController::class,'checkFeeSubmit']);


Route::get('/title',function(){
    $temp;
    if(auth()->user()->type == 'teacher'){
    $temp = timetable::whereHas('courses', function ($query) {
        $query->where('id','=', Employee::select('course_id')->where('email','=',auth()->user()->email)->first()->course_id);
        })->with('courses','lessons')->get();
    }
    else{
        $temp = timetable::with('courses','lessons')->get();
    }
        if($temp){
            $result;
            $a = array();
            foreach ($temp as $key => $value) {
                $result['title'] = $value->courses->course_name.' '.$value->lessons->lesson_name;
                $result['start'] = $value->start;
                $result['end'] = $value->end;
                $result['allDay'] =  false;
                $a[] = $result;
            }
        }
        return response()->json($a ?? '');
        //return response()->json($data);
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
