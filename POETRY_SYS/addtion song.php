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
//判斷是否登出或網頁過期;
include("check_user_logout.php");
//依據權限給予使用
if ($login_ID_NUM == 1){	
function insertdata ($aa,$bb)
   {
   return "insert into PLAY_LIST ($aa) values ($bb)";
}
$CRT_day = date("y-m-d h:i:s");
$plist_insert = insertdata ("SEQ_NBR,USER_ID,CRT_TIME","\"".$L."\",\"".$login_ID[USER_ID]."\",\"".$CRT_day."\"");
if(!mysql_query($plist_insert, $MyLink)){
//查詢點撥歌曲最後的序號;
$SONG_S_Q = "select SEQ_NBR from SONG_LIST order by SEQ_NBR desc";
$SONG_S_R = mysql_query($SONG_S_Q, $MyLink);
$SONG_S_data = mysql_fetch_array($SONG_S_R);
$Serial=$SONG_S_data[SEQ_NBR]+1;
   function insert_song ($aa,$bb)
   {
   return "insert into SONG_LIST ($aa) values ($bb)";
}
   $song_list_insert = insert_song ("PLAY_LISR_NBR,SONG_NBR,SONG_SERIL,CRT_TIME ","\"".$L."\",\"".$N."\",\"".$Serial."\",\"".$CRT_day."\"");
if(!mysql_query($song_list_insert, $MyLink)){
	header("Location:insert_song_list_erro.php?S=".$S."&L=".$L."&La=".$La."&index=".$index."&PAGE=".$PAGE);
	}
else{
header("Location:insert_song_list_successful.php?S=".$S."&L=".$L."&La=".$La."&index=".$index."&PAGE=".$PAGE);
}
}
else{
//查詢點撥歌曲最後的序號;
$SONG_S_Q = "select SEQ_NBR from SONG_LIST order by SEQ_NBR desc";
$SONG_S_R = mysql_query($SONG_S_Q, $MyLink);
$SONG_S_data = mysql_fetch_array($SONG_S_R);
$Serial=$SONG_S_data[SEQ_NBR]+1;
   function insert_song ($aa,$bb)
   {
   return "insert into SONG_LIST ($aa) values ($bb)";
}
   $song_list_insert = insert_song ("PLAY_LISR_NBR,SONG_NBR,SONG_SERIL,CRT_TIME ","\"".$L."\",\"".$N."\",\"".$Serial."\",\"".$CRT_day."\"");
if(!mysql_query($song_list_insert, $MyLink)){
        header("Location:insert_song_list_erro.php?S=".$S."&L=".$L."&La=".$La."&index=".$index."&PAGE=".$PAGE);
	}
else{
header("Location:insert_song_list_successful.php?S=".$S."&L=".$L."&La=".$La."&index=".$index."&PAGE=".$PAGE);
}
}
}
else{
header('Location:login_erro.php?LOG=1');
}

?>
