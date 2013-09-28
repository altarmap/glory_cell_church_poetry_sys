<?php
//判斷是否登出或網頁過期;
//   $COOKIE_VAL = (empty($COOKIE_VAL))?@$_COOKIE['COOKIE_VAL']:$COOKIE_VAL;
$login_query = "select * from ADMIN_COOKIE where COOKIE_VAL=\"".$COOKIE_VAL."\"";
   $login_result = mysql_query($login_query, $MyLink);
   $login_ID = mysql_fetch_array($login_result);
   $PRVL_query = "select * from ADMIN_DATA where SEQ_NBR=\"".$login_ID[ADMIN_ID]."\"";
   $PRVL_result = mysql_query($PRVL_query, $MyLink);
   $login_PRVL = mysql_fetch_array($PRVL_result);
//print_r($login_PRVL);

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


if ($COOKIE_VAL == $login_ID[COOKIE_VAL] and $login_ID[LOG_OUT] ==""){
       }
	   else{
	   header("Location:logout_relogin_admin.php");
	   exit();
	   }
?>
