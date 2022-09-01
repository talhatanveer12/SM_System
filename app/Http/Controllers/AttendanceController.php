<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(){
        $attendance = '';
        if(request('class_id')){
            $result = Attendance::where('attendance_date','=',request('attendance_date'))->where('class_id','=',request('class_id'))->get();
            if(!count($result)){
                $attendance = Student::latest();
                if(request('class_id')){
                    $attendance->where('class_id','=',request('class_id'));
                }
                $attendance = $attendance->get();
            }
            else{
                $attendance = Attendance::where('attendance_date','=',request('attendance_date'))->where('class_id','=',request('class_id'))->get();
                foreach ($attendance as $key => $value) {
                    $result = Student::where('id','=',$value->student_id)->get();
                    $attendance[$key]['first_name'] = $result[0]->first_name;
                    $attendance[$key]['last_name'] = $result[0]->last_name;
                    $attendance[$key]['admission_no'] = $result[0]->admission_no;
                    $attendance[$key]['roll_no'] = $result[0]->roll_no;
                    $attendance[$key]['id'] = $value->student_id;
                }

            }
        }
        return view('Attendance.marks-student-attendance',['Classes' => Classes::all(), 'Attendance' => $attendance]);
    }

    public function store(){
        for( $i = 0 ; $i < sizeof(request('student_id')) ;$i++ ){
            Attendance::updateOrCreate(
                ['student_id' => request('student_id')[$i],'attendance_date' => request('attendance_date')],
                ['student_id' => request('student_id')[$i],
                'class_id' => request('class_id'),
                'attendance' => request(request('student_id')[$i]),
                'note' => request('note')[$i],
                'attendance_date' => request('attendance_date'),
            ]);
        }
        return back()->with('success',"successfuly Attendance Save");
    }

    public function show(){
        $attendance = '';
        if(request('class_id')){
            $attendance = Attendance::where('attendance_date','=',request('attendance_date'))->where('class_id','=',request('class_id'))->get();
            foreach ($attendance as $key => $value) {
                $result = Student::where('id','=',$value->student_id)->get();
                $attendance[$key]['first_name'] = $result[0]->first_name;
                $attendance[$key]['last_name'] = $result[0]->last_name;
                $attendance[$key]['admission_no'] = $result[0]->admission_no;
                $attendance[$key]['roll_no'] = $result[0]->roll_no;
                $attendance[$key]['id'] = $value->student_id;
            }
        }
        return view('Attendance.student-attendance-report',['Classes' => Classes::all(),'Attendance' => $attendance]);
    }
}
