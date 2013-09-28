<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>詩歌新增</title>
<?
//引入no-cache.php
include("no-cache.php");
//引入資料庫連結程式，並回傳狀態
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
if ($login_PRVL[PRVL_ID]== 1 || $login_PRVL[PRVL_ID]==2){
   if($SONG_NM =="" || $SONG_CHAR=="" || $SONG_KEY==0){
 header('Location:insert_poetry_erro_1.php');  
   	}
else{

/*echo "SL=".$SL."<BR>";
echo "SONG_NM=".$SONG_NM."<BR>";
echo "SONG_ORIG=".$SONG_ORIG."<BR>";
echo "SONG_KIND=".$SONG_KIND."<BR>";
echo "SONG_KEY=".$SONG_KEY."<BR>";
echo "SONG_MUSIC=".$SONG_MUSIC."<BR>";


echo "SONG_CHAR=";
echo nl2br($SONG_CHAR);
echo "CRT_USER_NM=".$login_PRVL[ADMIN_NM]."<BR>";*/
if($SL==1){
	$SONG_CHAR=trim(chop(str_replace(" ","",$SONG_CHAR)));
	$SONG_NM=trim(chop(str_replace(" ","",$SONG_NM)));
}
else{
$SONG_CHAR=rtrim(ltrim($SONG_CHAR));
}
$SONG_MUSIC=trim(chop(str_replace(" ","",$SONG_MUSIC)));
$CRT_day = date("y-m-d h:i:s");

function insertdata ($aa,$bb){
   return "insert into POETRY_DATA($aa) values ($bb)";
}

  $POETRY_DATA_insert = insertdata ("SONG_LANG,SONG_NM,SONG_ORIG,SONG_KIND,SONG_KEY,SONG_MUSIC,SONG_CHAR,CRT_USER_NM,CRT_DT","\"$SL \",\"$SONG_NM \",\"$SONG_ORIG \",\"$SONG_KIND \",\"$SONG_KEY \",\"$SONG_MUSIC \",\"$SONG_CHAR \",\"$login_PRVL[ADMIN_NM]\",\"$CRT_day\"");
    if(!mysql_query($POETRY_DATA_insert, $MyLink)){
             header('Location:insert_poetry_data_erro.php');
          }
         else{
	 header('Location:crt_poetry_data_successful.php');
          }
}
}
else{
header('Location:admin_fix_noprvl.htm');
	}
?>
