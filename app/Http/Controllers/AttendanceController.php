<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service\AttendanceService;
use App\t_attendancerecord;

class AttendanceController extends Controller
{
    public function addStartTime(Request $request, AttendanceService $service, t_attendancerecord $attendance) {
       $service->addStartTime($request, $attendance);
    }
    public function addEndTime(){

    }
}