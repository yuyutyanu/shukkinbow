@extends('blade_template')

@section('title','勤務終了')
@section('css','/end.css')
@section('main')
    <div class="top-box">
        <div class="time-wrapper">
            <p>出勤 - 9:00</p>
            <p>休憩 - 01:00:00</p>
            <p>退勤 - 17:00</p>
            <p>勤務 - 07:00:00</p>
        </div>
    </div>
    <div class="center-box">

    </div>
    <div class="bottom-box">
        <div class="end"><a href="/start">　</a></div>
    </div>
@endsection