<?php

use App\Models\Employee;
use App\Jobs\sendMailJob;
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
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\TestResultController;
use App\Http\Controllers\AssignCourseController;
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

Route::middleware(['check'])->group(function () {
    Route::get('/adminDashboard', [DashboardController::class,'adminDashboard'])->name('adminDashboard');
    Route::get('/studentDashboard',[DashboardController::class,'studentDashboard'])->middleware('student')->name('studentDashboard');
    Route::get('/teacherDashboard',[DashboardController::class,'teacherDashboard'])->name('teacherDashboard');
    Route::get('/guardianDashboard',[DashboardController::class,'guardianDashboard'])->name('guardianDashboard');
});

Route::middleware(['adminOnly','auth'])->group(function () {
    Route::get('/general-settings/institute-profile',[InstituteController::class,'index']);
    Route::get('/general-settings/fee-particulars',[FeeParticularAmountController::class,'index']);
    Route::get('/class/all-classes',[ClassesController::class,'index']);
    Route::get('/class/edit-delete-class',[ClassesController::class,'show']);
    Route::get('/delete/{id}',[ClassesController::class,'destroy']);
    Route::get('/course/add-courses',[CourseController::class,'create'])->name("AddCourse");
    Route::get('/course/assign-courses',[CourseController::class,'AssignCourse'])->name('AssignCourse');
    Route::get('/delete-assign-courses/{id}',[CourseController::class,'delete']);
    Route::get('/student/add-student',[StudentController::class,'create'])->name('addStudent');
    Route::get('/employee/add-employee',[EmployeeController::class,'create'])->name('addEmployee');
    Route::get('/attendance/marks-employee-attendance',[EmployeeAttendanceController::class,'index']);
    Route::get('/attendance/employee-attendance-report',[EmployeeAttendanceController::class,'show']);
    Route::get('/exam/create-exam',[ExamController::class,'index'])->name('CreateExam');
    Route::get('/delete-exam/{id}',[ExamController::class,'delete']);
    Route::get('/delete-course/{id}',[CourseController::class,'deleteCourse']);
    Route::get('/fee/fee-collect',[FeeController::class,'index']);
    Route::get('/fee/fee-slip',[FeeController::class,'feeSlip']);

});


Route::get('/view-test',[TestController::class,'show'])->name('viewTest');
Route::get('/test/create-test',[TestController::class,'index']);
Route::post('/add-test',[TestController::class,'store']);


Route::get('/view-attendance',[AttendanceController::class,'viewAttendance']);
Route::get('/attendance/marks-student-attendance',[AttendanceController::class,'index']);
Route::get('/attendance/student-attendance-report',[AttendanceController::class,'show']);
Route::post('/save-student-attendance', [AttendanceController::class,'store']);
Route::get('/get-attendance',[AttendanceController::class,'getAttendance']);


Route::get('/view-syllabus-status',[LessonController::class,'viewSyllabus']);
Route::get('/lesson/Lesson-list',[LessonController::class,'index'])->name('lesson_list');
Route::post('/save-lesson',[LessonController::class,'store']);
Route::get('/lesson/syllabus-status',[LessonController::class,'syllabus_index']);
Route::get('/lesson/manage-lesson-plan',[LessonController::class,'lessonPlan']);
Route::get('/delete-lesson/{id}',[LessonController::class,'delete']);


Route::get('/view-result',[ExamController::class,'viewResult']);
Route::get('/view-exam',[ExamController::class,'viewExam']);
Route::get('exam/add-exam-marks',[ExamController::class,'storeResult']);
Route::post('/save-exam-marks',[ExamController::class,'saveResult']);
Route::get('exam/result-cards',[ExamController::class,'ResultCard']);


Route::get('/view-fee-detail',[FeeController::class,'viewFee']);
Route::get('/online-payment',[FeeController::class,'onlinePayment'])->name('online-payment');
Route::post('/send-online-payment',[FeeController::class,'sendOnlinePayment']);


Route::get('/employee/all-employee',[EmployeeController::class,'index']);


Route::get('general-settings/marks-grading', [MarksGradingController::class,'index']);
Route::post('/marks-grading/update', [MarksGradingController::class,'store']);


Route::get('/student/all-student',[StudentController::class,'index']);

Route::get('/lesson/Topic',[TopicController::class,'index'])->name('viewTopic');
Route::post('/save-topic', [TopicController::class,'store']);
Route::post('/update-topics-details',[TopicController::class,'update']);
Route::get('/delete-topic/{id}',[TopicController::class,'delete']);


Route::get('/view-test-result/{id}/{lesson_id}',[TestResultController::class,'showTestResult']);
Route::get('/test-page/{id}/{lesson_id}',[TestResultController::class,'show']);
Route::post('/save-result',[TestResultController::class,'saveResult']);



Route::get('general-settings/account-settings',[SessionController::class,'accountSettings']);
Route::get('/',[SessionController::class,'create'])->middleware('admin')->name('login');
Route::post('/login',[SessionController::class,'store'])->middleware('throttle:login');
Route::post('/logout',[SessionController::class, 'logout']);
Route::post('/changepassword',[SessionController::class,'ChangePassword']);
Route::get('/forgot-password',[SessionController::class,'getForgotPassword'])->middleware('guest')->name('password.request');
Route::post('/forgot-password',[SessionController::class,'postForgetPassword'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}',[SessionController::class,'getResetPassword'])->middleware('guest')->name('password.reset');
Route::post('/reset-password',[SessionController::class,'postResetPassword'])->middleware('guest')->name('password.update');

Route::get('/getcourse/{id}',[AjaxController::class,'getcourse']);
Route::get('/getlesson/{id}/{class_id}',[AjaxController::class,'getlesson']);
Route::get('/changeTopicStatus/{id}',[AjaxController::class,'changeTopicStatus']);
Route::get('/getexamresult/{id}/{exam_id}/{class_id}',[AjaxController::class,'getexamresult']);
Route::get('/checkFeeSubmit/{id}/{month}', [AjaxController::class,'checkFeeSubmit']);


Route::get('/get-timetable',[TimetableController::class,'index']);
Route::post('/save-timetable',[TimetableController::class,'store']);


Route::get('/users/export', [AssignCourseController::class, 'export']);
