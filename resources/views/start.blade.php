@extends('blade_template')

@section('title','勤務開始')
@section('css','/start.css')
@section('main')
    <link href="https://fonts.googleapis.com/css?family=Yantramanav:100" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <div class="top-box">
        <p class="current_time time">09:45</p>
    </div>
    <div class="center-box">
        <div class="radio-wrapper">
            <div class="radio">
                <div>
                    <p class="turnBoxButton office">OFFICE</p>
                </div>
                <div>
                    <p class="office">OFFICE</p>
                </div>
            </div>
            <div class="radio">
                <div>
                    <p class="turnBoxButton remote">REMOTE</p>
                </div>
                <div>
                    <p class="remote">REMOTE</p>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-box">
        <div class="start">
            <a href="/count">START</a>
        </div>
    </div>
    <script type="text/javascript" src="/js/turnBox.js"></script>
@endsection