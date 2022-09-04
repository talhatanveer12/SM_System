<?php

use App\Models\User;
use App\Models\Topic;
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
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\MarksGradingController;
use App\Http\Controllers\FeeParticularsController;
use App\Http\Controllers\EmployeeAttendanceController;

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
    $get_ids = Lesson::select('class_id','course_id')->groupBy('class_id','course_id')->get();
    $course_name;
    $lesson_name = array();
    $class_name;
    $swap = -1;
    foreach ($get_ids as $key => $value) {
        if($swap != $value['class_id']){
            unset($course_name);
            $swap = $value['class_id'];
        }
        $classes_name = Classes::select('class_name')->where('id', '=', $value['class_id'])->first();
        $courses_name = Course::select('course_name')->where('id', '=', $value['course_id'])->first();
        $get_lessons = Lesson::select('lesson_name')->where('class_id','=',$value->class_id)->where('course_id','=',$value->course_id)->get();
        foreach ($get_lessons as $key_1 => $value_1) {
            $lesson_name[] = $value_1['lesson_name'];
        }
        $course_name[$courses_name['course_name']] = $lesson_name;
        $class_name[$classes_name['class_name']] = $course_name;
        unset($lesson_name);
    }

    return view('Lesson-Plan.lesson',['Classes' => Classes::all(),'Lesson_detail' => $class_name ?? '']);
});

Route::get('/Topic',function(){

    $get_ids = Lesson::select('class_id','course_id')->groupBy('class_id','course_id')->get();
    $course_name;
    $lesson_name;
    $topic_name;
    $class_name;
    $swap = -1;
    foreach ($get_ids as $key => $value) {
        if($swap != $value['class_id']){
            unset($course_name);
            $swap = $value['class_id'];
        }
        $classes_name = Classes::select('class_name')->where('id', '=', $value['class_id'])->first();
        $courses_name = Course::select('course_name')->where('id', '=', $value['course_id'])->first();
        $get_lessons = Lesson::select('lesson_name','id')->where('class_id','=',$value->class_id)->where('course_id','=',$value->course_id)->get();
        //dd($get_lessons);
        foreach ($get_lessons as $key_1 => $value_1) {
            $get_topic = Topic::where('lesson_id','=',$value_1['id'])->get();
            if(count($get_topic)){
                foreach ($get_topic as $key_2 => $value_2) {
                    $topic_name[] = $value_2['topic_name'];
                }
                $lesson_name[$value_1['lesson_name']] = $topic_name;
                unset($topic_name);
                $course_name[$courses_name['course_name']] = $lesson_name;
                $class_name[$classes_name['class_name']] = $course_name;
                unset($lesson_name);
            }
            else{
                //$lesson_name[] = $value_1['lesson_name'];
            }
        }

    }
    //dd($class_name);
    return view('Lesson-Plan.topic',['Classes' => Classes::all(),'topic_detail' => $class_name ?? '']);
});


Route::post('/save-lesson', function () {
    $values = request()->validate([
        'class_id' => 'required',
        'course_id' => 'required',
        'lesson_name' => 'required|unique:lessons,lesson_name',
    ]);
    Lesson::create($values);
    return back()->with('success',"successfuly Lesson created");
});


Route::post('/save-topic', function () {
    //dd(request()->all());
    $values = request()->validate([
        'class_id' => 'required',
        'course_id' => 'required',
        'lesson_id' => 'required',
        'topic_name' => 'required|unique:topics,topic_name',
    ]);
    Topic::create([
        'lesson_id' => request('lesson_id'),
        'topic_name' => request('topic_name'),
    ]);
    return back()->with('success',"successfuly Topic created");
});

Route::get('/syllabus-status',function(){

    $topic_name;
    $completion_date;
    $lesson;
    $Course_name = '';
    if(request('class_id') && request('course_id')){
        $Course_name = Course::select('course_name')->where('id','=',request('course_id'))->first();
        $result = Lesson::where('class_id','=',request('class_id'))->where('course_id','=',request('course_id'))->get();
        foreach ($result as $key => $value) {
            $get_topic = Topic::where('lesson_id','=',$value->id)->get();
            if(count($get_topic)){
                $lesson[$value->lesson_name] = $get_topic;
            }
            else{
                $lesson[$value->lesson_name] = '';
            }
            unset($topic_name);
        }
        //dd($lesson);
    }
    return view('Lesson-Plan.syllabus-status',['Classes' => Classes::all(),'Courses' => Course::all(),'Course_name' => $Course_name,'lesson' => $lesson ?? '']);
});

Route::post('/update-topics-details',function(){

    Topic::where('id','=',request('topic_id'))->update([
        'completion_date' => request('completion_date'),
    ]);

    return back()->with('success',"successfuly Topic update");
    //dd(request()->all());
});

Route::get('/MakeExam',function(){
    return view('Exam.make-exam');
});

Route::post('/add-exam',function(){
    dd(request()->all());
});


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
    //dd($result);
    $html_body ='<option value="">Select Lesson</option>';
    foreach ($result as $key => $value) {
        $html_body .= '<option value="'.$value->id.'">'.$value->lesson_name.'</option>';
    }
    return $html_body;
});

Route::get('/changeTopicStatus/{id}',function($id){
    Topic::where('id','=',request('topic_id'))->update([
        'completion_date' => NULL,
    ]);
    return 'update';
});




// Route::get('/temp', function () {
//     return view('Classes.temp');
// });


// Route::get('/email', function () {
//     Mail::to('talhatanveer930@gmail.com')->send(new WelcomeMail('Talha','122121','12121212'));
//     return new WelcomeMail('Talha','122121','12121212');
// });