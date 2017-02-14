@extends('blade_template')

@section('title','労働時間計測')
@section('css','/count.css')
@section('main')
    <div class="time-wrapper top-box">
        <p class="count_work_time">00:30:35</p>
    </div>

    <div class="center-box">
        <div class="count_ball-wrapper">
            <div class="ball"></div>
            <div class="shadow"></div>
        </div>
    </div>

    <div class="bottom-box">
        <div class="stop"><a href="/end">STOP</a></div>
    </div>
@endsection