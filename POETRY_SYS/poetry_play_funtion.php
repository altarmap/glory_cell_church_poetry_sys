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
<title>撥放功能</title>
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
  <table width="40%" height="162"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
    <tr>
      <th height="30" colspan="2" bgcolor="#666666" class="style3" scope="col">敬拜詩歌 撥放功能</th>
    </tr>
    <tr>
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><div align="center" class="style4"><span class="style10"><a href="poetry_play_powerpoint.php?L=<? echo $L; ?>&I=<? echo $I; ?>">撥放投影片</a></span></div></th>
    </tr>
    <tr>
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><div align="center" class="style4"><span class="style10"><a href="poetry_play_song.php?L=<? echo $L; ?>&I=<? echo $I; ?>">撥放歌譜</a></span></div></th>
    </tr>
    <tr>
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10"><a href="poetry_play_mp3.php?L=<? echo $L; ?>&I=<? echo $I; ?>">撥放MP3</a></span></span></th>
    </tr>
    <tr>
      <th height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10"><a href="song_louout_3.php?L=<? echo $L; ?>&I=<? echo $I; ?>">登出回首頁</a></span></span></th>
      <th bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10"><a href="poetry_sys_playlist.php?L=<? echo $L; ?>&I=<? echo $I; ?>">回點撥清單</a></span></span></th>
    </tr>
  </table>
</div>
</body>
</html>
