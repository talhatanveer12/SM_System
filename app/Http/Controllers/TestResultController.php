<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Question;
use App\Models\LessonTest;
use App\Models\TestResult;
use Illuminate\Http\Request;
use App\Models\StudentTestResult;

class TestResultController extends Controller
{
    public function show($id,$lesson_id){
        if(!count(TestResult::where('student_id','=',Student::StudentId()->id)->where('lesson_test_id','=',$id)->get()))
            $result= LessonTest::where('lesson_id','=',$lesson_id)->with('questions')->paginate(2);
        else{
            $result = 'submit';
        }
        return view('Lesson-Test.test-page',['Questions' => $result ?? '','test_id' => $id,'lesson_id' => $lesson_id ?? '']);
    }

    public function saveResult(){
        //dd(request()->all());
        $Total_number=0;
        $obtain_number=0;
        $student_id = Student::where('email','=',auth()->user()->email)->first(['id']);
        foreach (request('question_id') as $key => $value) {

            $answer = Question::where('id','=',$value)->first(['correct_answer','question_type','marks']);
            $Total_number+= $answer->marks;
            if($answer->question_type == 'mco'){
                if($answer->correct_answer == json_encode(request('correct_answer_'.$value))){
                    $obtain_number+=$answer->marks;
                    StudentTestResult::create([
                        'student_id' => $student_id->id,
                        'question_id' => $value,
                        'lesson_id' => request('lesson_id'),
                        'correct' => 'true',
                        'answer' => json_encode(request('correct_answer_'.$value)) ?? '-'
                    ]);
                }
                else {
                    StudentTestResult::create([
                        'student_id' => $student_id->id,
                        'question_id' => $value,
                        'lesson_id' => request('lesson_id'),
                        'correct' => 'false',
                        'answer' => json_encode(request('correct_answer_'.$value)) ?? '-'
                    ]);
                }
            }
            else{
                if($answer->correct_answer == request('correct_answer_'.$value)){
                    $obtain_number+=$answer->marks;
                    StudentTestResult::create([
                        'student_id' => $student_id->id,
                        'question_id' => $value,
                        'lesson_id' => request('lesson_id'),
                        'correct' => 'true',
                        'answer' => request('correct_answer_'.$value) ?? '-'
                    ]);
                }
                else {
                    StudentTestResult::create([
                        'student_id' => $student_id->id,
                        'question_id' => $value,
                        'lesson_id' => request('lesson_id'),
                        'correct' => 'false',
                        'answer' => request('correct_answer_'.$value) ?? '-'
                    ]);
                }
            }
        }

        $values['student_id'] = $student_id->id;
        $values['lesson_test_id'] = request('lesson_test_id');
        $values['total_no'] = $Total_number;
        $values['obtain_no'] = $obtain_number;
        TestResult::create($values);
        return redirect()->route('viewTest');

    }

    public function showTestResult($id,$lesson_id){
        if(count(TestResult::where('student_id','=',Student::StudentId()->id)->where('lesson_test_id','=',$id)->get()))
            $result= LessonTest::where('lesson_id','=',$lesson_id)->with('questions')->paginate(2);

        //dd(Student::StudentId()->id);
        //dd(Question::whereHas('answers',function($query) {$query->where('student_id','=','2');})->with('answers')->get());
        //dd(StudentTestResult::where('student_id',Student::StudentId()->id)->with('questions')->get());
        $result = StudentTestResult::where('student_id',Student::StudentId()->id)->with('questions','lesson')->get();

        //$result= LessonTest::where('lesson_id','=',$lesson_id)->whereHas('questions', function ($query) { $query->whereHas('answers' , function($query1) { $query1->where('student_id',Student::StudentId()->id);})->with('answers'); })->with('questions')->paginate(2);
        // else{
        //     $result = 'submit';
        // }
        //$result= LessonTest::where('lesson_id','=',$lesson_id)->with('questions')->paginate(2);
        //dd($result);
        return view('Lesson-Test.show-test-result',['Questions' => $result ?? '','test_id' => $id,'lesson_id' => $lesson_id ?? '']);
    }
}
