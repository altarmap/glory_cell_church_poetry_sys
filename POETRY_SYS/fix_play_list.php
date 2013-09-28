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
//引入資料庫連結程式，並回傳狀態
include("user_link.php");
$login_NM_Q="select CHN_NM from GCC_USR_PROF where SEQ_NBR =".$login_ID[USER_ID];
$login_NM_R= mysql_query($login_NM_Q, $MyLink);
$login_NM_F=mysql_fetch_array($login_NM_R);
//引入資料庫連結程式，並回傳狀態
include("link.php");
//判斷是否登出或網頁過期;
include("check_user_logout.php");
//依據權限給予使用
if ($login_ID_NUM == 1){	
function insertdata ($aa,$bb)
   {
   return "insert into PLAY_LIST ($aa) values ($bb)";
}
$CRT_day = date("y-m-d h:i:s");
$del_day = date("y-m-d h:i:s");
 function del_data ($aa,$bb)
   {
   return "insert into DEL_INFO ($aa) values ($bb)";
}
//判斷是否為撥放;
if($aaa==1){
$pl=0;
$pf=1;
while($pl<$del_num){

if($coda[$pl]>0){
$update="update SONG_LIST set SONGCODA=\"".$coda[$pl]."\" where PLAY_LISR_NBR=\"".$L."\" and SONG_NBR=\"".$del_number[$pf]."\"";
if(!mysql_query($update, $MyLink)){
header("Location:update_song_list_erro.php?L=".$L);
exit();
}
}
$pl++;
$pf++;
}
header("location:poetry_play_funtion.php?L=".$L."&I=".$I);
return;
}
//判斷歌曲刪除;
$d=0;
$up_n=1;
while($d<$del_num){
	if($del[$up_n]=="checkbox"){
//查出被更改管理者資訊;
$song_nm_q="select * from POETRY_DATA where SEQ_NBR=\"".$del_number[$up_n]."\"";
$song_nm_R=mysql_query($song_nm_q, $MyLink);
$song_nm_F=mysql_fetch_array($song_nm_R);
//輸入刪除資訊;
$DEL_KIND="5";
$DEL_INFO="點撥清單 ".sprintf("%05d",$L)." 刪除 ".$song_nm_F[SONG_NM];
$DEl_time=date("y-m-d h:i:s");
$insert_del_info= del_data ("KILLER_ID,DEL_KIND,DEL_INFO,DEL_TIME","\"$login_NM_F[CHN_NM]\",\"$DEL_KIND\",\"$DEL_INFO\",\"$DEl_time\"");
if(!mysql_query($insert_del_info,$MyLink)){
		echo "刪除記錄失敗";
	}
	
	
	
$song_del="delete from SONG_LIST where PLAY_LISR_NBR=\"".$L."\" and SONG_NBR=\"".$del_number[$up_n]."\"";
if(!mysql_query($song_del, $MyLink)){
header("Location:del_song_list_erro.php?L=".$L);
exit();
}
else{

}







}
else{

$update="update SONG_LIST set SONG_SERIL=\"".$serial_n[$up_n]."\" where PLAY_LISR_NBR=\"".$L."\" and SONG_NBR=\"".$del_number[$up_n]."\"";
if(!mysql_query($update, $MyLink)){
header("Location:update_song_list_erro.php?L=".$L);
exit();
}
}
$d++;
$up_n++;	
}
header("Location:update_song_list_successful.php?L=".$L);
}
else{
header('Location:login_erro.php?LOG=1');
}

?>
