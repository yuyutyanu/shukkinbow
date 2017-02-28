var start = new Date();

var hour = 0;
var min = 0;
var sec = 0;
var now = 0;
var datet = 0;

function countUp(){

    now = new Date();

    datet = parseInt((now.getTime() - start.getTime()) / 1000);

    hour = parseInt(datet / 3600);
    min = parseInt((datet / 60) % 60);
    sec = datet % 60;

    // 数値が1桁の場合、頭に0を付けて2桁で表示する指定
    if(hour < 10) { hour = "0" + hour; }
    if(min < 10) { min = "0" + min; }
    if(sec < 10) { sec = "0" + sec; }

    var timer = hour + ':' + min + ':' + sec;
    document.getElementById("time").innerHTML = timer;

    setTimeout("countUp()", 1000);
}
countUp();