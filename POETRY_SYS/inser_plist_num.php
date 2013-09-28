<?php 
//引入no-cache.php
//include("no-cache.php");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
                                                     // always modified
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");                          // HTTP/1.0
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>點撥清單查詢</title>
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
-->
</style>
<link rel="stylesheet" href="../glory.css" type="text/css">
</head>
<body background="../bg.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="42%" height="224"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
      <tr>
        <th height="30" colspan="2" bgcolor="#666666" class="style3" scope="col">敬拜詩歌點撥清單查詢</th>
      </tr>
      <tr>
	   <form name="form1" method="post" action="sear_poetry_list_erro.php?L=<? echo $L; ?>&I=D4J23">
	    <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><div align="center" class="style4"><span class="style10">輸入編號　</span>
	        <input name="LN" type="text" id="LN" size="14" maxlength="5">　
            <input type="submit" name="Submit" value="確定">
		 </div></th>
	    </form>
      </tr>
      <tr>
        <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">或</span></span></th>
      </tr>
      <tr>
	  <form name="form1" method="post" action="ser_playlist.php?L=<? echo $L; ?>&I=D4J23">
        <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">輸入日期　西元</span></span>
          <input name="Y" type="text" id="Y" size="4" maxlength="4">
            <span class="style4"><span class="style10">年 
            <input name="M" type="text" id="M" size="2" maxlength="2">
        月
        <input name="D" type="text" id="D" size="2" maxlength="2"> 
        日
        <input type="submit" name="Submit" value="確定">
		
        </span></span></th>
		</form>
      </tr>
      <tr>
        <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">或</span></span></th>
      </tr>
      <tr>
        <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><div align="center" class="style4"><span class="style10"><a href="sear_song_list_last.php?L=<? echo $L; ?>&I=D4J23">本次或最近一次所點撥的清單</a></span></div></th>
      </tr>
      <tr>
        <th width="52%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10"><a href="USER_Logout.php">登出回首頁</a></span></span></th>
        <th width="48%" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><a href="poetry_system_user.php?L=<? echo $L; ?>" class="style10">回使用系統</a><span class="style4"><span class="style10"></span></span></th>
      </tr>
  </table>

</div>
</body>
</html>
