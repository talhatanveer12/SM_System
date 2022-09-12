<?php

namespace App\Http\Controllers;

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
        $studentCount = Classes::with('students')->get();
        $fee_sum = DB::table('fees')->select(DB::raw('SUM(fee_submit_amount) as fee_sum'), 'fee_month')
                ->groupBy('fee_month')->orderBy('fee_month', 'asc')->get();
        return view('Dashboard.admin-dashboard',['T_Student' => count(Student::all()),'T_Employee' => count(Employee::all()),'Total' => Fee::pluck('Total_fee')->sum(),'S_count' => $studentCount,'Fee_Sum' => $fee_sum]);
    }
    public function studentDashboard(){
        return view('Dashboard.student-dashboard');
    }
}
