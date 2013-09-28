<?php
if (empty($L)) $L=$_GET['L'];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>詩歌查詢</title>
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
  <table width="56%" height="386"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
    <tr>
      <th height="30" colspan="3" bgcolor="#666666" class="style3" scope="col">敬拜詩歌查詢</th>
    </tr>
    <tr>
      <th height="30" colspan="3" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><div align="center" class="style4"><span class="style10"><a href="poetry_sys_word_find.php?L=<? echo $L; ?>">按歌曲首字</a></span></div></th>
    </tr>
    <tr>
      <th height="30" colspan="3" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10"><a href="poetry_sys_name_find.php?L=<? echo $L; ?>">按歌曲名稱</a></span></span></th>
    </tr>
    <tr>
      <th height="30" colspan="3" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10"><a href="poetry_sys_nmb_find.php?L=<? echo $L; ?>">按歌曲編號</a></span></span></th>
    </tr>
    <tr>
      <th height="30" colspan="3" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10"><a href="poetry_sys_char_find.php?L=<? echo $L; ?>">按歌曲歌詞</a></span></span></th>
    </tr>
    <tr>
      <th height="30" colspan="3" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><div align="center" class="style4"><span class="style10"><a href="poetry_sys_key_find.php?L=<? echo $L; ?>">按歌曲調性</a></span></div></th>
    </tr>
    <tr>
      <th height="30" colspan="3" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10"><a href="poetry_sys_kind_find.php?L=<? echo $L; ?>">按歌曲類別</a></span></span></th>
    </tr>
    <tr>
      <th height="30" colspan="3" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10"><a href="poetry_sys_orig_find.php?L=<? echo $L; ?>">按歌曲出處</a></span></span></th>
    </tr>
    <tr>
      <th height="30" colspan="3" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10"><a href="poetry_sys_song_find.php?L=<? echo $L; ?>">按歌曲簡譜</a></span></span></th>
    </tr>
    <tr>
      <th height="30" colspan="3" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10"><a href="poetry_sys_muti_find.php?L=<? echo $L; ?>">按進階搜尋</a></span></span></th>
    </tr>
    <tr>
      <th height="30" colspan="3" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10"><a href="poetry_sys_index.php?L=<? echo $L; ?>">詩歌總目錄</a></span></span></th>
    </tr>
    <tr>
      <th width="32%" height="37" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10"><a href="song_louout_1.php?L=<? echo $L ;?>">登出回首頁</a></span></span></th>
      <th width="34%" height="37" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><a href="poetry_system_user.php?L=<? echo $L; ?>" class="style10">回使用系統</a></th>
      <th width="34%" height="37" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10"><a href="poetry_sys_playlist.php?L=<? echo $L; ?>">本次點撥清單</a></span></span></th>
    </tr>
  </table>
</div>
</body>
</html>
