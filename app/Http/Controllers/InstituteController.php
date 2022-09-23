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

    // update and store institute logo and save logo path in session

    public function storeLogo(Institute $institute){
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

    // Update the institue detail like name,email,website.phone and address

    public function store(Institute $institute){
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
