<?
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
if ($login_ID_NUM==1 and $login_prl_result_f[POSITION]>1){
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<title>mp3撥放曲目</title>
<body bgcolor="#FFFFFF">
<div align="center"> 
  <? 
  $check_mp3="mp3/".$song_num.".mp3";
  if(file_exists($check_mp3)){
  echo "<object width=\"32\" height=\"10\">";
  echo "<embed src=\"mp3/".$song_num.".mp3\"></embed></object>";
  echo "<br><br><a href=\"javascript:window.close();\">關閉視窗</a>";
  }else{
  echo "<div align=\"center\">你瀏覽的歌曲mp3檔尚未建立！</div><br>";
  echo "<a href=\"javascript:window.close();\">關閉視窗</a>";
  }
  ?>
</div>
</body>
</html>
