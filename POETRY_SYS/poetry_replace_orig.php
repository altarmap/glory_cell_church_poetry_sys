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
//查出被刪除資訊;
$del_data = "select * from POETRY_ORIG where ORIG_NM=\"".$OM."\"";
$del_data_result=mysql_query($del_data, $MyLink);
$del_data_array= mysql_fetch_array($del_data_result);
$update_day = date("y-m-d h:i:s");
//輸入刪除資訊;
$DEL_KIND="4";
$DEL_INFO=$del_data_array[ORIG_NM];
$DEl_time=date("y-m-d h:i:s");
 function insertdata ($aa,$bb)
   {
   return "insert into DEL_INFO ($aa) values ($bb)";
}
//將歌曲更換類別;
$update="update POETRY_DATA set SONG_ORIG =\"".$SONG_ORIG."\", UPD_USER_NM =\"".$login_PRVL[ADMIN_NM]."\" , UPD_DT =\"".$update_day."\" where SONG_ORIG =\"".$DEL_INFO."\"";
if(!mysql_query($update, $MyLink)){
	header("Location:replace_orig_erro.php?PAGE=$PAGE");
}
else{
         //類別刪除;
         $delete_orig="delete from POETRY_ORIG where ORIG_NM =\"".$DEL_INFO."\"";
         if(!mysql_query($delete_orig, $MyLink)){
	header("Location:replace_kind_erro1.php?PAGE=$PAGE");
}
else{
	//輸入修改管理者之帳號資料函式
	$insert_del_info= insertdata ("KILLER_ID,DEL_KIND,DEL_INFO,DEL_TIME","\"$login_PRVL[ADMIN_NM]\",\"$DEL_KIND\",\"$DEL_INFO\",\"$DEl_time\"");
	if(!mysql_query($insert_del_info,$MyLink))
	{
	        header("Location:del_orig_info_erro.php?PAGE=$PAGE");
	}
	else{
	
	header("Location:del_orig_successful.php?PAGE=$PAGE");
        }
}
}
}
else{
header('Location:admin_fix_noprvl.htm');
}
?>