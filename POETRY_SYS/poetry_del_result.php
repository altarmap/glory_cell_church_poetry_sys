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
//查出被更改管理者資訊;
$del_data = "select * from POETRY_DATA where SEQ_NBR=\"".$SN."\"";
$del_data_result=mysql_query($del_data, $MyLink);
$del_data_array= mysql_fetch_array($del_data_result);
$del_day = date("y-m-d h:i:s");
//輸入刪除資訊;
$DEL_KIND="2";
$DEL_INFO=sprintf("%05d",$del_data_array[SEQ_NBR])."　".$del_data_array[SONG_NM];
$DEl_time=date("y-m-d h:i:s");
 function insertdata ($aa,$bb)
   {
   return "insert into DEL_INFO ($aa) values ($bb)";
}
//刪除資料;
$del_query = "delete from POETRY_DATA where SEQ_NBR=\"".$SN."\"";
if(!mysql_query($del_query,$MyLink)){
       header("Location:del_poetry_erro2.php");
}
else{
$insert_del_info= insertdata ("KILLER_ID,DEL_KIND,DEL_INFO,DEL_TIME","\"$login_PRVL[ADMIN_NM]\",\"$DEL_KIND\",\"$DEL_INFO\",\"$DEl_time\"");
if(!mysql_query($insert_del_info,$MyLink)){
		echo "刪除記錄失敗";
	}
	else{
	
header("Location:del_poetry_successful.php");
}
}
}
else
{
header('Location:admin_fix_noprvl.htm');
}
?>