<?php

namespace App\Http\Controllers;

use App\User;
use App\WorkLocation;
use Carbon\Carbon;
class GoogleAppScriptController extends Controller
{
    function attendance(User $user,WorkLocation $work_location){


        $users = $user->get();
        $attendance = [];
        $count = 0;
        foreach ($users as $user) {

            // userごとの勤務情報を取得  (実装時は先月の情報を取りたい)
            $recodes = $user->attendancerecord()
                ->get();

            $name = $user->name;

            foreach ($recodes as $index => $recode){

                //GoogleAppScriptで使いやすい形に整形する
                $start_datetime = Carbon::parse($recode->start_time);
                $end_datetime = Carbon::parse($recode->end_time);
                $work_location = $work_location->where('id',$recode->location_id)->first();

                $attendance[$count]["name"] = $name;
                $attendance[$count]["location"] = $work_location->location;
                $attendance[$count]["start_day"] = $start_datetime->day;
                $attendance[$count]["start_month"] = $start_datetime->month;
                $attendance[$count]["start_time"] = $start_datetime->hour.":".$start_datetime->minute.":".$start_datetime->second;
                $attendance[$count]["end_time"] = $end_datetime->hour.":".$end_datetime->minute.":".$end_datetime->second;
                $count++;
            }
        }
        return $attendance;
    }
}