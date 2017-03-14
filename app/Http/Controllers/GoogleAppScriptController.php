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

        foreach ($users as $user) {

            // userごとの勤務情報を取得
            $recodes = $user->attendancerecord()->where('start_time','like',Carbon::now()->year.'-_'.Carbon::now()->month.'%')->get();
            $name = $user->name;

            foreach ($recodes as $index => $recode){

                //GoogleAppScriptで使いやすい形に整形する
                $start_datetime = Carbon::parse($recode->start_time);
                $end_datetime = Carbon::parse($recode->end_time);
                $work_location = $work_location->where('id',$recode->location_id)->first();

                $attendance[$index]["name"] = $name;
                $attendance[$index]["location"] = $work_location->location;
                $attendance[$index]["start_day"] = $start_datetime->day;
                $attendance[$index]["start_time"] = $start_datetime->hour.":".$start_datetime->minute.":".$start_datetime->second;
                $attendance[$index]["end_day"] = $end_datetime->day;
                $attendance[$index]["end_time"] = $end_datetime->hour.":".$end_datetime->minute.":".$end_datetime->second;
            }
        }
        return $attendance;
    }
}