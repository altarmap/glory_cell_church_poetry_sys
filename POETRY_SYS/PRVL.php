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
if ($login_PRVL[PRVL_ID]== 1 ||$login_PRVL[PRVL_ID]==2){
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
<title>無標題文件</title>
</head>

<body>
</body>
</html>
