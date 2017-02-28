<?php
namespace App\Service;
use Illuminate\Http\Request;

class AttendanceService
{
    public function addStartTime(Request $request,$attendance) {
        $attendance->start_time = $request->get("start_time");
        $attendance->end_time = null;
        $attendance->save();
    }

    public function addEndTime(Request $request) {
        $end_time = $request->get('end_time');
//        DB::table('t_attendancerecord')
//            ->where($user->id)
//            ->update(['end_time'=>"23:59:59"]);
        return $end_time;
    }
};