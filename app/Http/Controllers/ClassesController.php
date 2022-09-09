<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassesController extends Controller
{
    public function store(){
        $values = request()->validate([
            'class_name' => 'required|unique:classes,class_name',
        ]);
        $values['class_limit'] = 40;
        Classes::create($values);

        return back()->with('success',"successfuly Class Create");
    }

    public function index(){
        $studentCount = Classes::with('students')->get();
        
        //dd(count($t[0]->students));
        //dd($t[0]->count);
        //$classes = DB::table('classes')->get();
        return view('Classes.all-classes', [ 'Classes' => $studentCount]);
    }

    public function show(){
        $studentCount = Classes::with('students')->get();
        //$classes = DB::table('classes')->get();
    return view('Classes.edit-delete-classes', [ 'Classes' => $studentCount]);
    }

    public function destroy($id){
        Classes::where('id', $id)->delete();
        return back()->with('success',"successfuly Class Delete");
    }

}
