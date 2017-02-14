@extends('blade_template')

@section('title','労働時間計測')
@section('css','/count.css')

@section('top')
    <div class="time-wrapper">
        <p class="count_work_time">00:30:35</p>
    </div>
@endsection

@section('middle')
        <div class="count_ball-wrapper">
            <div class="ball"></div>
            <div class="shadow"></div>
        </div>
@endsection

@section('bottom')
        <div class="stop"><a href="/end">STOP</a></div>
@endsection