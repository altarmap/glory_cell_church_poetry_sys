<?php
//引入no-cache.php
 include("no-cache.php");
 //引入資料庫連結程式，並回傳狀態
 include("link.php");
 //比對登入者資料程式；
 $Mytable = "ADMIN_DATA";
 $ADMIN_LOG_NM = $_POST['ADMIN_LOG_NM'];
 $ADMIN_LOG_PASS = $_POST['ADMIN_LOG_PASS'];
 $query = "select SEQ_NBR,ADMIN_NM,PASSWORD,PRVL_ID from $Mytable where ADMIN_NM=\"".$ADMIN_LOG_NM."\" and PASSWORD=\"".$ADMIN_LOG_PASS."\"";
 $result = mysql_query($query, $MyLink);
 $check_NUM = mysql_num_rows($result);
 $Login_data = mysql_fetch_array($result);
 //設定cookie變數;
 $CookieTab = "ADMIN_COOKIE";
 $time=date("M-d-Y-h-i-s");
 $COOKIE_VAL = md5($Login_data[ADMIN_NM].$Login_data[PASSWORD].$Login_data[PRVL_ID].$time);
 //輸入cookie資料函式；
 function insertdata ($aa,$bb)
   {
   return "insert into ADMIN_COOKIE($aa) values ($bb)";
}
 //判斷登入是否成功;
 if($ADMIN_LOG_NM != "" and $ADMIN_LOG_PASS != ""){
 if($check_NUM != 1){
 	header('Location:login_erro.php?LOG=2');
    }
  else{
        $LASTUSE_TIME=date("H:i:s");
        $Logtime=date("y-m-d h:i:s");
        $Cookie_insert = insertdata ("COOKIE_VAL,ADMIN_ID,LOG_TIME,LASTUSE_TIME","\"$COOKIE_VAL\",\"$Login_data[SEQ_NBR] \",\"$Logtime\",\"$LASTUSE_TIME\"");
        if(!mysql_query($Cookie_insert, $MyLink)){
             echo "資料無法存入\"COOKIE_TABLE\"";
             echo mysql_error();
        	}
         else{
          $life_time = time()+3600;//一小時;
          setcookie ("COOKIE_VAL",$COOKIE_VAL,0,"/",".glow.org.tw");
//          setcookie ("COOKIE_VAL",$COOKIE_VAL,0,"/");
      //echo $ADMIN_LOG_NM.$ADMIN_LOG_PASS.$check_NUM;
	    header('Location:poetry_system_admin.htm');
      //    header('Location:../cookie.php');
       }
       }
}
else
  {
  	header('Location:login_erro.php?LOG=2');
  }
?>
