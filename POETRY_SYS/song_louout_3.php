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
//判斷是否登出或網頁過期
include("check_user_logout.php");
//依據權限給予使用
if ($login_ID_NUM ==1){
//判斷查詢形式;
    switch($S){
	case"1";
	$SER_KIND="poetry_sys_word_find.php?L=".$L;
	break;
	case"2";
	$SER_KIND="poetry_sys_name_find.php?L=".$L;
	break;
	case"3";
	$SER_KIND="poetry_sys_nmb_find.php?L=".$L;
	break;
	case"4";
	$SER_KIND="poetry_sys_char_find.php?L=".$L;
	break;
	case"5";
	$SER_KIND="poetry_sys_key_find.php?L=".$L;
	break;
	case"6";
	$SER_KIND="poetry_sys_kind_find.php?L=".$L;
	break;
	case"7";
	$SER_KIND="poetry_sys_orig_find.php?L=".$L;
	break;
	case"8";
	$SER_KIND="poetry_sys_song_find.php?L=".$L;
	break;
	case"9";
	$SER_KIND="poetry_sys_muti_find.php?L=".$L;
	break;
}
}
else
{
	header("Location:user_noprvl.htm");
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>登出系統</title>
<style type="text/css">
<!--
body {
	background-color: #000000;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
a:link {
	color: #666666;
	text-decoration: none;
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
.style8 {color: #666666}
-->
</style></head>

<body>
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="512" height="38"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
    <tr class="unnamed1">
      <th width="74%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><p class="style8">系統即將登出，您的點撥清單已儲存！您確定要登出系統嗎？</p>
          <input onclick="location.href='USER_Logout.php'" name="Yes" type="button" id="Yes" value="登出">　      
          <input onClick="location.href='poetry_sys_playlist.php?L=<? echo $L; ?>&I=<? echo $I; ?>'" name="Cacle" type="button" id="Cacle" value="取消"></th>
    </tr>
  </table>
  </div>
</body>
</html>