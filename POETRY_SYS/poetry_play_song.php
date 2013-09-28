<?
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
if ($login_ID_NUM==1){


	if($I=="D4J23"){
		if($Y=="" and $M=="" and $D==""){
		$cancle="inser_plist_num.php?L=".$L;
		}
		else{
		$cancle="ser_playlist.php?L=".$L."&I=D4J23&Y=".$Y."&M=".$M."&D=".$D;
	}
	}
	else{
		$cancle="poetry_system_find.php?L=".$L;
	}

	if($LN==""){
$L_q="select SEQ_NBR from PLAY_LIST order by SEQ_NBR desc";
$L_r=mysql_query($L_q, $MyLink);
$L_F=mysql_fetch_array($L_r);
$L_N=mysql_num_rows($L_r);
if($L_N==0){
	header("Location:sear_last_list_erro2.php");
	exit();
	}
$DATA_Q = "select * from PLAY_LIST where SEQ_NBR=".$L;
$DATA_R = mysql_query($DATA_Q, $MyLink);
$DATE_F =mysql_fetch_array($DATA_R);
$DATA_NUM = mysql_num_rows($DATA_R);
if($DATA_NUM!=1){
	header("Location:sear_list_date_erro2.php?L=".$L);
	exit();
	}
	}
else{
        $DATA_LN_Q = "select * from PLAY_LIST where SEQ_NBR=".$LN;
	$DATA_LN_R = mysql_query($DATA_LN_Q, $MyLink);
	$DATA_LN_NUM = mysql_num_rows($DATA_LN_R);
	if($DATA_LN_NUM!=1){
		header("Location:sear_list_date_erro2.php?L=".$L);
		}else{
$L=$LN;
$DATA_Q = "select * from PLAY_LIST where SEQ_NBR=".$L;
$DATA_R = mysql_query($DATA_Q, $MyLink);
$DATE_F =mysql_fetch_array($DATA_R);
$DATA_NUM = mysql_num_rows($DATA_R);
}

}
}
else{
	header("Location:user_noprvl.htm");
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>歌譜撥放曲目</title>
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
.style15 {color: #000000}
.style19 {font-size: 20px}
.style30 {font-family: "華康楷書體W5(P)"; font-size: 25px; color: #FFFFFF; }
.style44 {font-size: 24px; font-family: "華康楷書體W5(P)";}
.style45 {color: #CCCCCC}
.style57 {font-family: "華康楷書體W5(P)"; font-size: 40px; color: #666666; }
.style56 {font-family: "華康楷書體W5(P)"; font-size: 40px; color: #FFFFFF; }
-->
</style></head>

<body>
<div align="center">
  <p>&nbsp;</p>
  <table width="1000" height="152"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
    <tr bgcolor="#333333">
      <th height="50" colspan="2" class="style30" scope="col"> <span class="style45">歌譜撥放曲目 
        　<span class="style44"><span class="style19"><? echo substr($DATE_F[CRT_TIME],0,4)."/".substr($DATE_F[CRT_TIME],5,2)."/".substr($DATE_F[CRT_TIME],8,2)."　".substr($DATE_F[CRT_TIME],11,2).":".substr($DATE_F[CRT_TIME],14,2).":".substr($DATE_F[CRT_TIME],17,2); ?>　清單編號：<? echo sprintf("%05d",$L); ?></span></span></span></th>
    </tr>
    <tr bgcolor="#CCCCCC">
      <th width="20%" height="46" bordercolor="#FFFFFF" bgcolor="#666666" scope="col"><span class="style4"><span class="style15"><span class="style56">歌曲編號</span></span></span></th>
      <th width="80%" height="46" bordercolor="#FFFFFF" bgcolor="#666666" scope="col"><span class="style15"><span class="style56">歌　曲　名　稱</span></span></th>
    </tr>
    <?
   if($DATA_NUM==0){
echo "<tr bgcolor=\"#FFFFFF\"><th height=\"30\" colspan=\"7\" bordercolor=\"#FFFFFF\" class=\"style57\" scope=\"col\">此清單尚未點撥任何歌曲！</th></tr>";
}  
else{ 

   $data_query = "select * from SONG_LIST where PLAY_LISR_NBR =\"".$L."\" order by SONG_SERIL asc";
   $DATA_result = mysql_query($data_query, $MyLink);
   $NUM1 = mysql_num_rows($DATA_result);
if($NUM1==0){
echo "<tr bgcolor=\"#FFFFFF\"><th height=\"30\" colspan=\"7\" bordercolor=\"#FFFFFF\" class=\"style57\" scope=\"col\">此清單尚未點撥任何歌曲！</th></tr>";
	}

	
   $i=0;
   $n=1;	
 while($i<$NUM1){
 $SONG_DATA[$i] = mysql_fetch_array($DATA_result);
 $SS=$i+1;
 $update_s="update SONG_LIST set SONG_SERIL=\"".date(y).date(m).date(d).date(s).$SS."\" where PLAY_LISR_NBR =\"".$L."\" and SONG_NBR=\"".$SONG_DATA[$i][SONG_NBR]."\"";
 if(!mysql_query($update_s)){
 	echo "更新順序失敗";
}

 $POETRY_DATA="select * from POETRY_DATA where SEQ_NBR=".$SONG_DATA[$i][SONG_NBR];
 $POETRY_DATA_R=mysql_query($POETRY_DATA, $MyLink);
 $POETRY_DATA_F=mysql_fetch_array($POETRY_DATA_R);
echo "<tr bgcolor=\"#FFFFFF\"><th height=\"80\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style57\">".sprintf("%05d",$SONG_DATA[$i][SONG_NBR])."</span></th><th height=\"47\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style57\"><a href=\"poetry_song.php?L=".$L."&I=".$I."&SONG=".$SONG_DATA[$i][SONG_NBR]."\">".$POETRY_DATA_F[SONG_NM]."</a></span></th></tr>";

$i++;
$n++;
}
}
    ?>
	<tr bgcolor="#333333">
      <th height="46" colspan="2" bordercolor="#FFFFFF" scope="col"><input onClick="location.href='poetry_play_funtion.php?L=<? echo $L; ?>&I=<? echo $I; ?>'" type="button" name="Submit" value="取消撥放"></th>
    </tr>
  </table>
</div>
</body>
</html>
