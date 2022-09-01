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
        $classes = DB::table('classes')->get();
        return view('Classes.all-classes', [ 'Classes' => $classes]);
    }

    public function show(){
        $classes = DB::table('classes')->get();
    return view('Classes.edit-delete-classes', [ 'Classes' => $classes]);
    }

    public function destroy($id){
        Classes::where('id', $id)->delete();
        return back()->with('success',"successfuly Class Delete");
    }

}
