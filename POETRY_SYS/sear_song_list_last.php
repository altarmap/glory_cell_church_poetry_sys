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
if ($login_ID_NUM=1){
$L_q="select SEQ_NBR from PLAY_LIST order by SEQ_NBR desc";
$L_r=mysql_query($L_q, $MyLink);
$L_F=mysql_fetch_array($L_r);
$L_N=mysql_num_rows($L_r);
if($L_N==0){
	header("Location:sear_last_list_erro2.php");
	}else{
$L=$L_F[SEQ_NBR];
	header("Location:poetry_sys_playlist.php?L=".$L."&I=D4J23");
	}
}
	else{
	header("Location:user_noprvl.htm");
}

?>
