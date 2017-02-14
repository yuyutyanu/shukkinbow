@extends('blade_template')

@section('title','労働時間計測')
@section('css','/count_work_time.css')
@section('main')
    <link href="https://fonts.googleapis.com/css?family=Yantramanav:100" rel="stylesheet">

    <p class="count_work_time">00:30:35</p>
    <div id="count_ball-wrapper">
        <div id="count_ball">
        </div>
        <div id="ball_shadow">
        </div>
    </div>

    <style>
    #count_ball-wrapper{
        position: relative;
        height:100px;
        width:100px;
        margin:0 auto;
        margin-top:120px;
        margin-bottom:50px;
    }
    #count_ball{
        position: absolute;
        background: #fff;
        height:30px;
        width:30px;
        border-radius: 50% 50% 50% 50%;
        margin-left:50%;
        left:-15px;
    }
    #ball_shadow{
        position: absolute;
        bottom:0;
        height:25px;
        width:25px;
        border-radius: 50% 50% 50% 50%;
        margin-left:50%;
        left:-12.5px;
        background-color: rgba(0,0,0,0.7);
    }


    </style>
    <div class="stop"><a href="/work_end">STOP</a></div>
@endsection