<?php
//引入no-cache.php
include("no-cache.php");
//引入資料庫連結程式，並回傳狀態
include("link.php");
//查出新增者;
   $login_query = "select * from ADMIN_COOKIE where COOKIE_VAL=\"".$COOKIE_VAL."\"";
   $login_result = mysql_query($login_query, $MyLink);
   $login_ID = mysql_fetch_array($login_result);
   $PRVL_query = "select * from ADMIN_DATA where SEQ_NBR='$login_ID[ADMIN_ID]'";
   $PRVL_result = mysql_query($PRVL_query, $MyLink);
   $login_PRVL = mysql_fetch_array($PRVL_result);
//判斷是否登出或網頁過期
include("check_logout.php");
//依據權限給予使用
if ($login_PRVL[PRVL_ID] != 2){
   	header("Location:admin_fix_noprvl.htm");
	}
	else{
//輸入新增管理者之帳號資料函式
 function insertdata ($aa,$bb)
   {
   return "insert into ADMIN_DATA ($aa) values ($bb)";
}
if($ADMIN_NM != "" and $ADMIN_PASS != "" and $ADMIN_PRVL != "0"){
$CRTE_TIME=date("y-m-d h:i:s");
$Admin_nm_insert = insertdata ("ADMIN_NM,PASSWORD,PRVL_ID,CRT_ADMIN_NM,CRT_DT","\"$ADMIN_NM\",\"$ADMIN_PASS\",\"$ADMIN_PRVL\",\"$login_ID[ADMIN_ID]\",\"$CRTE_TIME\"");
        if(!mysql_query($Admin_nm_insert, $MyLink)){
             header("Location:insert_erro.php");
          }
         else{
 		    header("Location:crt_admin_successful.php");
          }
          }		  
	 else
	  {  
	     echo "<html><head><meta http-equiv=\"refresh\" content=\"2; URL=admin_crt_usernm.htm\"><title>無標題文件</title><style type=\"text/css\"><!--body {background-color: #000000;";
	     echo "margin-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;}a:link {color: #666666;text-decoration: none;}a:visited {text-decoration: none;color: #666666;}a:hover {text-decoration: none;color: #993333;";
             echo "}a:active {text-decoration: none;color: #666666;}.style7 {color: #FFFFFF}--></style></head><body><div align=\"center\"> <p>&nbsp;</p> <p>&nbsp;</p><p>&nbsp;</p><table width=\"415\" height=\"38\"  border=\"3\" align=\"center\" cellpadding=\"5\" cellspacing=\"1\" bordercolor=\"#CCCCCC\"><tr class=\"unnamed1\">";
             echo "<th width=\"74%\" height=\"30\" bordercolor=\"#FFFFFF\" bgcolor=\"#E1E1E1\" scope=\"col\">請確實輸入姓名、密碼及使用權限！</th> </tr> </table> <p>&nbsp;</p></div></body></html>";
	  }
	  }
?>
