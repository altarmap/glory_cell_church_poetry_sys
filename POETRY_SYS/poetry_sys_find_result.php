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
include("log_id_prl.php");	 
include("link.php");
include("check_user_logout.php");
//依據權限給予使用;
if ($login_ID_NUM ==1){
//判斷查詢形式;
switch($S){
	case"1";
	$SER_KIND="poetry_sys_word_find.php?L=".$L;
	break;
	case"2";
	$SER_KIND="poetry_sys_name_find.php?L=".$L;
	break;
	case"3";
	$SER_KIND="poetry_sys_nmb_find.php?L=".$L;
	break;
	case"4";
	$SER_KIND="poetry_sys_char_find.php?L=".$L;
	break;
	case"5";
	$SER_KIND="poetry_sys_key_find.php?L=".$L;
	break;
	case"6";
	$SER_KIND="poetry_sys_kind_find.php?L=".$L;
	break;
	case"7";
	$SER_KIND="poetry_sys_orig_find.php?L=".$L;
	break;
	case"8";
	$SER_KIND="poetry_sys_song_find.php?L=".$L;
	break;
	case"9";
	$SER_KIND="poetry_sys_muti_find.php?L=".$L;
	break;
	case"10";
	switch($La){
	case"1";
	$SER_KIND="poetry_sys_index_c.php?L=".$L."&PAGE=".$PAGE."&index=".$index;
	break;
	case"2";
	$SER_KIND="poetry_sys_index_e.php?L=".$L."&PAGE=".$PAGE."&index=".$index;
	break;
	}
	
	break;
}
$SONG_Q="select * from POETRY_DATA where SEQ_NBR=\"".$N."\"";
$SONG_R=mysql_query($SONG_Q, $MyLink);
$SONG_DATA=mysql_fetch_array($SONG_R);
//類別判別;
if($SONG_DATA[SONG_KIND]=="0"){
	$SONG_DATA[SONG_KIND]="";;
}
//出處判別;
if($SONG_DATA[SONG_ORIG]=="0"){
	$SONG_DATA[SONG_ORIG]="";;
	}
//音調判別;
switch($SONG_DATA[SONG_KEY]){
case"0";
  $KEY="未輸入音調";
break;
case"1";
  $KEY="C";
break;
case"2";
  $KEY="D";
break;
case"3";
  $KEY="E";
break;
case"4";
  $KEY="F";
break;
case"5";
  $KEY="G";
break;
case"6";
  $KEY="A";
break;
case"7";
  $KEY="B";
break;
case"8";
  $KEY="bD";
break;
case"9";
  $KEY="bE";
break;
case"10";
  $KEY="bG";
break;
case"11";
  $KEY="bA";
break;
case"12";
  $KEY="bB";
break;
}
}
else
{
	header("Location:user_noprvl.htm");
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
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
.style11 {color: #666666; font-size: 18px; }
-->
</style>
<link href="1.css" rel="stylesheet" type="text/css">
<script language="javascript">
<!--
function mp3(num){
//window.open("POETRY_mp3_VIEW.php?song_num="+num+",toolbar=no,location=no,directory=yes,status=no,scrollbars=yes,resizable=no,width=50,height=100");
window.open("POETRY_mp3_VIEW.php?song_num="+num,'',"toolbar=no,location=no,directory=no,status=no,scrollbars=no,resizable=no,width=310,height=120");
}

//-->
</script>
<link rel="stylesheet" href="../glory.css" type="text/css">
</head>
<body background="../bg.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<form action="addtion song.php?L=<? echo $L; ?>&N=<? echo $SONG_DATA[SEQ_NBR]; ?>&La=<? echo $La; ?>&index=<? echo $index; ?>&PAGE=<? echo $PAGE; ?>&S=<? echo $S; ?>" method="post" enctype="multipart/form-data" name="form1">
<div align="center">
    <p>&nbsp;</p>
  <table width="59%" height="313"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
    <tr>
      <th height="30" colspan="6" bgcolor="#666666" class="style3" scope="col">敬拜詩歌 使用系統 詩歌查詢 </th>
    </tr>
    <tr class="unnamed1">
      <th width="7%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">名稱</span></span></th>
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#FFFFFF" scope="col"><? echo $SONG_DATA[SONG_NM]; ?></th>
      <th width="7%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style11">編號</span></th>
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#FFFFFF" scope="col"><? echo sprintf("%05d",$SONG_DATA[SEQ_NBR]); ?></th>
    </tr>
    <tr class="unnamed1">
      <th height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">出處
              
      </span></span></th>
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#FFFFFF" scope="col"><? echo $SONG_DATA[SONG_ORIG]; ?></th>
      <th height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style11">類別<span class="style4"><span class="style10">
      </span></span></span></th>
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#FFFFFF" scope="col"><? echo $SONG_DATA[SONG_KIND]; ?></th>
      </tr>
    <tr class="unnamed1">
      <th height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">調性
              
      </span></span></th>
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#FFFFFF" scope="col"><? echo $KEY; ?></th>
      <th height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style11">簡譜
            
      </span></th>
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#FFFFFF" scope="col"><input name="textfield" type="text" size="16" maxlength="16" value= "<? echo trim($SONG_DATA[SONG_MUSIC]); ?>" disabled></th>
      </tr>
    <tr valign="top" class="unnamed1">
      <th height="119" colspan="6" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><div align="center" class="style4">歌詞<span class="style10"> 
            <textarea name="SONG_CHAR	" cols="45" rows="10" wrap="VIRTUAL" id="SONG_CHAR	" ><? echo trim($SONG_DATA[SONG_CHAR]); ?></textarea>
            </span></div></th>
    </tr>
    <tr class="unnamed1">
      <th height="30" colspan="3" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><? if($login_prl_result_f[POSITION]>1){ echo "<a href=\"javascript:mp3(".$SONG_DATA[SEQ_NBR].");\">"; } ?>MP3 預覽<? if($login_prl_result_f[POSITION]>1){ echo "</a>"; } ?></th>
        <th height="30" colspan="3" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><a href="POETRY_SONG_VIEW.php?SONG=<? echo $SONG_DATA[SEQ_NBR]; ?>" target="_blank" body>歌譜預覽</a></th>
      </tr>
    <tr class="unnamed1">
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10"><a href="song_louout_2.php?L=<? echo $L ;?>&S=<? echo $S; ?>&N=<? echo $N; ?>">登出回首頁</a></span></span></th>
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><a href="poetry_system_user.php?L=<? echo $L; ?>">回使用系統</a></th>
      <th width="12%" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><input name="Create" type="submit" id="Create" value="點撥"></th>
      <th width="24%" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><input onClick="location.href='<? echo $SER_KIND; ?>'" name="Cencle" type="button" id="Cencle" value="取消"></th>
    </tr>
  </table>
</div>
</form>
</body>
</html>
