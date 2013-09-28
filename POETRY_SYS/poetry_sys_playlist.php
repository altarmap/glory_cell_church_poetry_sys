<?php
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
<title>撥放清單</title>
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
.style13 {font-family: "華康楷書體W5(P)"; font-size: 15px; color: #FFFFFF; }
.style14 {font-family: "華康楷書體W5(P)"; font-size: 24px; color: #666666; }
-->
</style>
<SCRIPT LANGUAGE="JavaScript">
	<!--
function playsong(){
document.form1.aaa.value="1";
document.form1.submit();
//document.form1.submit();	
	/*	var k=0;
	
		while(k<num){      	  
		if(k==0){
	    	document.form1.elements[0].value="1";
		}else{
		document.form1.elements[k*4].value=k+1;
		}	
	k++;
	}
	
//location.href="poetry_play_funtion.php?L=<? echo $L; ?>&I=<? echo $I; ?>&num="+num;*/
}

// -->
	</SCRIPT>

<link rel="stylesheet" href="../glory.css" type="text/css">
</head>

<body background="../bg.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<form name="form1" method="post" action="fix_play_list.php?L=<? echo $L; ?>">


<div align="center">
  <p>&nbsp;</p>
    <table width="100%" height="131"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
      <tr> 
        <th height="30" colspan="6" bgcolor="#666666" class="style3" scope="col"> 
          　　　撥　　放　　清　　單　　　 
          <? echo substr($DATE_F[CRT_TIME],0,4)."/".substr($DATE_F[CRT_TIME],5,2)."/".substr($DATE_F[CRT_TIME],8,2)."　".substr($DATE_F[CRT_TIME],11,2).":".substr($DATE_F[CRT_TIME],14,2).":".substr($DATE_F[CRT_TIME],17,2); ?>
          　清單編號： 
          <? echo sprintf("%05d",$L); ?>
        </th>
      </tr>
      <tr> 
        <th width="13%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">歌曲編號</span></span><span class="style4"><span class="style10"></span></span></th>
        <th height="30" colspan="3" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">歌　曲　名　稱</span></span><span class="style4"><span class="style10"></span></span></th>
        <th width="18%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">撥放順序</span></span><span class="style4"><span class="style10"></span></span><span class="style4"></span><span class="style4"><span class="style10"> 
          </span></span></th>
        <th height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">刪除點撥</span></span></th>
      </tr>
      <?
   if($DATA_NUM==0){
echo "<tr bgcolor=\"#FFFFFF\"><th height=\"30\" colspan=\"7\" bordercolor=\"#FFFFFF\" class=\"style4\" scope=\"col\">此清單尚未點撥任何歌曲！</th></tr>";
}  
else{ 

   $data_query = "select * from SONG_LIST where PLAY_LISR_NBR =\"".$L."\" order by SONG_SERIL asc";
   $DATA_result = mysql_query($data_query, $MyLink);
   $NUM1 = mysql_num_rows($DATA_result);
if($NUM1==0){
echo "<tr bgcolor=\"#FFFFFF\"><th height=\"30\" colspan=\"7\" bordercolor=\"#FFFFFF\" class=\"style4\" scope=\"col\">此清單尚未點撥任何歌曲！</th></tr>";
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
echo "<tr bgcolor=\"#FFFFFF\">";
echo "<th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\">".sprintf("%05d",$SONG_DATA[$i][SONG_NBR])."</th>";
echo "<th height=\"30\" colspan=\"2\" bordercolor=\"#FFFFFF\" scope=\"col\">".$POETRY_DATA_F[SONG_NM]."</th>";
echo "<th height=\"30\" bordercolor=\"#FFFFFF\" bgcolor=\"#FFFFFF\" scope=\"col\">從第 <input name=\"coda[".$i."] \" type=\"text\"  style=\"font-size:9pt;width:20px;height:15px;\"> 頁撥放</th>";
echo "<th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><select name=\"serial_n[".$n."]\">";
$sl_n=0;
$op=1;	
while($sl_n<$NUM1){
echo "<option value=\"".$op."\"";
if($op==$n){
	echo "selected";
	}
echo ">".$op."</option>";
$sl_n++;
$op++;
}
echo "</select></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style4\"><input type=\"checkbox\" name=\"del[".$n."]\" value=\"checkbox\"><input name=\"del_number[".$n."]\" type=\"hidden\" size=\"2\" maxlength=\"2\" value=\"".$POETRY_DATA_F[SEQ_NBR]."\"></span></th></tr>";
$i++;
$n++;
}
}
    ?>
      <tr bgcolor="#E1E1E1"> 
        <th height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10"><a href="song_louout_3.php?L=<? echo $L; ?>&I=<? echo $I; ?>">登出回首頁</a></span></span></th>
        <th width="19%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><a href="poetry_system_user.php?L=<? echo $L; ?>" class="style10">回使用系統</a></th>
        <th width="19%" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><a href="poetry_system_find.php?L=<? echo $L; ?>" class="style10">增加詩歌</a></th>
        <th width="19%" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"> 
          <input onclick="location.href='<? echo $cancle; ?>'" name="cancle" type="button" id="cancle" value="取消">
        </th>
        <th height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"> 
          <input type="submit" name="Submit" value="順序修改">
        </th>
        <th width="12%" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"> 
          <input type="submit" name="Submit" value="歌曲刪除">
          <input name="del_num" type="hidden" size="2" maxlength="2" value="<? echo $NUM1; ?> ">
        </th>
      </tr>
    </table>
    <p> 
      <input onClick="return playsong();" name="play2" type="button" value="開始撥放">
      <input type="hidden" name="aaa">
    </p>
</div>
</form>
</body>
</html>
