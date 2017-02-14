@extends('blade_template')

@section('title','勤務開始')
@section('css','/work_start.css')
@section('main')
    <link href="https://fonts.googleapis.com/css?family=Yantramanav:100" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript" src="/js/turnBox.js"></script>

    <p class="current_time">09:45</p>
    <div class="radio-wrapper">
        <div class="radio">
            <div>
                <p class="turnBoxButton">REMOTE</p>
            </div>
            <div>
                <p>REMOTE</p>
            </div>
        </div>
        <div class="radio">
            <div>
                <p class="turnBoxButton">OFFICE</p>
            </div>
            <div>
                <p>OFFICE</p>
            </div>
        </div>
    </div>
    <div class="start">
        <a href="/count_work_time">START</a>
    </div>


    <script type="text/javascript">
        var duration = 200;
        var radio = $(".radio");
        radio.turnBox(
            {
                duration: duration
            });
        $.each(radio.parent().children(".radio"), function(key)
        {
            var self = this;
            $(radio).find(".turnBoxButton").on("click", function()
            {
                radio.parent().children(".radio").not(self).turnBoxAnimate();
            });
        });
    </script>
@endsection