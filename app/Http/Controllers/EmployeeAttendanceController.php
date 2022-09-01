<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeAttendanceController extends Controller
{
    public function index(){
        $attendance = '';
        if(request('attendance_date')){
        $attendance = EmployeeAttendance::where('attendance_date','=',request('attendance_date'))->get();
            if(!count($attendance)){
                $attendance = Employee::latest()->get();
            }
            else{
                foreach ($attendance as $key => $value) {
                    $result = Employee::where('id','=',$value->employee_id)->get();
                    $attendance[$key]['first_name'] = $result[0]->first_name;
                    $attendance[$key]['last_name'] = $result[0]->last_name;
                    $attendance[$key]['reg_no'] = $result[0]->reg_no;
                    $attendance[$key]['employee_no'] = $result[0]->employee_no;
                    $attendance[$key]['id'] = $value->employee_id;
                }

            }
        }
        return view('Attendance.marks-employee-attendance',['Attendance' => $attendance]);
    }

    public function store(){
        for( $i = 0 ; $i < sizeof(request('employee_id')) ;$i++ ){
            EmployeeAttendance::updateOrCreate(
                ['employee_id' => request('employee_id')[$i],'attendance_date' => request('attendance_date')],
                ['employee_id' => request('employee_id')[$i],
                'attendance' => request(request('employee_id')[$i]),
                'note' => request('note')[$i],
                'attendance_date' => request('attendance_date'),
            ]);
        }
        return back()->with('success',"successfuly Attendance Save");
    }

    public function show(){
        $attendance = '';
        if(request('attendance_date')){
            $attendance = EmployeeAttendance::where('attendance_date','=',request('attendance_date'))->get();
            foreach ($attendance as $key => $value) {
                $result = Employee::where('id','=',$value->employee_id)->get();
                $attendance[$key]['first_name'] = $result[0]->first_name;
                $attendance[$key]['last_name'] = $result[0]->last_name;
                $attendance[$key]['reg_no'] = $result[0]->reg_no;
                $attendance[$key]['employee_no'] = $result[0]->employee_no;
                $attendance[$key]['id'] = $value->employee_id;
            }
        }

        return view('Attendance.employee-attendance-report',['Attendance' => $attendance]);
    }
}
