var year,month,day,hour,min,sec,date,time;

function getToday(){
    var dtObj = new Date();
    year = dtObj.getFullYear();
    month = dtObj.getMonth()+1;
    day = dtObj.getDate();
    hour = dtObj.getHours();
    min = dtObj.getMinutes();
    sec = dtObj.getSeconds();

    modTimeFormat();

    date = year+"-"+month+"-"+day;
    time = hour+":"+min+":"+sec;
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

    dispCurrentTime(); // 現在時刻を表示させたい時だけ

    setTimeout('getCurrentTime()',1000);
}

function getLocation(){

}

function workStart() {
    $.get("/starttime",
        {
            start_time: date + " " + time
        }
    ).done(function(){
        location.href="/count"
    });
}

var timer;
function countUp() {
    getToday();
    $.get("/counttime",{
       current_time: date + " " + time
    }, function (time) {
            timer = time;
        }
    ).done(function () {
        document.getElementById("count_up").innerHTML = timer;
    });

    setTimeout("countUp()", 1000);
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