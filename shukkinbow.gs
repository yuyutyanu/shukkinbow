
function onOpen() {
    // メニューバーにカスタムメニューを追加
    var spreadsheet = SpreadsheetApp.getActiveSpreadsheet();
    var entries = [
        {name : "出勤簿を作成"  , functionName : "myFunction"},
        {name : "労働時間の合計を取得"  , functionName : "getTotalTime"},
    ];
    spreadsheet.addMenu("shukkinbow", entries);
}

var line_count = 5;//行数数える用

function myFunction() {

    var res = UrlFetchApp.fetch('https://shukkinbow.herokuapp.com/gas');//出勤情報を取得
    res = JSON.parse(res);
    var ss = SpreadsheetApp.getActiveSpreadsheet(); // スクリプトが紐付いているスプレッドシートの参照を取得

    for(var i = 0;i < res.length;i++){
        // スクリプト実行時にアクティブなシートの参照を取得
        var sheet = ss.getActiveSheet();

        if(sheet.getName() === res[i].name){　//取得したユーザのシートがあってアクティブだった場合

            range = sheet.getRange("A"+line_count);
            range.setValue(res[i].start_day);
            range = sheet.getRange("B"+line_count);
            range.setValue(res[i].location);
            range = sheet.getRange("C"+line_count);
            range.setValue(res[i].start_time);
            range = sheet.getRange("D"+line_count);
            range.setValue(res[i].end_time);
            range = sheet.getRange("E"+line_count);
            range.setFormula('=(D'+line_count+' - C'+line_count+')');
            line_count++;
        }else{
            moveShukkinbowUserSheet(ss,res[i])
            i--;
        }
    }
}


//ユーザネーム名のシートへ移動 
function moveShukkinbowUserSheet(ss,res){
    if(ss.getSheetByName(res.name)){//すでにそのユーザのシートがあるか
        for(var j = 0; j < ss.getSheets().length; j++){
            var sheets = ss.getSheets();
            if(sheets[j].getName() === res.name){
                ss.setActiveSheet(ss.getSheets()[j]);
                line_count = 5; //入力開始行をリセット
                return 0;
            }
        }
    }else{
        ss.insertSheet(res.name,0);　//シート作成
        initUI(ss);
        initInput(ss,res);
        ss.setActiveSheet(ss.getSheets()[0]);
        line_count = 5; //入力開始行をリセット
    }
}

//初期入力値
function initInput(ss,res){
    ss.rename(res.name + "　出勤簿");

    var sheet = ss.getActiveSheet();

    range = sheet.getRange("A1");
    range.setValue(res.start_month+"月出勤簿");
    range = sheet.getRange("A4");
    range.setValue("日");
    range = sheet.getRange("B4");
    range.setValue("office/remote");
    range = sheet.getRange("C4");
    range.setValue("出勤時刻");
    range = sheet.getRange("D4");
    range.setValue("退勤時刻");
    range = sheet.getRange("E4");
    range.setValue("労働時間");
    range = sheet.getRange("F4");
    range.setValue("合計労働時間");
}

//UIの初期化
function initUI(ss){
    var sheet = ss.getActiveSheet();

    var headStyle = { fontColor:"#fff" ,background:"#2A818A"}
    var bodyStyle = { fontColor:"#2A818A",borderColor:"#20666e"}
    var horizontalAlignments = [
        [ "center" ]
    ];

    sheet.getRange("A1").setBackground("#2A818A").setFontColor("#fff").setHorizontalAlignment("center");

    var head = sheet.getRange("A4:F4");
    head.setBackground(headStyle.background);
    head.setFontColor(headStyle.fontColor);
    head.setHorizontalAlignment("center");

    var body = sheet.getRange("A5:E80");
    body.setBorder(true,true,true,true,true,true,bodyStyle.borderColor, SpreadsheetApp.BorderStyle.SOLID);
    body.setFontColor(bodyStyle.fontColor);
    body.setHorizontalAlignment("center");

    var sum_body = sheet.getRange("F5")
    sum_body.setBorder(true,true,true,true,true,true,bodyStyle.borderColor, SpreadsheetApp.BorderStyle.SOLID);
    sum_body.setFontColor(bodyStyle.fontColor);
    sum_body.setHorizontalAlignment("center");
}

function getTotalTime(){

    var ss = SpreadsheetApp.getActiveSpreadsheet();
    var sheet = ss.getActiveSheet();

    var last_row = sheet.getLastRow();
    range = sheet.getRange("F5");
    range.setFormula('=SUM(E5:E' + last_row + ')');

}

