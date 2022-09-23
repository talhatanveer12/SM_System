<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeeParticulars;
use Illuminate\Support\Facades\DB;
use App\Models\FeeParticularAmount;

class FeeParticularAmountController extends Controller
{
    public function index(FeeParticulars $particulars){
        return view('General-Settings.fee-particulars',[ 'Particulars' => FeeParticularAmount::all()]);
    }

    public function store(){
        $values = request()->validate([
            'admission_fee' => 'required',
            'registration_fee' => 'required',
            'books' => 'required',
            'uniform' => 'required',
            'fine' => 'required',
            'other' => 'required',
            'per_course_fee' => 'required',

        ]);
        FeeParticularAmount::where('id',request('id'))->update($values);
         return back()->with('success',"Update Fee Particulars successfuly");
    }
}
