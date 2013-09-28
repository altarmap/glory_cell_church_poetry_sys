<?
//引入no-cache.php
include("no-cache.php");
//引入資料庫連結程式，並回傳狀態
include("link.php");
//查出修改者;
   $login_query = "select * from ADMIN_COOKIE where COOKIE_VAL=\"".$COOKIE_VAL."\"";
   $login_result = mysql_query($login_query, $MyLink);
   $login_ID = mysql_fetch_array($login_result);
   $PRVL_query = "select * from ADMIN_DATA where SEQ_NBR=\"".$login_ID[ADMIN_ID]."\"";
   $PRVL_result = mysql_query($PRVL_query, $MyLink);
   $login_PRVL = mysql_fetch_array($PRVL_result);
//判斷是否登出或網頁過期
include("check_logout.php");
//依據權限給予使用
if ($login_PRVL[PRVL_ID] == 2 || $login_PRVL[PRVL_ID] == 1 ){
	   if($SONG_DEL_NM=="" and $SONG_DEL_NBR==""){
   header('Location:del_searc_poetry_erro_1.php');
   	}
else{

$SONG_DEL_NBR=sprintf ("%d",$SONG_DEL_NBR);
if($SONG_DEL_NBR){
$del_sear_query = "select * from POETRY_DATA where SEQ_NBR=\"".$SONG_DEL_NBR."\"";
}
else{
$del_sear_query = "select * from POETRY_DATA where SONG_NM=\"".$SONG_DEL_NM."\" order by SEQ_NBR ASC";
	}
$del_data_result = mysql_query($del_sear_query, $MyLink);
$NUM = mysql_num_rows($del_data_result);
switch($NUM){
   case"0";
     header('Location:del_searc_poetry_nofind.php'); 
     break;
   case"1";
   $del_data= mysql_fetch_array($del_data_result);
   header("Location:poetry_del.php?SN=".$del_data[SEQ_NBR]);
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
<title>刪除歌曲</title>
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
.style11 {color: #666666; font-size: 18px; }
-->
</style>
<link href="1.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style12 {color: #FFFFFF}
.style13 {font-size: 16px}
.style14 {color: #FF0000}
.style17 {font-size: 16}
.style18 {color: #3366FF; font-size: 16; }
-->
</style>
</head>

<body>
<form action="poetry_new_insert.php" method="post" enctype="multipart/form-data" name="form1">
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="72%" height="131"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
    <tr>
      <th height="30" colspan="6" bgcolor="#666666" class="style3" scope="col">敬拜詩歌 管理系統 刪除歌曲 </th>
    </tr>
    <tr bgcolor="#FFFFFF" class="unnamed1">
      <th height="30" colspan="6" bordercolor="#FFFFFF" scope="col"><div align="center" class="style11 style13">您輸入的資料一共有<span class="style14"> <? echo $NUM; ?> </span>筆，請選擇想刪除的歌曲名稱！</div></th>
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
  $del_data_query = "select * from POETRY_DATA where SEQ_NBR=\"".$SONG_DEL_NBR."\" || SONG_NM=\"".$SONG_DEL_NM."\" order by SEQ_NBR desc";
  $i=0;
  while($i<$NUM){
  $n=$i+1;
  $del_data[$i] = mysql_fetch_array($del_data_result);
  echo "<tr bgcolor=\"#FFFFFF\" class=\"unnamed1\"><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><div align=\"center\"><span class=\"style11 style14 style13\"><span class=\"style4 style17\">".$n."</span></span></div></th><th bordercolor=\"#FFFFFF\" scope=\"col\"><div align=\"center\"><span class=\"unnamed1\"><a href=\"poetry_del.php?SN=".$del_data[$i][SEQ_NBR]."\">".$del_data[$i][SONG_NM]."</a></span></div></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><div align=\"center\"><span class=\"style17\">".sprintf("%05d",$del_data[$i][SEQ_NBR])."</span></div></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><div align=\"center\"><span class=\"style17\">".$del_data[$i][SONG_ORIG]."</span></div></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><div align=\"center\">".$del_data[$i][SONG_KIND]."</div></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><div align=\"center\">".$del_data[$i][SONG_KEY]."</div></th></tr>";
  $i++;
  }
  ?>
    <tr bgcolor="#FFFFFF" class="unnamed1">
      <th height="30" colspan="6" bordercolor="#FFFFFF" bgcolor="#666666" scope="col"> <div align="center"></div>
          <div align="center"></div>
          <span class="style4">
          <input onClick="location.href='poetry_enter_del.html'" name="Cancle" type="button" id="Cancle" value="取消">
        </span></th>
    </tr>
  </table>
  </div>
</form>
</body>
</html>
