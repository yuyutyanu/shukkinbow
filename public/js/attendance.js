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

    document.getElementById("time").innerHTML = time;

    setTimeout('getCurrentTime()',1000);
}

getCurrentTime();

function workStart() {
    $.get("/starttime",
        {
            start_time: date+" "+time,
        }
    ).done(function(){
        location.href="/count"
    });
}

var endtime;
function getEndTime(){
    var dtObj = new Date();
    var hour = dtObj.getHours();
    var min = dtObj.getMinutes();
    var sec = dtObj.getSeconds();

    if(hour < 10) { hour = "0" + hour; }
    if(min < 10) { min = "0" + min; }
    if(sec < 10) { sec = "0" + sec; }

    endtime = hour+":"+min+":"+sec;
}

getEndTime();

function workEnd() {
    $.get("/endtime",
        {
            end_time: endtime,
        }
    ).done(function(){
        location.href="/end"
    });;
}