<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Topic;
use App\Models\Lesson;
use App\Models\Classes;
use App\Models\ExamResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function getcourse($id){
        $result = Classes::find($id)->courses;
        $html_body ='<option value="">Select Course</option>';
        foreach ($result as $key => $value) {
            $html_body .= '<option value="'.$value->id.'">'.$value->course_name.'</option>';
        }
        return $html_body;
    }
    public function getlesson($id,$class_id){
        $result = Lesson::where('course_id','=',$id)->get();
        $html_body ='<option value="">Select Lesson</option>';
        foreach ($result as $key => $value) {
            $html_body .= '<option value="'.$value->id.'">'.$value->lesson_name.'</option>';
        }
        return $html_body;
    }
    public function changeTopicStatus($id){
        Topic::where('id','=',$id)->update([
            'completion_date' => NULL,
        ]);
        return 'update';
    }

    public function getexamresult($id,$exam_id,$class_id){
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
    }

    public function checkFeeSubmit($id,$month){
        $check = Fee::where('student_id','=',$id)->where('fee_month','=',$month)->first();
        return $check;
    }
}
