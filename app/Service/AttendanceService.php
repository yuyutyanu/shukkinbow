<?php
namespace App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceService
{
    public function addStartTime(Request $request,$attendance) {
        $attendance->start_time = $request->get("start_time");
        $attendance->end_time = null;
        $attendance->save();

        //終了時刻をdbに保存する時にレコード検索するためのid　
        $attendance_id = session()->get("attendance_id",[]);
        $attendance_id[] = $attendance->id;
        session()->put("attendance_id",$attendance_id);
    }

    public function addEndTime(Request $request,$attendance) {
        $attendance_id = session()->get('attendance_id',[]);

        $attendance
            ->where('id',$attendance_id)
            ->update(['end_time' => $request->get('end_time')]);

        session()->put("attendance_id",[]);
    }
};