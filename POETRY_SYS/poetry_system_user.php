<?php
if (empty($L)) $L=$_GET['L'];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>詩歌搜詢系統</title>
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
  <p>&nbsp;</p>
  <table width="40%" height="131"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
    <tr>
      <th height="30" bgcolor="#666666" class="style3" scope="col">敬拜詩歌 使用系統</th>
    </tr>
    <tr>
      <th height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><div align="center" class="style4"><span class="style10"><a href="poetry_system_find.php?L=<? echo $L; ?>">詩歌查詢</a></span></div></th>
    </tr>
    <tr>
      <th height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10"><a href="inser_plist_num.php?L=<? echo $L; ?>">詩歌點撥清單查詢</a></span></span></th>
    </tr>
    <tr>
      <th height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10"><a href="song_louout.php?L=<? echo $L; ?>">登出回首頁</a></span></span></th>
    </tr>
  </table>
</div>
</body>
</html>
