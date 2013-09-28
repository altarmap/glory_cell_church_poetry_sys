<?
include("link.php");
//查出新增者;
   $login_query = "select * from ADMIN_COOKIE where COOKIE_VAL='$COOKIE_VAL'";
   $login_result = mysql_query($login_query, $MyLink);
   $login_ID = mysql_fetch_array($login_result);
   $PRVL_query = "select * from ADMIN_DATA where SEQ_NBR='$login_ID[ADMIN_ID]'";
   $PRVL_result = mysql_query($PRVL_query, $MyLink);
   $login_PRVL = mysql_fetch_array($PRVL_result);

//判斷是否登出或網頁過期
include("check_logout.php");
//依據權限給予使用
if ($login_PRVL[PRVL_ID]==2){
	}
else{
header('Location:admin_fix_noprvl.htm');
	}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>確認刪除歌曲</title>
<style type="text/css">
<!--
body {
	background-color: #000000;
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
.style10 {font-size: 18px}
.style11 {color: #666666; font-size: 18px; }
-->
</style>
<link href="1.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style12 {font-size: 18}
-->
</style>
</head>

<body>
<form action="poetry_del_result.php" method="post" enctype="multipart/form-data" name="form1">
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="50%" height="38"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
    <tr class="unnamed1">
      <th width="74%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4">您確定要刪除歌曲嗎？</span><span class="style11"><span class="style4"><span class="style10">        
      <input type="submit" name="Submit" value="是">        
        <input onClick="location.href='poetry_enter_del.html'" name="Cencle" type="button" id="Cencle" value="否">
        <input type="hidden" name="SN" value="<? echo $SN; ?>">
</span></span></span></th>
      </tr>
  </table>
  </div>
</form>
</body>
</html>
