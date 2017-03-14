<?php
namespace App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use App\Attendancerecord;

class AttendanceService
{

    public $user;
    public $attendance;

    function __construct(User $user, Attendancerecord $attendance){
        $this->user = $user;
        $this->attendance = $attendance;
    }

    //勤務開始時刻をdbにセット
    public function setStartTime(Request $request) {
        $google_id = session()->get('google_id', []);
        $user = $this->user
            ->where('google_id', $google_id)
            ->first();

        $this->attendance->user_id = $user->id;
        $this->attendance->start_time = $request->get("start_time");
        $this->attendance->end_time = null;
        $this->attendance->save();

        //現在の勤務情報を取得するためのIDをsession変数に保存
        $attendance_id = session()->get("attendance_id",[]);
        $attendance_id[] = $this->attendance->id;
        session()->put("attendance_id",$attendance_id);
    }

    //勤務地をセット
    public function setLocation(Request $request){
        if ($request->get("work_location") === "office"){
            $this->attendance->location_id = 1;
        }else{
            $this->attendance->location_id = 2;
        }
        $this->attendance->save();
    }

    //勤務開始時刻を取得
    public function getStartTime(){
        $attendance_id = session()->get('attendance_id',[]);

        $attendance_info = $this->attendance
            ->where('id',$attendance_id)
            ->first();

        $start_time = $attendance_info->start_time;

        return $start_time;
    }

    //終了時刻をdbにセット
    public function setEndTime(Request $request) {
        $attendance_id = session()->get('attendance_id',[]);

        $this->attendance
            ->where('id',$attendance_id)
            ->update(['end_time' => $request->get('end_time')]);
    }

    // 勤務結果を「開始時刻、終了時刻、労働時間」に整形する
    public function getAttendanceResult(){
        $attendance_id = session()->get('attendance_id',[]);

        $attendance_info = $this->attendance
            ->where('id',$attendance_id)
            ->first();

        $start_time = strtotime($attendance_info->start_time);
        $end_time = strtotime($attendance_info->end_time);
        $working_time = $end_time - $start_time;

        $attendance_info["start_time"] = date("H:i:s",$start_time);
        $attendance_info["end_time"] = date("H:i:s",$end_time);
        $attendance_info["working_time"] = date("H:i:s",$working_time);

        $this->initAttendanceId();   //start middleware用　初期化

        return $attendance_info;
    }

    //計測中かのフラグ 切り替え
    public function switchCountFlag(){
        $count_flag = session()->get("count_flag",[]);
        if($count_flag == true){
            $count_flag = false;
        }else{
            $count_flag = true;
        }
        session()->forget("count_flag");
        session()->put("count_flag",$count_flag);
    }


    public function initAttendanceId(){
        session()->forget("attendance_id");
        session()->get("attendance_id",[]);
    }


    //サインインしたユーザが違う端末で計測していた場合にその情報を引き継ぐ
    public function takeOverCount(){

        $google_id = session()->get('google_id', []);

        $user = $this->user->where('google_id',$google_id)->first();

        $current_attendance =$this->attendance
            ->where('user_id',$user->id)
            ->orderby('created_at','desc')
            ->first();

        //過去に勤務したことがあるかの確認
        if(is_null($current_attendance)){return 0;}

        //終了時刻がnullのレコードがある場合、計測中とみなしてsessionに必要な情報を入れて計測を継続
        if(is_null($current_attendance->end_time)) {
            $this->switchCountFlag();

            $attendance_id = session()->get("attendance_id", []);
            $attendance_id[] = $current_attendance->id;
            session()->put("attendance_id", $attendance_id);

            return redirect('count');
        }
    }

    //違う端末ですでに計測終了しているかの確認
    public function alreadyEnd(){
        $attendance_id = session()->get('attendance_id',[]);

        $attendance_info = $this->attendance
            ->where('id',$attendance_id)
            ->first();

        if(!is_null($attendance_info->end_time)){
            return true;
        }
        return false;
    }
}