<?php
foreach ($_GET as $k=> $v){
	$$k = $v;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>名稱查詢</title>
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
-->
</style>
<link rel="stylesheet" href="../glory.css" type="text/css">
</head>
<body background="../bg.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<form name="form1" method="post" action="poetry_sys_find_sear.php?L=<? echo $L; ?>&S=2">
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="38%" height="100"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
    <tr>
      <th height="30" colspan="2" bgcolor="#666666" class="style3" scope="col"> 詩歌名稱查詢</th>
    </tr>
    <tr>
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">輸入歌曲名稱</span></span><span class="style4">
      <input name="WORD_FIND" type="text" id="WORD_FIND" size="20" maxlength="128">
</span></th>
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
