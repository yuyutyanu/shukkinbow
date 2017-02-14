@extends('blade_template')

@section('title','労働時間計測')
@section('css','/count_work_time.css')
@section('main')
    <link href="https://fonts.googleapis.com/css?family=Yantramanav:100" rel="stylesheet">

    <div class="time-wrapper top-box">
        <p class="count_work_time time">00:30:35</p>
    </div>

    <div class="center-box">
        <div class="count_ball-wrapper">
            <div class="ball"></div>
            <div class="shadow"></div>
        </div>
    </div>

    <div class="bottom-box">
        <div class="stop"><a href="/work_end">STOP</a></div>
    </div>
@endsection