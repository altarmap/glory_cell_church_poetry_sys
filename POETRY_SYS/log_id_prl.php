 <? 
 include("../link.php");
   $login_prl="select POSITION from GCC_USR_PROF where SEQ_NBR = $login_ID[USER_ID]";
   $login_prl_result = mysql_query($login_prl, $MyLink);
   $login_prl_result_f= mysql_fetch_array($login_prl_result);
 ?>