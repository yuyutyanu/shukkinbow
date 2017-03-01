var year,month,day,hour,min,sec,date,time;

function getToday(){
    var dtObj = new Date();
    year = dtObj.getFullYear();
    month = dtObj.getMonth()+1;
    day = dtObj.getDate();
    hour = dtObj.getHours();
    min = dtObj.getMinutes();
    sec = dtObj.getSeconds();
}


function modTimeFormat(){
    if(hour < 10) { hour = "0" + hour; }
    if(min < 10) { min = "0" + min; }
    if(sec < 10) { sec = "0" + sec; }
}


function dispCurrentTime(){
    if(document.getElementById("current")) {
        document.getElementById("current").innerHTML = time;
    }
}


function getCurrentTime(){
    getToday();
    modTimeFormat();

    date = year+"-"+month+"-"+day;
    time = hour+":"+min+":"+sec;

    dispCurrentTime(); // 現在時刻を表示させたい時だけ

    setTimeout('getCurrentTime()',1000);
}


var timer,start = new Date;
function countUp(){
    var now = new Date();

    time = parseInt((now.getTime() - start.getTime()) / 1000);
    hour = parseInt(time / 3600);
    min = parseInt((time / 60) % 60);
    sec = time % 60;

    modTimeFormat();

    timer = hour + ':' + min + ':' + sec;

    document.getElementById("count_up").innerHTML = timer;

    setTimeout("countUp()", 1000);
}


function workStart() {
    $.get("/starttime",
        {
            start_time: date+" "+time,
        }
    ).done(function(){
        location.href="/count"
    });
}


function workEnd() {
    getCurrentTime();

    $.post("/endtime",
        {
            end_time: date+" "+time,
            working_time:timer,
        }
    ).done(function(){
        document.cookie = 'timer = ' + false
        location.href="/end"
    });
}