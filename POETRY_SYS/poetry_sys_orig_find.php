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
//查詢出處索引;
$orig_index_q="select ORIG_NM from POETRY_ORIG order by ORIG_NM asc";
$orig_index_result= mysql_query($orig_index_q, $MyLink);
$orig_num = mysql_num_rows($orig_index_result);
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
<title>出處查詢</title>
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
<form name="form1" method="post" action="poetry_sys_find_sear.php?L=<? echo $L; ?>&S=7">
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="38%" height="100"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
    <tr>
      <th height="30" colspan="2" bgcolor="#666666" class="style3" scope="col"> 詩歌出處查詢</th>
    </tr>
    <tr>
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">選擇歌曲出處</span></span><span class="style4">
<span class="style12"><span class="style10">
<select name="WORD_FIND" id="WORD_FIND">
  <option value="0">請選擇歌曲出處...</option>
  <?
		  $f=0;
		  while($f<$orig_num){
		  $orig_nm[$f]=mysql_fetch_array($orig_index_result);
		  echo "<option value=\"".$orig_nm[$f][ORIG_NM]."\">".$orig_nm[$f][ORIG_NM]."</option>";
		  $f++; 		  
		  } 
		  ?>
</select>
</span></span>      <span class="style10">      </span></span></th>
      </tr>
    <tr>
      <th width="50%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4">
      <input type="submit" name="Submit" value="確定">
</span></th>
      <th bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col">        <span class="style4">
        <input onClick="location.href='poetry_system_find.php?L=<? echo $L; ?>'" name="Cancle" type="button" id="Cancle" value="取消">
        </span></th>
    </tr>
  </table>
</div>
</form>
</body>
</html>
