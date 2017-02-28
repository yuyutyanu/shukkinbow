@extends('blade_template')

@section('title','勤務終了')
@section('css','/end.css')

@section('top')
    <div class="time-wrapper">
        <p>出勤 - 9:00</p>
        <p id="current">退勤 - 17:00</p>
        <p>勤務 - 07:00:00</p>
    </div>
@endsection

@section('bottom')
    <div class="end"><a href="/start">　</a></div>
@endsection