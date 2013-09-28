<?
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
if ($login_ID_NUM==1){
        $Y=sprintf("%04d",$Y);
        $M=sprintf("%02d",$M);
        $D=sprintf("%02d",$D);
	if($Y=="" || $M=="" || $D==""){
		header("Location:sear_list_date_erro.php?L=".$L);
	}
	else{
        	$date_q="select SEQ_NBR from PLAY_LIST where CRT_TIME like \"".$Y."-".$M."-".$D."%\" order by SEQ_NBR asc";
	$date_R=mysql_query($date_q);
	$date_num=mysql_num_rows($date_R);
	if($date_num==0){
		header("Location:sear_list_date_erro2.php?L=".$L);
}
}
}
else{
	header("Location:user_noprvl.htm");
}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>清單搜尋</title>
<style type="text/css">
<!--
body {
	background-color: #000000;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style3 {font-family: "華康楷書體W5(P)"; font-size: 24px; color: #FFFFFF;}
.style4 {color: #666666}
a:link {
	text-decoration: none;
	color: #666666;
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
.style10 {font-size: 18px; color: #666666;}
.style13 {color: #666666; font-size: 16px; }
-->
</style></head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div align="center">
  <table width="76%" height="131"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
  <tr>
    <th height="30" colspan="4" bgcolor="#666666" class="style3" scope="col"> 使用者系統 清單搜尋 </th>
  </tr>
  <tr>
    <th width="24%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">清單編號</span></span><span class="style4">(請點取)</span></th>
    <th width="35%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">建立日期</span></span></th>
    <th width="18%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">建立者</span></span></th>
    <th width="23%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">建立時間</span></span><span class="style4"><span class="style10"></span></span></th>
  </tr>
<?
   $data_query = "select * from PLAY_LIST where CRT_TIME like \"".$Y."-".$M."-".$D."%\" order by SEQ_NBR asc";
   $DATA_result = mysql_query($data_query, $MyLink);
   $NUM1 = mysql_num_rows($DATA_result);
   $i=0;
   $n=1;
   while($i<$NUM1){
 $DATA[$i] = mysql_fetch_array($DATA_result);
include("user_link.php");
 $data_name_q="select CHN_NM from GCC_USR_PROF where SEQ_NBR=\"".$DATA[$i][USER_ID]."\"";
 $data_name_r=mysql_query($data_name_q, $MyLink);
 $data_name_F=mysql_fetch_array($data_name_r);
include("user_link.php");
echo "<tr bgcolor=\"#FFFFFF\"><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><a href=\"poetry_sys_playlist.php?L=".$DATA[$i][SEQ_NBR]."&I=D4J23&Y=".$Y."&M=".$M."&D=".$D."\">".sprintf("%05d",$DATA[$i][SEQ_NBR])."</a></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\">".$Y."-".$M."-".$D."</th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\">".$data_name_F[CHN_NM]."</th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\">".substr($DATA[$i][CRT_TIME],11,8)."</th></tr>";
$i++;
$n++;
}
?>
  <tr>
    <th height="30" colspan="4" bordercolor="#FFFFFF" bgcolor="#666666" scope="col"><p align="center"><span class="style4">
      <input onClick="location.href='inser_plist_num.php?L=<? echo $L; ?>'" name="Cancle" type="button" id="Cancle" value="取消">
    </span></p></th>
  </tr>
</table>
</div>
</body>
</html>

