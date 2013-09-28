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
//判斷是否登出或網頁過期
include("check_user_logout.php");
//依據權限給予使用
if ($login_ID_NUM=1){
switch($index){
   case("");
   $order="SEQ_NBR";
   break;
   case("N");
   $order="SONG_NM";
   break;
}

}
else
{
	header("Location:user_noprvl.htm");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>詩歌總目錄</title>
<style type="text/css">
<!--
body {
	background-color: #000000;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style3 {font-family: "華康楷書體W5(P)"; font-size: 24px; color: #FFFFFF;}
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
.style10 {font-size: 18px}
.style11 {color: #FF0000}
.style12 {color: #666666; font-size: 18px; }
-->
</style>
<link rel="stylesheet" href="../glory.css" type="text/css">
</head>
<body background="../bg.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="32%" height="131"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
    <tr>
      <th height="30" bgcolor="#666666" class="style3" scope="col"> 詩 　歌 　總 　目　 錄</th>
    </tr>
    <tr>
      <th height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><div align="center"><span class="style4"><span class="style10"><a href="poetry_sys_index_c.php?L=<? echo $L; ?>">中 文 歌 曲</a></span></span></div></th>
    </tr>
    <tr>
      <th height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><div align="center"><span class="style4"><span class="style10"><a href="poetry_sys_index_e.php?L=<? echo $L; ?>">英 文 歌 曲</a></span></span></div>        </th>
    </tr>
    <tr>
      <th height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"> <span class="style4">
        <input onClick="location.href='poetry_system_find.php?L=<? echo $L; ?>'" name="Cancle" type="button" id="Cancle" value="取消">
      </span></th>
    </tr>
  </table>
</div>
</body>
</html>
