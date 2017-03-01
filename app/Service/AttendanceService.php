<?php
namespace App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceService
{
    public function setStartTime(Request $request,$attendance) {
        $attendance->start_time = $request->get("start_time");
        $attendance->end_time = null;
        $attendance->save();

        //開始時刻を入れたレコードに終了時刻を入れるためのid
        $attendance_id = session()->get("attendance_id",[]);
        $attendance_id[] = $attendance->id;
        session()->put("attendance_id",$attendance_id);
    }

    public function setEndTime(Request $request,$attendance) {
        $attendance_id = session()->get('attendance_id',[]);

        $attendance
            ->where('id',$attendance_id)
            ->update(['end_time' => $request->get('end_time')]);
    }

    public function getAttendanceInfo($attendance){
        $attendance_id = session()->get('attendance_id',[]);

        $attendance_info = $attendance
            ->where('id',$attendance_id)
            ->first();

        $start_time = strtotime($attendance_info->start_time);
        $end_time = strtotime($attendance_info->end_time);
        $working_time = $end_time - $start_time;

        $attendance_info["start_time"] = date("H:i:s",$start_time);
        $attendance_info["end_time"] = date("H:i:s",$end_time);
        $attendance_info["working_time"] = date("H:i:s",$working_time);

        return $attendance_info;
    }
};