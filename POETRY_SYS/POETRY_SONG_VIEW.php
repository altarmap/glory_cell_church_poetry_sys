<?php
//引入no-cache.php
include("no-cache.php");
//引入資料庫連結程式，並回傳狀態
include("link.php");
//查出登入者;
   $login_query = "select * from USER_COOKIE where COOKIE_VAL=\"".$USER_COOKIE_VAL."\"";
   $login_result = mysql_query($login_query, $MyLink);
   $login_ID = mysql_fetch_array($login_result);
   $login_ID_NUM = mysql_num_rows($login_result);
include("log_id_prl.php");	 
include("link.php");
//判斷是否登出或網頁過期
include("check_user_logout.php");
//依據權限給予使用
if ($login_ID_NUM==1){
}
else{
	header("Location:user_noprvl.htm");
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="ImageToolBar" content="NO"> 
<title>歌譜撥放曲目</title>
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style4 {color: #666666}
a:link {
	text-decoration: none;
	color: #666666;
}
a:visited {
	text-decoration: none;
	color: #666666;
}
a:hover {
	text-decoration: none;
	color: #993333;
}
a:active {
	text-decoration: none;
	color: #666666;
}
.style15 {color: #000000}
.style19 {font-size: 20px}
.style30 {font-family: "華康楷書體W5(P)"; font-size: 25px; color: #FFFFFF; }
.style44 {font-size: 24px; font-family: "華康楷書體W5(P)";}
.style45 {color: #CCCCCC}
.style57 {font-family: "華康楷書體W5(P)"; font-size: 40px; color: #666666; }
.style56 {font-family: "華康楷書體W5(P)"; font-size: 40px; color: #FFFFFF; }
-->
</style>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function protect(e) {
alert(" 抱歉！你不能帶走它！請用列印來獲得歌譜");
return false;
} 
function trap() {
if(document.images)
for(i=0;i<document.images.length;i++)
 document.images[i].onmousedown = protect;
}
// End -->
</SCRIPT>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body bgcolor="#FFFFFF" OnLoad="trap()">
<div align="center"> 
  <p><img src="<? echo "song/".$SONG.".jpg"; ?>" width="1024"></p>
</div>
</body>
</html>
