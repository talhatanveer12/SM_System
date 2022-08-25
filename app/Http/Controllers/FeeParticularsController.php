<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeeParticulars;
use Illuminate\Support\Facades\DB;

class FeeParticularsController extends Controller
{
    public function index(FeeParticulars $particulars){
        $particulars = DB::table('fee_particulars')->get();
        return view('General-Settings.fee-particulars',[ 'Particulars' => $particulars]);
    }

    public function store(){
        for($i = 1; $i < 9;$i++){
            FeeParticulars::where('id',$i)->update(['particular_name'=> request()['fee_particulars'][$i-1], 'prefix_amount'=> request()['prefix_amount'][$i-1]]);
         }
         return back()->with('success',"Update Fee Particulars successfuly");
    }
}
