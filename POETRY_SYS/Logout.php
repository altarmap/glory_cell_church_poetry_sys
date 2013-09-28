<?
//引入no-cache.php
include("no-cache.php");
//引入資料庫連結程式，並回傳狀態
include("link.php");
//登出記錄寫入;
 $Logout_time=date(h).date(i).date(s);
 $logout_query = "update ADMIN_COOKIE  set LOG_OUT='$Logout_time' where COOKIE_VAL='$COOKIE_VAL';";
 mysql_query($logout_query, $MyLink);
//清除cookies值;
setcookie("COOKIE_VAL",0,0,"/",".glow.org.tw"); 
//header('location:logout_result.php');
header('Location:poetry_system.htm');
?>
