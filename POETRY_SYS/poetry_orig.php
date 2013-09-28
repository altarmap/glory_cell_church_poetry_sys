<?php
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
if ($login_PRVL[PRVL_ID] == 2 || $login_PRVL[PRVL_ID] == 1){
    $num_query = "select SEQ_NBR from POETRY_ORIG";
//資料數判斷;
   $ORIG_NUM_result = mysql_query($num_query, $MyLink);
   $NUM = mysql_num_rows($ORIG_NUM_result);
}
	else{
	header('Location:admin_fix_noprvl.htm');
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>出處管理</title>
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
.style10 {font-size: 18px}
.style50 {
	font-size: 18px;
	color: #FFFFFF;
}
-->
</style>
<link rel="stylesheet" href="../glory.css" type="text/css">
</head>
<body background="../bg.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
  <table width="37%" height="165"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
    <tr>
      <th height="30" colspan="4" bgcolor="#666666" class="style3" scope="col">敬拜詩歌 出處管理 </th>
    </tr>
    <tr>
      <th width="16%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">NO.</span></span></th>
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">出 處 名 稱 </span></span></th>
      <th width="20%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">刪除 </span></span></th>
    </tr>
    <? 
//頁數判斷;
   if($NUM == 0){
   echo "<tr bgcolor=\"#FFFFFF\"><th height=\"30\" colspan=\"6\" bordercolor=\"#FFFFFF\" scope=\"col\">查無資料！</th></tr>";
   }
   else{
//資料分筆調閱;
if ($PAGE==0 || $PAGE==""){
	}else{
	$CPAGE=($PAGE-1)*10;
if($CPAGE<$NUM){
	
	}else{
	$PAGE=$PAGE-1;
	}
	}
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
$data_query = "select * from POETRY_ORIG order by ORIG_NM asc limit $PAGE,10";
$ORIG_DATA_result = mysql_query($data_query, $MyLink);
$DATA_NUM = mysql_num_rows($ORIG_DATA_result);
//資料列印;
if($PAGE==0){
   $PA="1";
   }
   else{
   $PA=$PAGE/10;
   $PA=$PA+1;
   }
}
$i=0;
   while($i<$DATA_NUM){
$ORIG_DATA[$i] = mysql_fetch_array($ORIG_DATA_result);
echo  "<tr><form name=\"form1\" method=\"post\" action=\"orig_del_action.php\"><th width=\"14%\" height=\"30\" bordercolor=\"#FFFFFF\" bgcolor=\"#FFFFFF\" scope=\"col\">".$n."</th><th height=\"30\" colspan=\"2\" bordercolor=\"#FFFFFF\" bgcolor=\"#FFFFFF\" scope=\"col\">".$ORIG_DATA[$i][ORIG_NM]."</th><th width=\"26%\" height=\"30\" bordercolor=\"#FFFFFF\" bgcolor=\"#FFFFFF\" scope=\"col\"><span class=\"style4\"><input type=\"checkbox\" name=\"checkbox\" value=\"checkbox\"><input type=\"submit\" name=\"Submit\" value=\"刪除\"><input name=\"SEQ_NBR\" type=\"hidden\" value=\"".$ORIG_DATA[$i][SEQ_NBR]."\"><input name=\"PAGE\" type=\"hidden\" value=\"".$PAGE."\"></span></th></form></tr>";
$i++;
$n++;
}

//頁數選擇;
echo $PAGE_NUM;
$PAGE_NUM = ceil($NUM/10);
switch($PAGE_NUM){
    case "0";
	   break;
    case "1";
	   break;
	default;
echo "<tr><th height=\"30\" colspan=\"6\" bordercolor=\"#FFFFFF\" bgcolor=\"#FFFFFF\" scope=\"col\">";
$p=1;
while($p<=$PAGE_NUM){
echo "<a href=\"poetry_orig.php?PAGE=".$p."\"><u>".$p."</u> </a>";
$p++;
}
echo "</th></tr>";
break;
}
?>
    <tr>
      <th height="33" colspan="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><div align="center" class="style4">
          <div align="center">
            <input onClick="location.href='poetry_new_orig.html'" type="button" name="Submit" value="新增出處">
          </div>
      </div></th>
      <th colspan="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col">
      <div align="center"><span class="style4"> 
        <input onClick="javascript:location.reload();" type="button" name="reload" value="重新整理">
        </span> <span class="style4"> </span></div>
    </th>
    </tr>
    <tr>
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#666666" class="style50" scope="col"> <input name="logout" onClick="location.href='Logout.php'"  type="button" id="logout" value="登出回首頁"></th>
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#666666" scope="col"><span class="style4"><span class="style10">
        <input name="logout" onClick="location.href='poetry_system_admin.htm'"  type="button" id="logout" value="回管理頁面">
</span></span>
        <span class="style4"><span class="style10">      </span></span></th>
    </tr>
  </table>
</body>
</html>
