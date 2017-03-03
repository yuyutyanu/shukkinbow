<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service\AttendanceService;
use App\t_attendancerecord;
use App\t_user;

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


    public function startTime(Request $request, AttendanceService $service, t_attendancerecord $attendance, t_user $shukkinbow_user) {
        $service->switchCountFlag();
        $service->setStartTime($request, $attendance, $shukkinbow_user);
        $service->setLocation($request, $attendance);

        return 0;
    }
    public function countTime(Request $request, AttendanceService $service, t_attendancerecord $attendance){
        $current_time = $request->get("current_time");
        $current_time = $service->getCountTime($attendance,$current_time);
        return $current_time;
    }

    public function endtime(Request $request, AttendanceService $service, t_attendancerecord $attendance){
        $service->switchCountFlag();
        $service->setEndTime($request, $attendance);

        return 0;
    }
}