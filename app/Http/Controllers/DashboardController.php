<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Fee;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function adminDashboard(){
        //dd(Carbon::now()->format('Y-m'));
        $studentCount = Classes::with('students')->get();
        $fee_sum = DB::table('fees')->select(DB::raw('SUM(fee_submit_amount) as fee_sum'), 'fee_month')
                ->groupBy('fee_month')->orderBy('fee_month', 'asc')->get();
        $month_fee = DB::table('fees')->select(DB::raw('SUM(fee_submit_amount) as total_month_fee'))
        ->where('fee_month','=',Carbon::now()->format('Y-m'))->groupBy('fee_month')->first();
        return view('Dashboard.admin-dashboard',['T_Student' => count(Student::all()),'T_Employee' => count(Employee::all()),'Total' => Fee::pluck('Total_fee')->sum(),'S_count' => $studentCount,'Fee_Sum' => $fee_sum,'month_fee' => $month_fee ?? 0]);
    }
    public function studentDashboard(){
        $Student = Student::where('email','=',auth()->user()->email)->with('classes')->first();
        $Fee = Fee::where('student_id','=',$Student->id)->get();
        return view('Dashboard.student-dashboard',['Student' => $Student,'Fee' => $Fee]);
    }
    public function teacherDashboard(){
        $studentCount = Classes::with('students')->get();
        $fee_sum = DB::table('fees')->select(DB::raw('SUM(fee_submit_amount) as fee_sum'), 'fee_month')
                ->groupBy('fee_month')->orderBy('fee_month', 'asc')->get();
        $month_fee = DB::table('fees')->select(DB::raw('SUM(fee_submit_amount) as total_month_fee'))
        ->where('fee_month','=',Carbon::now()->format('Y-m'))->groupBy('fee_month')->first();
        return view('Dashboard.teacher-dashboard',['T_Student' => count(Student::all()),'T_Employee' => count(Employee::all()),'Total' => Fee::pluck('Total_fee')->sum(),'S_count' => $studentCount,'Fee_Sum' => $fee_sum,'month_fee' => $month_fee ?? 0]);
    }

    public function guardianDashboard(){
        $Student = Student::where('guardian_email','=',auth()->user()->email)->with('classes')->first();
        $Fee = Fee::where('student_id','=',$Student->id)->get();
        return view('Dashboard.guardian-dashboard',['Student' => $Student,'Fee' => $Fee]);
    }

}
