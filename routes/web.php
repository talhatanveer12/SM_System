<?php

use App\Models\User;
use App\Models\Classes;
use App\Models\MarksGrading;
use App\Models\FeeParticulars;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\MarksGradingController;
use App\Http\Controllers\FeeParticularsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/adminDashboard', function () {
    return view('Dashboard.admin-dashboard');
});

Route::get('/',[SessionController::class,'create']);
Route::post('/login',[SessionController::class,'store']);
Route::post('/logout',[SessionController::class, 'logout']);
Route::post('/changepassword',[SessionController::class,'ChangePassword']);

Route::get('/institute-profile',[InstituteController::class,'index']);
Route::post('/updatelogo/{institute}', [InstituteController::class,'storeLogo']);
Route::post('/update/{institute}', [InstituteController::class,'store']);

Route::get('/fee-particulars',[FeeParticularsController::class,'index']);
Route::post('/update', [FeeParticularsController::class,'store']);
Route::post('/add-class',function(){
    $values = request()->validate([
        'class_name' => 'required|unique:classes,class_name',
    ]);
    $values['class_limit'] = 40;
    Classes::create($values);

    return back()->with('success',"successfuly Class Create");
});


Route::get('/marks-grading', [MarksGradingController::class,'index']);
Route::post('/marks-grading/update', [MarksGradingController::class,'store']);

Route::get('/account-settings', function () {
    return view('General-Settings.account-settings');
});


Route::get('/all-classes', function (Classes $classes) {
    $classes = DB::table('classes')->get();
    return view('Classes.all-classes', [ 'Classes' => $classes]);
});

Route::get('/edit-delete-class', function (Classes $classes) {
    $classes = DB::table('classes')->get();
    return view('Classes.edit-delete-classes', [ 'Classes' => $classes]);
});

Route::get('/delete/{id}', function ($id) {
    //dd($id);
    Classes::where('id', $id)->delete();
    return back()->with('success',"successfuly Class Delete");
    // $classes = DB::table('classes')->get();
    // return view('Classes.edit-delete-classes', [ 'Classes' => $classes]);
});
