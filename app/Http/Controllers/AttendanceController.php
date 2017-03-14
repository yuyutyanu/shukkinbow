<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service\AttendanceService;

class AttendanceController extends Controller{

    public $attendance_service;

    function __construct(AttendanceService $attendance_service){
        $this->attendance_service = $attendance_service;
    }

    public function start(){
        $this->attendance_service->initAttendanceId();   //勤務情報検索用　初期化
        return view('start');
    }

    public function count(){
        return view('count');
    }

    public function end(){
        $attendance_info = $this->attendance_service->getAttendanceResult();
        return view('end',compact('attendance_info'));
    }


    public function startTime(Request $request) {
        $this->attendance_service->takeOverCount();//違う端末ですでにカウントしている場合引き継ぐ
        if(session('count_flag')){
            return 0; //引き継いだらこれより下の処理をせずリターン
        }
        $this->attendance_service->switchCountFlag();
        $this->attendance_service->setStartTime($request);
        $this->attendance_service->setLocation($request);
    }
    public function CountInfo(){
        $start_time = $this->attendance_service->getStartTime();
        return $start_time;
    }

    public function endtime(Request $request){
        $this->attendance_service->switchCountFlag();

        if($this->attendance_service->alreadyEnd()){
            return 0; //違う端末ですでに計測終了している場合これより下の処理をせずリターン
        }
        $this->attendance_service->setEndTime($request);
    }
}