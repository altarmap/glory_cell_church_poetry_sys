<?php
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
if ($login_PRVL[PRVL_ID] == 2 || $login_PRVL[PRVL_ID] == 1){
$CRT_day = date("y-m-d h:i:s");
 function insertdata ($aa,$bb)
   {
   return "insert into POETRY_ORIG ($aa) values ($bb)";
}
$insert_ORIG_info= insertdata ("ORIG_NM,CRT_USER_NM,CRT_DT","\"".$SONG_ORIG."\",\"".$login_PRVL[SEQ_NBR]."\",\"".$CRT_day."\"");
if(!mysql_query($insert_ORIG_info,$MyLink)){
	header("Location:new_orig_erro.php");
	}
	else{
	header("Location:new_orig_successful.php");
}
}
	else{
	header('Location:admin_fix_noprvl.htm');
}
?>
