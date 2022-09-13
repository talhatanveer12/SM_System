<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Course;
use App\Models\Option;
use App\Models\Classes;
use App\Models\Question;
use App\Models\LessonTest;
use App\Models\TestQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function index(){
        $result;
        if(request('lesson_id')){
            $result= LessonTest::where('lesson_id','=',request('lesson_id'))->with('questions')->get();
        }
        // foreach ($result as $key => $value) {
        //     foreach ($value->questions as $key1=> $value1) {
        //         foreach ($value1->options as $key2 => $value2) {
        //             dd($value2);
        //         }
        //         // if(count($value1->options))
        //         //     print('32');
        //         //dd($value1->options);
        //     }
        // }
        //dd($v);
        //dd(request()->all());
        //$result = Test::where('lesson_id','=',request('lesson_id'))->get();
        //dd($result);
        return view('Lesson-Test.create-test',['Classes' => Classes::all(),'Courses' => Course::all(),'Questions' => $result ?? '']);
    }

    public function store(){
        //dd(request()->all());

        //dd(json_encode(request('correct_answer')));



        $checkTest = LessonTest::where('lesson_id','=',request('lesson_id'))->first();
        $question_id;
        if(!$checkTest){
            $checkTest = LessonTest::create([
                'lesson_id' => request('lesson_id'),
            ]);
        }

        if(request('question_type') == 'mcq'){
            $values = request()->validate([
                'question' => 'required',
                'correct_answer' => 'required',
                'question_type' => 'required',
            ]);
            $value = request()->validate([
                'option.*' => 'required',
            ]);

            $question_id = Question::create($values);
            foreach (request('option') as $value) {
                Option::create([
                    'option' => $value,
                    'question_id' => $question_id->id,
                ]);
            }
        }
        else if(request('question_type') == 'blanks'){
            $values = request()->validate([
                'question' => 'required',
                'correct_answer' => 'required',
                'question_type' => 'required',
            ]);
            $question_id = Question::create($values);
        }
        else{
            $values = request()->validate([
                'question' => 'required',
                'correct_answer' => 'required',
                'question_type' => 'required',
            ]);
            $value = request()->validate([
                'option.*' => 'required',
            ]);
            $question_id = Question::create([
                'question' => request('question'),
                'correct_answer' => json_encode(request('correct_answer')),
                'question_type' => request('question_type'),
            ]);
            foreach (request('option') as $value) {
                Option::create([
                    'option' => $value,
                    'question_id' => $question_id->id,
                ]);
            }
        }

        TestQuestion::create([
            'lesson_test_id' => $checkTest->id,
            'question_id' => $question_id->id,
        ]);






        // $values = request()->validate([
        //     'lesson_id' => 'required',
        //     'question' => 'required',
        //     'option_A' => 'required',
        //     'option_B' => 'required',
        //     'option_C' => 'required',
        //     'option_D' => 'required',
        //     'correct_option' => 'required',
        // ]);

       // $values['test_type'] = 'mcqs';

       // Test::create($values);

       return back()->with('success',"successfuly Question add");
    }
}
