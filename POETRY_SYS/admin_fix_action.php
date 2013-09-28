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
//判斷執行頁面;
$PAGE=$PA;
//查出被更改管理者資訊;
$update_data = "select * from ADMIN_DATA where SEQ_NBR=\"".$UPDATE_NM."\"";
$update_data_result=mysql_query($update_data, $MyLink);
$update_data_array= mysql_fetch_array($update_data_result);
$update_day = date("y-m-d h:i:s");
//輸入刪除資訊;
$DEL_KIND="1";
$DEL_INFO=$update_data_array[ADMIN_NM];
 function insertdata ($aa,$bb)
   {
   return "insert into DEL_INFO ($aa) values ($bb)";
}

//輸入修改管理者之帳號資料函式
if ($del_check=="checkbox"){
	$DEl_time=date("y-m-d h:i:s");
	$delelte_data= "delete from ADMIN_DATA where SEQ_NBR=\"".$UPDATE_NM."\"";
	$insert_del_info= insertdata ("KILLER_ID,DEL_KIND,DEL_INFO,DEL_TIME","\"$login_PRVL[ADMIN_NM]\",\"$DEL_KIND\",\"$DEL_INFO\",\"$DEl_time\"");
	if(!mysql_query($insert_del_info,$MyLink))
	{
		echo "刪除記錄失敗";
		}else{
	if(!mysql_query($delelte_data, $MyLink)){
		echo "資料刪除失敗";
		}else{
		header("Location:successful.php?PAGE=$PAGE");
	}
	}
}
else{
if($ADMIN_PRVL){
	if($ADMIN_PRVL == $update_data_array[PRVL_ID] and $ADMIN_PASS == ""){
        header("Location:erro_1.php?PAGE=$PAGE");
        }
        else{
                 if($ADMIN_PRVL == $update_data_array[PRVL_ID] and $ADMIN_PASS == $update_data_array[PASSWORD]){
                 header("Location:erro_2.php?PAGE=$PAGE");     
                 }
             else{
                 if($ADMIN_PRVL == $update_data_array[PRVL_ID] and $ADMIN_PASS!=$update_data_array[PASSWORD]){
                 	$update="update ADMIN_DATA set PASSWORD =\"".$ADMIN_PASS."\" , UPD_ADMIN_NM =\"".$login_PRVL[ADMIN_NM]."\" , UPD_DT =\"".$update_day."\" where SEQ_NBR =\"".$UPDATE_NM."\"";
                 	
                 	if(!mysql_query($update, $MyLink)){
                 		echo "資料處理失敗！";
                 	}
                 	else{
                 	header("Location:successful.php?PAGE=$PAGE");
                 	}
                 	}
                 else{
                        if($ADMIN_PRVL != $update_data_array[PRVL_ID] and $ADMIN_PASS == ""){
                 	$update="update ADMIN_DATA set PRVL_ID =\"".$ADMIN_PRVL."\", UPD_ADMIN_NM =\"".$login_PRVL[ADMIN_NM]."\" , UPD_DT =\"".$update_day."\" where SEQ_NBR =\"".$UPDATE_NM."\"";
                 	if(!mysql_query($update, $MyLink)){
                 		echo "資料處理失敗！";
                 	}
                 	else{
                 	header("Location:successful.php?PAGE=$PAGE");
                 	}
                }
                else{
                if($ADMIN_PRVL != $update_data_array[PRVL_ID] and $ADMIN_PASS == $update_data_array[PASSWORD]){
                	header("Location:erro_2.php?PAGE=$PAGE");
                	}
                else{
                $update="update ADMIN_DATA set PRVL_ID =\"".$ADMIN_PRVL."\", PASSWORD =\"".$ADMIN_PASS."\" , UPD_ADMIN_NM =\"".$login_PRVL[ADMIN_NM]."\" , UPD_DT =\"".$update_day."\" where SEQ_NBR =\"".$UPDATE_NM."\"";
                if(!mysql_query($update, $MyLink)){
                 		echo "資料處理失敗！";
                 	}
                 	else{
                 	header("Location:successful.php?PAGE=$PAGE");
                 	}
                }
                
                }
                }
                }
                }
                }
else{
header("Location:erro_0.php?PAGE=$PAGE");
}
}
}
else{
header('Location:admin_fix_noprvl.htm');
}


?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>執行管理者修正</title>
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
a:link {
	color: #666666;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #666666;
}
a:hover {
	text-decoration: none;
	color: #993333;
}
a:active {
	text-decoration: none;
	color: #666666;
}
.style7 {color: #FFFFFF}
-->
</style></head>

<body>
<div align="center">
  <p>&nbsp;</p>
</div>
</body>
</html>