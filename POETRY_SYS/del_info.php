<?php
//引入no-cache.php
include("no-cache.php");
//引入資料庫連結程式，並回傳狀態
include("link.php");
//查出登入者;
   $login_query = "select * from ADMIN_COOKIE where COOKIE_VAL=\"".$COOKIE_VAL."\"";
   $login_result = mysql_query($login_query, $MyLink);
   $login_ID = mysql_fetch_array($login_result);
   $PRVL_query = "select * from ADMIN_DATA where SEQ_NBR=\"".$login_ID[ADMIN_ID]."\"";
   $PRVL_result = mysql_query($PRVL_query, $MyLink);
   $login_PRVL = mysql_fetch_array($PRVL_result);
   
//判斷是否登出或網頁過期
include("check_logout.php");
//依據權限給予使用

if ($login_PRVL[PRVL_ID]!= 2){
	header('Location:admin_fix_noprvl.htm');
      	}
	else{
	//判斷查詢類別;
	switch($DEL_KIND){
	case"1";
	     $DEL="帳 號";
	     break;
	case"2";
	     $DEL="詩 歌";
	     break;
	case"3";
	     $DEL="類 別";
	     break;
	     
	case"4";
	     $DEL="出 處";
	     break;
	case"5";
	     $DEL="點 撥";
	     break;     
	}
	$num_query = "select SEQ_NBR from DEL_INFO  where DEL_KIND =\"".$DEL_KIND."\"";
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>刪除記錄</title>
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
.style14 {color: #FF0000}
.style20 {font-size: 18px; color: #666666; }
-->
</style>
<link rel="stylesheet" href="../glory.css" type="text/css">
</head>
<body background="../bg.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div align="center">
  <p>&nbsp;</p>
  <table width="74%" height="100"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
    <tr>
      <th height="30" colspan="5" bgcolor="#666666" class="style3" scope="col"><? echo $DEL; ?> 刪 除 記 錄 </th>
    </tr>
    <tr>
      <th width="9%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">NO.</span></span><span class="style4"></span></th>
      <th width="21%" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">刪 除 者</span></span><span class="style4"></span></th>
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">刪除資料名稱</span></span><span class="style4"></span></th>
      <th width="36%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">刪除時間</span></span></th>
    </tr>
    <?
//資料數判斷;
  $DEL_NUM_result = mysql_query($num_query, $MyLink);
  $NUM = mysql_num_rows($DEL_NUM_result);
//頁數判斷;
   if($NUM == 0){
   echo "<tr bgcolor=\"#FFFFFF\"><th height=\"30\" colspan=\"6\" bordercolor=\"#FFFFFF\" scope=\"col\">查無資料！</th></tr>";
   }
   else{
//資料分筆調閱;
   if($PAGE!=""){
   if($PAGE==1){
   $PAGE=0;
   }
   else{
   $PAGE=$PAGE-1;
   $PAGE=$PAGE*10;
   }
   }
   else{
   $PAGE=0;
}
if($PAGE==0){
	$n=1;
	}else{
	$n=$PAGE+1;
}
$data_query = "select * from DEL_INFO  where DEL_KIND =\"".$DEL_KIND."\" order by SEQ_NBR desc limit $PAGE,10";
$DEL_DATA_result = mysql_query($data_query, $MyLink);
$DATA_NUM = mysql_num_rows($DEL_DATA_result);
//資料列印;
if($PAGE==0){
   $PA="1";
   }
   else{
   $PA=$PAGE/10;
   $PA=$PA+1;
   }
$i=0;
   while($i<$DATA_NUM){
$DEL_DATA[$i] = mysql_fetch_array($DEL_DATA_result);
echo "<tr bgcolor=\"#FFFFFF\"><th width=\"8%\" height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style10\">".$n."</span></th><th width=\"20%\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style10\">".$DEL_DATA[$i][KILLER_ID]."</span></th><th height=\"30\" colspan=\"2\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style10\">".$DEL_DATA[$i][DEL_INFO]."</span></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style10\">".$DEL_DATA[$i][DEL_TIME]."</span></th></tr>";
$i++;
$n++;
}
}
//頁數選擇;
$PAGE_NUM = ceil($NUM/10);
switch($PAGE_NUM){
    case "0";
	   break;
    case "1";
	   break;
	default;
echo "<tr><th height=\"30\" colspan=\"6\" bordercolor=\"#FFFFFF\" bgcolor=\"#E1E1E1\" scope=\"col\">";
$p=1;
while($p<=$PAGE_NUM){
echo "<a href=\"del_info.php?DEL_KIND=".$DEL_KIND."& PAGE=".$p."\"><u>".$p."</u> </a>";
$p++;
}
echo "</th></tr>";
break;
}


?>
    <tr>
      <th height="30" colspan="3" bordercolor="#FFFFFF" bgcolor="#666666" scope="col"><p align="center">
        <input onClick="location.href='del_info.php<? echo "?PAGE=";  if($PAGE!=0){ $PAGE=$PAGE/10; $PAGE=$PAGE+1; }else{$PAGE=1;}echo $PAGE;  echo " & DEL_KIND=".$DEL_KIND;?>'" type="submit" name="Submit" value="重新整理">
          <span class="style4"> </span><span class="style4"> </span><span class="style4"> </span> </p></th>
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#666666" scope="col"><span class="style4">
        <input onClick="location.href='del_info.htm'" name="Cancle" type="button" id="Cancle" value="取消">
      </span></th>
    </tr>
  </table>
</div>
</body>
</html>
