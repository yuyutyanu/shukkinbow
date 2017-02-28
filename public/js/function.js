var date,time;

function getCurrentTime(){
    var dtObj = new Date();

    var year = dtObj.getFullYear();
    var month = dtObj.getMonth()+1;
    var day = dtObj.getDate();
    var hour = dtObj.getHours();
    var min = dtObj.getMinutes();
    var sec = dtObj.getSeconds();

    if(hour < 10) { hour = "0" + hour; }
    if(min < 10) { min = "0" + min; }
    if(sec < 10) { sec = "0" + sec; }

    date = year+"-"+month+"-"+day;
    time = hour+":"+min+":"+sec;

    //画面に現在時刻を表示する画面でのみ動作させる処理
    if(document.getElementById("current")) {
        document.getElementById("current").innerHTML = time;
    }

    setTimeout('getCurrentTime()',1000);
}

var timer,start = new Date;
function countUp(){
    now = new Date();

    datet = parseInt((now.getTime() - start.getTime()) / 1000);

    hour = parseInt(datet / 3600);
    min = parseInt((datet / 60) % 60);
    sec = datet % 60;

    if(hour < 10) { hour = "0" + hour; }
    if(min < 10) { min = "0" + min; }
    if(sec < 10) { sec = "0" + sec; }

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
            count_time:timer,
        },function(data){
         console.log(data);
        }
    ).done(function(){
        location.href="/end"
    });
}