﻿<?
//引入no-cache.php
include("no-cache.php");
//引入資料庫連結程式，並回傳狀態
include("link.php");
//查出修改者;
   $login_query = "select * from ADMIN_COOKIE where COOKIE_VAL=\"".$COOKIE_VAL."\"";
   $login_result = mysql_query($login_query, $MyLink);
   $login_ID = mysql_fetch_array($login_result);
   $PRVL_query = "select * from ADMIN_DATA where SEQ_NBR=\"".$login_ID[ADMIN_ID]."\"";
   $PRVL_result = mysql_query($PRVL_query, $MyLink);
   $login_PRVL = mysql_fetch_array($PRVL_result);
//判斷是否登出或網頁過期
include("check_logout.php");
//依據權限給予使用
if ($login_PRVL[PRVL_ID] == 2 || $login_PRVL[PRVL_ID] == 1){
   		}
	else{
	header('Location:admin_fix_noprvl.htm');
}
?>
<html>
<head>
<?
//指定秒數轉向;
echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"4; URL=poetry_chang_kind.php?PAGE=$PAGE&CM=$KM\">";
?>
<title>刪除類別已使用</title>
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
.style9 {color: #990000}
-->
</style><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<body>
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="675" height="38"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
    <tr class="unnamed1">
      <th width="74%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" class="style8" scope="col">原舊有類別 <? echo "<span class=\"style9\">".$KM."</span>"; ?> ，已在歌曲中使用，請先更換類別名稱！才能刪除此歌曲類別！</th>
    </tr>
  </table>
  </div>
</body>
</html>
