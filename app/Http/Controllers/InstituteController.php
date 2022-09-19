<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class InstituteController extends Controller
{
    public function index(Institute $institute){
        return view('General-Settings.institute-profile',[ 'Institute' => Institute::InstituteData() ?? '']);
    }

    public function storeLogo(Institute $institute){

        //dd($institute);
        $values = request()->validate([
            'logo' => 'required|image',
        ]);
        if(isset($values['logo'])){
            $values['logo'] = request()->file('logo')->store('logo');
        }

        $institute->update($values);
        session(['photo' => Institute::where('email','=',auth()->user()->email)->first(['logo'])->logo]);

        return back()->with('success',"Update Logo successfuly");
    }


    public function store(Institute $institute){

        //dd(request()->all());
        $values = request()->validate([
            'name' => 'required',
            'email' => ['required','email', Rule::unique('institutes','email')->ignore($institute->id)],
            'website' => 'url',
            'phone' => 'numeric|min:10',
            'address' => ''
        ]);

        $institute->update($values);

        return back()->with('success',"Update Info successfuly");
    }
}
