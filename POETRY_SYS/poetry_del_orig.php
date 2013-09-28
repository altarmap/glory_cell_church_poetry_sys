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
$del_data = "select * from POETRY_ORIG where SEQ_NBR=\"".$SEQ_NBR."\"";
$del_data_result=mysql_query($del_data, $MyLink);
$del_data_array= mysql_fetch_array($del_data_result);
$del_day = date("y-m-d h:i:s");
//輸入刪除資訊;
$DEL_KIND="4";
$DEL_INFO=$del_data_array[KIND_NM];
 function insertdata ($aa,$bb)
   {
   return "insert into DEL_INFO ($aa) values ($bb)";
}
//查詢類別是否已有詩歌使用;
$del_orig_NM_q="select ORIG_NM from POETRY_ORIG where SEQ_NBR=\"".$SEQ_NBR."\"";
$del_orig_NM_result = mysql_query($del_orig_NM_q, $MyLink);
$del_orig_nm=mysql_fetch_array($del_orig_NM_result);
$DEL_INFO=$del_orig_nm[ORIG_NM];
$orig_NM_sear="select SONG_ORIG from POETRY_DATA where SONG_ORIG=\"".$DEL_INFO."\"";
$orig_NM_sear_result = mysql_query($orig_NM_sear, $MyLink);
$orig_num= mysql_num_rows($orig_NM_sear_result);
if($orig_num!=0){
	header("Location:del_orig_erro_3.php?PAGE=$PAGE&OM=$del_orig_nm[ORIG_NM]");
	}
else{
//輸入修改管理者之帳號資料函式
    $DEL_day = date("y-m-d h:i:s");
	$delelte_data= "delete from POETRY_ORIG where SEQ_NBR=\"".$SEQ_NBR."\"";
	$insert_del_info= insertdata ("KILLER_ID,DEL_KIND,DEL_INFO,DEL_TIME","\"$login_PRVL[ADMIN_NM]\",\"$DEL_KIND\",\"$DEL_INFO\",\"$DEL_day\"");
	if(!mysql_query($insert_del_info,$MyLink))
	{
	        header("Location:del_orig_info_erro.php?PAGE=$PAGE");
	}
	else{
	if(!mysql_query($delelte_data, $MyLink)){
		header("Location:del_orig_erro2.php?PAGE=$PAGE");
		}else{
		header("Location:del_orig_successful.php?PAGE=$PAGE");
	}
	}
}
}
else{
header('Location:admin_fix_noprvl.htm');
}

?>