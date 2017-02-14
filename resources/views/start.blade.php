@extends('blade_template')

@section('title','勤務開始')
@section('css','/start.css')

@section('top')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <p class="current_time time">09:45</p>
@endsection

@section('middle')
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
@endsection

@section('bottom')
    <div class="start">
        <a href="/count">START</a>
    </div>
    <script type="text/javascript" src="/js/turnBox.js"></script>
@endsection