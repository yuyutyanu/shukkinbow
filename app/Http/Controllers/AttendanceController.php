<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service\AttendanceService;
use App\t_attendancerecord;

class AttendanceController extends Controller{
    public function start(){
        session()->put("attendance_id",[]);//計測終了時に出勤情報検索するためのidの初期化
        return view('/start');
    }

    public function count(){
        return view('/count');
    }

    public function end(AttendanceService $service, t_attendancerecord $attendance){
        $attendance_info = $service->getAttendanceInfo($attendance);
        return view('/end',compact('attendance_info'));
    }


    public function startTime(Request $request, AttendanceService $service, t_attendancerecord $attendance) {
        $service->setStartTime($request, $attendance);
    }

    public function endtime(Request $request, AttendanceService $service, t_attendancerecord $attendance){
        $service->setEndTime($request, $attendance);
    }
}