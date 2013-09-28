<?php
include("link.php");
//查出新增者;
   $login_query = "select * from ADMIN_COOKIE where COOKIE_VAL=\"".$COOKIE_VAL."\"";
   $login_result = mysql_query($login_query, $MyLink);
   $login_ID = mysql_fetch_array($login_result);
   $PRVL_query = "select * from ADMIN_DATA where SEQ_NBR='$login_ID[ADMIN_ID]'";
   $PRVL_result = mysql_query($PRVL_query, $MyLink);
   $login_PRVL = mysql_fetch_array($PRVL_result);

//判斷是否登出或網頁過期
include("check_logout.php");
//依據權限給予使用
if ($login_PRVL[PRVL_ID]== 1 ||$login_PRVL[PRVL_ID]==2){
   if($SONG_FIX_NM=="" and $SONG_FIX_NBR==""){
   header('Location:fix_searc_poetry_erro_1.php');
   	}
else{
$SONG_FIX_NBR=sprintf ("%d",$SONG_FIX_NBR);
if($SONG_FIX_NBR){
$fix_sear_query = "select * from POETRY_DATA where SEQ_NBR=".$SONG_FIX_NBR;
}
else{
$fix_sear_query = "select * from POETRY_DATA where SONG_NM=\"".$SONG_FIX_NM."\" order by SEQ_NBR ASC";
	}
$fix_data_result = mysql_query($fix_sear_query, $MyLink);
$NUM = mysql_num_rows($fix_data_result);
switch($NUM){
   case"0";
     header('Location:fix_searc_poetry_nofind.php'); 
     break;
   case"1";
   $fix_data= mysql_fetch_array($fix_data_result);
   header("Location:poetry_fix.php?SN=".$fix_data[SEQ_NBR]);
     break;
   default;
   }
}
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
<title>修改歌曲</title>
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
	color: #990099;
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
.style13 {font-size: 16px}
.style14 {color: #FF0000}
.style101 {color: #339933}
-->
</style>
<link rel="stylesheet" href="../glory.css" type="text/css">
</head>
<body>
<body background="../bg.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <div align="center">    <table width="72%" height="131"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
    <tr>
      <th height="30" colspan="6" bgcolor="#666666" class="style3" scope="col">敬拜詩歌 管理系統 修改歌曲 </th>
    </tr>
    <tr bgcolor="#FFFFFF" class="unnamed1">
      <th height="30" colspan="6" bordercolor="#FFFFFF" scope="col"><div align="center" class="style11 style13">您輸入的資料一共有<span class="style14"> <? echo $NUM; ?> </span>筆，請選擇想修改的歌曲名稱！</div>        </th>
      </tr>
    <tr class="unnamed1">
      <th width="36" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><div align="center"><span class="style4"><span class="style10"> </span></span><span class="style11"><span class="style4"><span class="style10">NO. </span></span></span></div></th>
      <th width="74" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><div align="center">名稱</div></th>
      <th width="55" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><div align="center">編號</div></th>
      <th width="126" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><div align="center">出處</div></th>
      <th width="132" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><div align="center">別類</div></th>
      <th width="57" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><div align="center">調性</div></th>
    </tr>
  <? 
  $fix_data_query = "select * from POETRY_DATA where SEQ_NBR=\"".$SONG_FIX_NBR."\" || SONG_NM=\"".$SONG_FIX_NM."\" order by SEQ_NBR desc";
  $i=0;
  while($i<$NUM){
  $n=$i+1;
  $fix_data[$i] = mysql_fetch_array($fix_data_result);
  echo "<tr bgcolor=\"#FFFFFF\" class=\"unnamed1\"><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><div align=\"center\"><span class=\"style11 style14 style13\"><span class=\"style4 style17\">".$n."</span></span></div></th><th bordercolor=\"#FFFFFF\" scope=\"col\"><div align=\"center\"><span class=\"unnamed1\"><a href=\"poetry_fix.php?SN=".$fix_data[$i][SEQ_NBR]."\">".$fix_data[$i][SONG_NM]."</a></span></div></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><div align=\"center\"><span class=\"style17\">".sprintf("%05d",$fix_data[$i][SEQ_NBR])."</span></div></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><div align=\"center\"><span class=\"style17\">".$fix_data[$i][SONG_ORIG]."</span></div></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><div align=\"center\">".$fix_data[$i][SONG_KIND]."</div></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><div align=\"center\">".$fix_data[$i][SONG_KEY]."</div></th></tr>";
  $i++;
  }
  ?>
      <tr bgcolor="#FFFFFF" class="unnamed1">
      <th height="30" colspan="6" bordercolor="#FFFFFF" bgcolor="#666666" scope="col"> <div align="center"></div>        <div align="center"></div>        <span class="style4">
        <input onClick="location.href='poetry_enter_fix.html'" name="Cancle" type="button" id="Cancle" value="取消">
        </span></th>
      </tr>
  </table>
</div>

</body>
</html>
