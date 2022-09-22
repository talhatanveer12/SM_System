<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Employee;
use App\Models\Institute;
use App\Models\ExamResult;
use App\Models\MarksGrading;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index(){
        $result;
        if(request('exam_id')){
            $result = Exam::find(request('exam_id'));
            //dd($result);
        }
        return view('Exam.create-exam',['Exams' => Exam::all(),'UpdateExam' => $result ?? '']);
    }

    public function store(){

        //dd(request()->all());
        $values = request()->validate([
            'exam_name' => 'required',
            'starting_date' => 'required',
            'ending_date' => 'required',
        ]);

        Exam::updateOrCreate([
            'id' => request('exam_id'),
        ],$values);

        return redirect()->route('CreateExam')->with('success',"successfuly Record Add/Update");
    }

    public function storeResult(){
        $result;
        $exam_result;
        if(request('class_id')){
            $result = Student::where('class_id','=',request('class_id'))->get();
            $exam_result = ExamResult::with('courses','students')->get();
        }
        //dd(auth()->user()->email);

        return view('Exam.add-exam-marks',['Classes' => Employee::GetClass() ?? '','Students' => $result ?? '','Courses' => $exam_result ?? '','Exams' => Exam::all()]);
    }

    public function saveResult(){
        //dd(request()->all());
        $values = request()->validate([
            'student_id' => 'required',
            'exam_id' => 'required',
            'course_id.*' => 'required',
            'total_marks' => 'required',
            'obtain_marks' => 'required',
        ]);
        //dd($values);
        $check_grade = MarksGrading::all();
        //dd($check_grade);
        foreach ($values['obtain_marks'] as $key1 => $value1) {
            foreach ($check_grade as $key => $value) {
                if($values['total_marks'][$key1]){
                    $percent = $value1/$values['total_marks'][$key1]*100;
                    if((int)$percent >= (int)$value->percent_from && (int)$percent <= (int)$value->percent_upto){
                        $values['grade'] = $value->grade_name;
                    }
                }
                else{
                    $values['grade'] = '-';
                }

            }
            ExamResult::updateOrCreate( [
                'student_id' => $values['student_id'],
                'course_id' => $values['course_id'][$key1],
                'exam_id' => $values['exam_id'],
            ],[
                'student_id' => $values['student_id'],
                'exam_id' => $values['exam_id'],
                'course_id' => $values['course_id'][$key1],
                'total_marks' => $values['total_marks'][$key1] ?? 0,
                'obtain_marks' => $values['obtain_marks'][$key1] ?? 0,
                'grade' => $values['grade'],

            ]);
        }

        return back()->with('success',"successfuly Add Exam Marks");
    }


    public function ResultCard(){
        $student;
        $exam_result;
        $grand_total;
        $Institute;

        if(request('roll_no')){
            $student = Student::where('roll_no','=',request('roll_no'))->with('classes')->first();
            //dd($student);
            if($student){
                $exam_result = ExamResult::where('student_id','=',$student->id)->with('courses','students')->get();
                if(count($exam_result)){
                    $o_marks=0;
                    $t_marks=0;
                    foreach ($exam_result as $key => $value) {
                        $o_marks += $value->obtain_marks;
                        $t_marks += $value->total_marks;
                    }
                    $check_grade = MarksGrading::all();
                    $percent = $o_marks/$t_marks *100;
                    foreach ($check_grade as $key => $value) {
                        if((int)$percent >= (int)$value->percent_from && (int)$percent <= (int)$value->percent_upto){
                            $grand_total['grade'] = $value->grade_name;
                        }
                    }
                    $grand_total['obtain_marks'] = $o_marks;
                    $grand_total['total_marks'] = $t_marks;
                    $grand_total['percent'] = $percent;
                }
            }
            $Institute = Institute::where('email','=',auth()->user()->email)->first();
        }
        return view('Exam.result-cards',['student' => $student ?? '','Exam_result' => $exam_result ?? '','Institute' => $Institute ?? '','grand_total' => $grand_total ?? '']);
    }

    public function viewResult(){
        $grand_total;

            //dd($student_id->id);
        $exam_result = ExamResult::where('student_id','=',Student::StudentId()->id)->with('courses','students')->get();
        if(count($exam_result)){
            foreach (Exam::all() as $key2 => $value2) {
                $o_marks=0;
                $t_marks=0;
                foreach ($exam_result as $key => $value) {
                    if($value2->id == $value->exam_id){
                        $o_marks += $value->obtain_marks;
                        $t_marks += $value->total_marks;
                    }
                }
                if($t_marks > 0){
                $check_grade = MarksGrading::all();
                $percent = $o_marks/$t_marks *100;
                foreach ($check_grade as $key => $value) {
                    if((int)$percent >= (int)$value->percent_from && (int)$percent <= (int)$value->percent_upto){
                        $grand_total[$key2]['grade'] = $value->grade_name;
                    }
                }
                $grand_total[$key2]['obtain_marks'] = $o_marks;
                $grand_total[$key2]['total_marks'] = $t_marks;
                $grand_total[$key2]['percent'] = $percent;
            }
            else{
                $grand_total[$key2] = '';
            }
        }
        }
        return view('Exam.view-result',['Exam_Result' => $exam_result,'Exam' => Exam::all(),'grand_total' => $grand_total ?? '']);
    }


    public function viewExam(){

        return view('Exam.view-exam',['Exam'=> Exam::all()]);
    }

    public function delete($id){
        Exam::where('id',$id)->delete();
        return back()->with('success',"successfuly Delete Exam");
    }
}





