function counter() {
    var date1 = date.split("-");
    var year = date1[0];
    var month = date1[1];
    var day = date1[2];
    var hour = "0";
    var minute = "0";
    var centi = "5";

    var convert = "0";var roop = "";
    var cnt1 = "天";var cnt2 = "小時";var cnt3 = "分";var cnt4 = "秒";
    var baseoffset = "-8";var cuttime = "";
    var br1 = "";var br2 = "";var br3 = "";var br4 = "";
    var com1 = "還剩下：";var com2 = "";var com3 = "";var com4 = "報名時間截止";var end = "2";
    var width = "250";var height = "60";
    var font = "微軟正黑體";var font2 = "7seg4";var size = "16px";var l_height = "27";var bold = "";var italic = "";var line = "";
    var space = "";
    var align = "1";var img = "";
    var color1 = "777";var color2 = "00DD00";var color3 = "FFFFFF";

    var cnt1 = encodeURIComponent(cnt1);
    var cnt2 = encodeURIComponent(cnt2);
    var cnt3 = encodeURIComponent(cnt3);
    var cnt4 = encodeURIComponent(cnt4);
    var com1 = encodeURIComponent(com1);
    var com2 = encodeURIComponent(com2);
    var com3 = encodeURIComponent(com3);
    var com4 = encodeURIComponent(com4);
    var font = encodeURIComponent(font);
    var font2 = encodeURIComponent(font2);
    if(!roop) var roop="";
    if(!convert) var convert="0";
    if(!baseoffset) var baseoffset="none";
    if(!font2) var font2="0";
    if(!cuttime) var cuttime="0";
    // 印出倒數時間資料
    document.write("<iframe src='https://countdown.reportitle.com/neo_parts.php?year="+year+"&month="+month+"&day="+day+"&hour="+hour+"&minute="+minute+"&centi="+centi+"&cnt1="+cnt1+"&cnt2="+cnt2+"&cnt3="+cnt3+"&cnt4="+cnt4+"&br1="+br1+"&br2="+br2+"&br3="+br3+"&br4="+br4+"&com1="+com1+"&com2="+com2+"&com3="+com3+"&com4="+com4+"&end="+end+"&width="+width+"&height="+height+"&font="+font+"&size="+size+"&l_height="+l_height+"&bold="+bold+"&italic="+italic+"&line="+line+"&space="+space+"&align="+align+"&img="+img+"&color1="+color1+"&color2="+color2+"&color3="+color3+"&roop="+roop+"&convert="+convert+"&baseoffset="+baseoffset+"&font2="+font2+"&cuttime="+cuttime+"' width='"+width+"px' height='"+height+"px' frameborder='0' scrolling='no' style='margin:0;padding:0'></iframe>");

    document.write("");
  }
