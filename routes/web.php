<?php

use App\Models\Fee;
use App\Models\Exam;
use App\Models\Test;
use App\Models\User;
use App\Models\Topic;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Employee;
use App\Mail\WelcomeMail;
use App\Models\Institute;
use App\Models\Attendance;
use App\Models\ExamResult;
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
use App\Http\Controllers\FeeController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;
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
Route::get('/adminDashboard', function () {
    return view('Dashboard.admin-dashboard',['T_Student' => count(Student::all()),'T_Employee' => count(Employee::all()),'Total' => Fee::pluck('Total_fee')->sum()]);
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
Route::get('/Topic',[TopicController::class,'index']);
Route::post('/save-lesson',[LessonController::class,'store']);
Route::post('/save-topic', [TopicController::class,'store']);
Route::get('/syllabus-status',[LessonController::class,'syllabus_index']);
Route::post('/update-topics-details',[TopicController::class,'update']);
Route::get('/create-test',[TestController::class,'index']);
Route::post('/add-test',[TestController::class,'store']);

Route::get('/create-exam',[ExamController::class,'index']);
Route::post('/add-exam',[ExamController::class,'store']);
Route::get('/add-exam-marks',[ExamController::class,'storeResult']);
Route::post('/save-exam-marks',[ExamController::class,'saveResult']);
Route::get('/result-cards',[ExamController::class,'ResultCard']);

Route::get('/fee-collect',[FeeController::class,'index']);

Route::post('/save-fee-collect',[FeeController::class,'store']);

Route::get('/fee-slip',[FeeController::class,'feeSlip']);






// Ajax
Route::get('/getcourse/{id}',function($id){
    $result = Classes::find($id)->courses;
    $html_body ='<option value="">Select Course</option>';
    foreach ($result as $key => $value) {
        $html_body .= '<option value="'.$value->id.'">'.$value->course_name.'</option>';
    }
    return $html_body;
});

Route::get('/getlesson/{id}/{class_id}',function($id,$class_id){
    $result = Lesson::where('course_id','=',$id)->where('class_id','=',$class_id)->get();
    $html_body ='<option value="">Select Lesson</option>';
    foreach ($result as $key => $value) {
        $html_body .= '<option value="'.$value->id.'">'.$value->lesson_name.'</option>';
    }
    return $html_body;
});

Route::get('/changeTopicStatus/{id}',function($id){
    Topic::where('id','=',$id)->update([
        'completion_date' => NULL,
    ]);
    return 'update';
});

Route::get('/getexamresult/{id}/{exam_id}/{class_id}',function($id,$exam_id,$class_id){
    $exam_result = ExamResult::where('student_id','=',$id)->where('exam_id','=',$exam_id)->with('courses','students')->get();
    $html_body = '';
    if(count($exam_result)){
        foreach ($exam_result as $course){
            $html_body.='<input class="form-control" type="hidden" name="course_id[]"';
            $html_body.='value="'.$course->courses->id.'"/>';
            $html_body.='<h6 class="mt-3">'.$course->courses->course_name.'</h6>';
            $html_body.='<input class="form-control" type="number" name="total marks[]" value="'.$course->total_marks.'"/>';
            $html_body.='<input class="form-control" type="number" name="obtain marks[]" value="'.$course->obtain_marks.'"/>';
        }
    }
    else{
        $exam_result = Classes::find(request('class_id'))->courses;
        foreach ($exam_result as $key => $value){
            $html_body.='<input class="form-control" type="hidden" name="course_id[]"';
            $html_body.='value="'.$value->id.'"/>';
            $html_body.='<h6 class="mt-3">'.$value->course_name.'</h6>';
            $html_body.='<input class="form-control" type="number" name="total marks[]"/>';
            $html_body.='<input class="form-control" type="number" name="obtain marks[]"/>';
        }
    }
    return $html_body;
});

Route::get('/checkFeeSubmit/{id}/{month}', function($id,$month){
    $check = Fee::where('student_id','=',$id)->where('fee_month','=',$month)->first();
    return $check;
});
