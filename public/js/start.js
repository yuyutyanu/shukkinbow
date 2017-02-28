function getCurrentTime(){
    var dtObj = new Date();
    var hour = dtObj.getHours();
    var min = dtObj.getMinutes();
    var sec = dtObj.getSeconds();

    if(hour < 10) { hour = "0" + hour; }
    if(min < 10) { min = "0" + min; }
    if(sec < 10) { sec = "0" + sec; }

    var timer = hour+":"+min+":"+sec;

    document.getElementById("time").innerHTML = timer;

    setTimeout('getCurrentTime()',1000);
}
getCurrentTime();