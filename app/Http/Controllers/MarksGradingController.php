<?php

namespace App\Http\Controllers;

use App\Models\MarksGrading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarksGradingController extends Controller
{
    public function index(MarksGrading $marksGrading){
        return view('General-Settings.marks-grading',[ 'MarksGrading' => MarksGrading::all()]);
    }

    public function store(){
        for($i = 1; $i < 8;$i++){
            MarksGrading::where('id',$i)->update(['percent_from'=> request()['percent_from'][$i-1], 'percent_upto'=> request()['percent_upto'][$i-1], 'status'=> request()['status'][$i-1]]);
         }
         return back()->with('success',"Update Marks Grading successfuly");
    }
}
