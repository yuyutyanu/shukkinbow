@extends('blade_template')

@section('title','勤務終了')
@section('css','/end.css')
@section('main')
    <div class="top-box">
        <div class="time-wrapper">
            <p>出勤時間 - 9:00</p>
            <p>退勤時間 - 17:00</p>
            <p>勤務時間 - 08:00:00</p>
        </div>
    </div>
    <div class="center-box">

    </div>
    <div class="bottom-box">
        <div class="end"><a href="/start"></a></div>
    </div>
@endsection