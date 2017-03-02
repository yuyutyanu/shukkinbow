<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service\AttendanceService;
use App\t_attendancerecord;

class AttendanceController extends Controller{
    public function start(AttendanceService $service){
        $service->initAttendanceId();   //勤務情報検索用　初期化
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
        $service->switchCountFlag();
        $service->setStartTime($request, $attendance);

        return 0;
    }

    public function endtime(Request $request, AttendanceService $service, t_attendancerecord $attendance){
        $service->switchCountFlag();
        $service->setEndTime($request, $attendance);

        return 0;
    }
}