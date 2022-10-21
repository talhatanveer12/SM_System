<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Question;
use App\Models\LessonTest;
use App\Models\TestResult;
use Illuminate\Http\Request;

class TestResultController extends Controller
{
    public function show($id,$lesson_id){
        if(!count(TestResult::where('student_id','=',Student::StudentId()->id)->where('lesson_test_id','=',$id)->get()))
            $result= LessonTest::where('lesson_id','=',$lesson_id)->with('questions')->paginate(2);
        else{
            $result = 'submit';
        }
        return view('Lesson-Test.test-page',['Questions' => $result ?? '','test_id' => $id]);
    }

    public function saveResult(){
        //dd(request()->all());
        $Total_number=0;
        $obtain_number=0;
        foreach (request('question_id') as $key => $value) {
            $Total_number+= 1;
            $answer = Question::where('id','=',$value)->first(['correct_answer','question_type']);
            if($answer->question_type == 'mco'){
                if($answer->correct_answer == json_encode(request('correct_answer_'.$value))){
                    $obtain_number+=1;
                }
            }
            else{
                if($answer->correct_answer == request('correct_answer_'.$value)){
                    $obtain_number+=1;
                }
            }
        }
        $student_id = Student::where('email','=',auth()->user()->email)->first(['id']);
        $values['student_id'] = $student_id->id;
        $values['lesson_test_id'] = request('lesson_test_id');
        $values['total_no'] = $Total_number;
        $values['obtain_no'] = $obtain_number;
        TestResult::create($values);
        return redirect()->route('viewTest');

    }
}
