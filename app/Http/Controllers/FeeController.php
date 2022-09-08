<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Institute;
use Illuminate\Http\Request;
use App\Models\FeeParticularAmount;

class FeeController extends Controller
{
    public function index(){
        $Students;
        $Fee;
        $FeeParticular;
        if(request('roll_no')){
            $FeeParticular = FeeParticularAmount::all()->first();
            $Students = Student::where('roll_no','=',request('roll_no'))->first();
            $check = Fee::where('student_id','=',request('roll_no'))->latest()->first();
            if($Students){
                if(!$check){
                    $Fee['student_id'] = $Students->id;
                    $Number_of_courses = count(Classes::find($Students->class_id)->courses);
                    $Fee['monthly_fee'] = $FeeParticular->per_course_fee*$Number_of_courses;
                    $Fee['remaining_fee'] = 0;
                    $Fee['admission_fee_status'] = 'No';
                    $Fee['total_fee'] = $FeeParticular->admission_fee+$FeeParticular->registration_fee+$FeeParticular->books+$FeeParticular->uniform;
                    $Fee['total_fee'] += $Fee['monthly_fee'] + $Fee['remaining_fee'];
                }
                else{
                    $Fee['admission_fee_status'] = $check->admission_fee_status;
                    $Fee['student_id'] = $Students->id;
                    $Number_of_courses = count(Classes::find($Students->class_id)->courses);
                    $Fee['monthly_fee'] = $FeeParticular->per_course_fee*$Number_of_courses;
                    $Fee['remaining_fee'] = $check->remaining_fee;
                    //$Fee['total_fee'] = $FeeParticular->admission_fee+$FeeParticular->registration_fee+$FeeParticular->books+$FeeParticular->uniform;
                    $Fee['total_fee'] = $Fee['monthly_fee'] + $Fee['remaining_fee'];
                }
            }
            // $Number_of_courses = count(Classes::find($Students->class_id)->courses);
            // $check_fee = Fee::where('');
            // $Fee['student_id'] = $Students->id;
            // $Fee['monthly_fee'] = $FeeParticular->per_course_fee*$Number_of_courses;
            // $Fee['admission_fee_status'] = '';
            // $Fee['remaining_fee'] = 0;

            //dd();
            //dd($Fee);
            //dd(request()->all());
            //$Students = Student::where('roll_no','=',request('roll_no'))->first();
            //$Students = Fee::where('roll_no')

        }
        return view('Fee.fee-collect',['Students' => $Students ?? '','Fee' => $Fee ?? '','FeeParticular' => $FeeParticular ?? '','Institute' => Institute::all()->first()]);
    }

    public function store(){

        //dd(request()->all());

        $min = (int)request('total_fee')/100*50;



        $messages = [
            'fee_submit_amount.min' => 'Minimum 50% Amount Submit',
          ];
        $values = request()->validate([
            'fee_month' => 'required',
            'fee_submit_date' => 'required',
            'fee_submit_amount' => 'required|integer|min:'.$min,
            'student_id' => 'required',
            'admission_fee_status' => 'required',
            'monthly_fee' => 'required',
            'remaining_fee' => 'required',
            'total_fee' => 'required',
            'admission_fee' => 'required',
            'registration_fee' => 'required',
            'books' => 'required',
            'uniform' => 'required',
        ], $messages);

        $values['admission_fee_status'] = 'Yes';
        $values['remaining_fee'] = (int)$values['total_fee'] - (int)$values['fee_submit_amount'];

        Fee::create($values);

        return back()->with('success',"successfuly Fee Submit");

        //dd(request()->all());
    }

    public function feeSlip(){
        $Fee;
        $Fee_print;
        if(request('roll_no') && request('fee_month')){
            $Students = Student::select('id')->where('roll_no','=',request('roll_no'))->first();
            if($Students){
                $Fee = Fee::where('student_id','=',$Students->id)->where('fee_month','=',request('fee_month'))->with('students')->first();
                $Fee_print = Fee::where('student_id','=',$Students->id)->get();
            }
        }

        //dd(Fee::where('student_id','=',1)->with('students')->get());
        return view('Fee.fee-slip',['Fee' => $Fee ?? '','Institute' => Institute::all()->first(),'FeePrint' => $Fee_print ?? '']);
    }
}
