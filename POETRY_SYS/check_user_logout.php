<?php
//判斷是否登出或網頁過期;
//   $USER_COOKIE_VAL = (empty($USER_COOKIE_VAL) || $USER_COOKIE_VAL == 0)?@$_COOKIE['USER_COOKIE_VAL']:$USER_COOKIE_VAL;
   $login_query = "select * from USER_COOKIE where COOKIE_VAL=\"".$USER_COOKIE_VAL."\"";
   $login_result = mysql_query($login_query, $MyLink);
   $login_ID = mysql_fetch_array($login_result);
   $login_ID_NUM = mysql_num_rows($login_result);

if ($USER_COOKIE_VAL == $login_ID[COOKIE_VAL] and $login_ID[LOG_OUT] ==""){
       }
	   else{
 header("Location:logout_relogin_user.php");
	   exit();
	   }
	if (is_array($_GET)){

	foreach ($_GET as $k => $v){
		${$k} = $v;
	}
	}
	if (is_array($_POST)){

	foreach ($_POST as $k => $v){
		${$k} = $v;
	}
	}
?>
