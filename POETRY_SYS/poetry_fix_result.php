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
$update_old_query = "select * from POETRY_DATA where SEQ_NBR=\"".$SN."\"";
$update_old_result=mysql_query($update_old_query, $MyLink);
$update_old_data= mysql_fetch_array($update_old_result);
if ($SONG_NM==$update_old_data[SONG_NM] and $SONG_KEY==$update_old_data[SONG_KEY] and $SONG_CHAR==trim($update_old_data[SONG_CHAR]) and $SONG_ORIG==$update_old_data[SONG_ORIG] and $SONG_MUSIC==trim($update_old_data[SONG_MUSIC])){
header("Location:poetry_fix_erro_2.php?SN=".$SN);
}
else{
if ($update_old_data[SONG_LANG]==1){
$SONG_NM=trim(chop(str_replace(" ","",$SONG_NM)));
$SONG_CHAR=trim(chop(str_replace(" ","",$SONG_CHAR)));
}
else if($update_old_data[SONG_LANG]==2){
$SONG_CHAR=ltrim(rtrim($SONG_CHAR));
}
$SONG_MUSIC=trim(chop(str_replace(" ","",$SONG_MUSIC)));
$update_day = date("y-m-d h:i:s");
$update_query="update POETRY_DATA set SONG_NM =\"".$SONG_NM."\" ,SONG_ORIG =\"".$SONG_ORIG. "\",SONG_KIND =\"".$SONG_KIND."\" , SONG_KEY =\"".$SONG_KEY."\" , SONG_MUSIC =\"".$SONG_MUSIC."\" ,SONG_CHAR =\"".$SONG_CHAR. "\",UPD_USER_NM =\"".$login_PRVL[ADMIN_NM]."\" ,UPD_DT =\"".$update_day."\" where SEQ_NBR =\"".$SN."\"";

if(!mysql_query($update_query,$MyLink)){
       header("Location:fix_poetry_erro2.php?SN=".$SN);
}
else{
header("Location:fix_poetry_successful.php");
}
}
}
else{
header('Location:admin_fix_noprvl.htm');
}

?>