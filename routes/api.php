<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\EmployeeAttendanceController;
use App\Http\Controllers\FeeParticularAmountController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['adminOnly','auth'])->group(function () {
    Route::post('/updatelogo/{institute}', [InstituteController::class,'storeLogo']);
    Route::post('/update/{institute}', [InstituteController::class,'store']);
    Route::post('/update', [FeeParticularAmountController::class,'store']);
    Route::post('/add-class',[ClassesController::class,'store']);
    Route::post('/save-assign-course',[CourseController::class,'StoreAssignCourse']);
    Route::post('/save-course', [CourseController::class,'store']);
    Route::post('/save-student-detail',[StudentController::class,'store']);
    Route::post('/save-employee-detail',[EmployeeController::class,'store']);
    Route::post('/save-employee-attendance',[EmployeeAttendanceController::class,'store']);
    Route::post('/add-exam',[ExamController::class,'store']);
    Route::post('/save-fee-collect',[FeeController::class,'store']);
});


