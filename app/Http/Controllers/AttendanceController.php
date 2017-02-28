<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service\AttendanceService;
use App\t_attendancerecord;

class AttendanceController extends Controller
{
    public function start(){
        return view('/start');
    }
    public function count(){
        return view('/count');
    }
    public function end(){
        return view('/end');
    }
    public function addStartTime(Request $request, AttendanceService $service, t_attendancerecord $attendance) {
        $service->addStartTime($request, $attendance);
    }
    public function addEndtime(Request $request, AttendanceService $service, t_attendancerecord $attendance){
        $service->addEndTime($request, $attendance);
        $this->end();
    }
}