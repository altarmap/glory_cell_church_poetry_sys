﻿<?
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

}
else
{
	header("Location:user_noprvl.htm");
}
?>
<html>
<head>
<?
//指定秒數轉向;
echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2; URL=inser_plist_num.php?L=".$L."\">";
?>
<title>請重新輸入</title>
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
</style><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<body>
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="340" height="38"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
    <tr class="unnamed1">
      <th width="74%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style8">搜尋不到你要找的清單！請重新輸入！</span></th>
    </tr>
  </table>
  </div>
</body>
</html>
