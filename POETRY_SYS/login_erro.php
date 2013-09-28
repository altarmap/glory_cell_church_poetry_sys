<?
if ($_GET['LOG']==1){
$PAG="poetry_user_login.htm";
}
else{
$PAG="poetry_admin_login.htm";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?
echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"2; URL=/POETRY_SYS/".$PAG."\">";
?>
<title>登入失敗</title>
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
.style9 {color: #666666}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="../glory.css" type="text/css">
</head>
<body background="../bg.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="450" height="38"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
    <tr class="unnamed1">
      <th width="74%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col">
        <p><span class="style9">登入失敗，您的帳號尚未啟動！</span></p>
        <p><span class="style9">如已啟動請重新輸入正確的姓名及密碼！</span></p>
        </th>
    </tr>
  </table>
  </div>
</body>
</html>
