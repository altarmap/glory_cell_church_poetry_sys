<?
//引入no-cache.php
include("/no-cache.php");
//引入資料庫連結程式，並回傳狀態
include("link.php");
//查出修改者;
   $login_query = "select * from ADMIN_COOKIE where COOKIE_VAL='$COOKIE_VAL'";
   $login_result = mysql_query($login_query, $MyLink);
   $login_ID = mysql_fetch_array($login_result);
   $PRVL_query = "select * from ADMIN_DATA where ADMIN_NM='$login_ID[ADMIN_ID]'";
   $PRVL_result = mysql_query($PRVL_query, $MyLink);
   $login_PRVL = mysql_fetch_array($PRVL_result);
//判斷是否登出或網頁過期
include("check_logout.php");
//依據權限給予使用
if ($login_PRVL[PRVL_ID] != 2){
    if($login_PRVL[PRVL_ID] == 1){
	$num_query = "select SEQ_NBR from ADMIN_DATA where ADMIN_NM=\"".$login_PRVL[ADMIN_NM]."\"";
	}
	else{
	 	header('Location:admin_fix_noprvl.htm');
	}
  	}
	else{
	$num_query = "select SEQ_NBR from ADMIN_DATA";
	} 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>管理者帳號</title>
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
.style13 {color: #666666; font-size: 16px; }
-->
</style></head>

<body>
<div align="center">
  <p>&nbsp;</p>
  <table width="76%" height="131"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
    <tr>
      <th height="30" colspan="6" bgcolor="#666666" class="style3" scope="col"> 管　理　者　帳　號</th>
    </tr>
    <tr>
      <th width="9%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">NO.</span></span><span class="style4"></span></th>
      <th width="22%" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">管理者姓名</span></span><span class="style4"></span></th>
      <th width="23%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">管理者權限</span></span></th>
      <th width="25%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">修改密碼</span></span></th>
      <th width="11%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">刪除</span></span></th>
      <th width="11%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">修改</span></span></th>
    </tr>
    
<?
//資料數判斷;
   $ADMIN_DATA_result = mysql_query($num_query, $MyLink);
   $NUM = mysql_num_rows($ADMIN_DATA_result);
//頁數判斷;
   if($NUM == 0){
   echo "<tr bgcolor=\"#FFFFFF\"><th height=\"30\" colspan=\"6\" bordercolor=\"#FFFFFF\" scope=\"col\">查無資料！</th></tr>";
   }
   else{
   $PAGE_NUM = ceil($NUM/10);
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
   if ($login_PRVL[PRVL_ID]==1){
   $data_query = "select * from ADMIN_DATA where ADMIN_NM=\"".$login_PRVL[ADMIN_NM]."\"";
   }
   else{
   $data_query_2 = "select * from ADMIN_DATA where PRVL_ID=\"2\"order by SEQ_NBR asc limit $PAGE,10 ";
   }
   
   $ADMIN_DATA_result = mysql_query($data_query, $MyLink);
   $NUM = mysql_num_rows($ADMIN_DATA_result);
   $i=0;
   while($i<$NUM){
   $ADMIN_DATA[$i] = mysql_fetch_array($ADMIN_DATA_result);
   $n= $i+1;

//判斷管理者權限選取值;
 $PRVL_SEL0="";
 $PRVL_SEL1="";
 $PRVL_SEL2="";
switch($ADMIN_DATA[$i][PRVL_ID])
{
  case "0";
   $PRVL_SEL0="selected";
   break;
  case "1";
   $PRVL_SEL1="selected";
   break;
  default;
   $PRVL_SEL2="selected";
   }
//資料列印;
if($PAGE==0){
   $PA="1";
   }
   else{
   $PA=$PAGE/10;
   $PA=$PA+1;
   }
if($login_PRVL[PRVL_ID]==1){
//   echo "<tr bgcolor=#FFFFFF><form name=\"form1\" method=\"post\" action=\"admin_fix_action.php\"><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style4\"><span class=\"style10\">".$n."</span></span><span class=\"style4\"></span></th><th bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style4\"><span class=\"style10\">".$ADMIN_DATA[$i][ADMIN_NM]."</span></span><span class=\"style4\"></span></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style4\"><select name=\"ADMIN_PRVL\" id=\"ADMIN_PRVL\"><option value=\"0\"".$PRVL_SEL0.">請選擇權限...</option><option value=\"1\"".$PRVL_SEL1.">一般權限管理者</option><option value=\"2\"".$PRVL_SEL2.">最高權限管理者</option></select></span></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style4\"><input name=\"ADMIN_PASS\" type=\"text\" id=\"ADMIN_PASS\" size=\"15\" maxlength=\"128\" ></span></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style4\"><input type=\"checkbox\" name=\"del_check\//" value=\"checkbox\"></span></th><th width=\"10%\" bordercolor=\"#FFFFFF\" bgcolor=\"#FFFFFF\" scope=\"col\"><input type=\"submit\" name=\"Submit\" value=\"確定\"><input name=\"UPDATE_NM\" type=\"hidden\" id=\"UPDATE_NM\" value =\"".$ADMIN_DATA[$i][ADMIN_NM]."\"><input name=\"PA\" type=\"hidden\" id=\"PA\" value =\"".$PA."\"></th></form></tr>";
echo "<tr bgcolor=#FFFFFF><form name=\"form1\" method=\"post\" action=\"admin_fix_action.php\"><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style4\"><span class=\"style10\">".$n."</span></span><span class=\"style4\"></span></th><th bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style4\"><span class=\"style10\">".$ADMIN_DATA[$i][ADMIN_NM]."</span></span><span class=\"style4\"></span></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style4\">一般使用者</span></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style4\"><input name=\"ADMIN_PASS\" type=\"text\" id=\"ADMIN_PASS\" size=\"15\" maxlength=\"128\" ></span></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style4\"></span></th><th width=\"10%\" bordercolor=\"#FFFFFF\" bgcolor=\"#FFFFFF\" scope=\"col\"><input type=\"submit\" name=\"Submit\" value=\"確定\"><input name=\"UPDATE_NM\" type=\"hidden\" id=\"UPDATE_NM\" value =\"".$ADMIN_DATA[$i][ADMIN_NM]."\"><input name=\"PA\" type=\"hidden\" id=\"PA\" value =\"".$PA."\"><input name=\"ADMIN_PRVL\" type=\"hidden\" id=\"ADMIN_PRVL\" value =\"".$ADMIN_DATA[$i][PRVL_ID]."\"></th></form></tr>";
   }
if($login_PRVL[PRVL_ID]==2 and $ADMIN_DATA[$i][ADMIN_NM] == $login_PRVL[ADMIN_NM]){
echo "<tr bgcolor=#FFFFFF><form name=\"form1\" method=\"post\" action=\"admin_fix_action.php\"><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style4\"><span class=\"style10\">".$n."</span></span><span class=\"style4\"></span></th><th bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style4\"><span class=\"style10\">".$ADMIN_DATA[$i][ADMIN_NM]."</span></span><span class=\"style4\"></span></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style4\"><select name=\"ADMIN_PRVL\" id=\"ADMIN_PRVL\"><option value=\"0\"".$PRVL_SEL0.">請選擇權限...</option><option value=\"1\"".$PRVL_SEL1.">一般權限管理者</option><option value=\"2\"".$PRVL_SEL2.">最高權限管理者</option></select></span></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style4\"><input name=\"ADMIN_PASS\" type=\"text\" id=\"ADMIN_PASS\" size=\"15\" maxlength=\"128\" ></span></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style4\"><input type=\"checkbox\" name=\"del_check\" value=\"checkbox\"></span></th><th width=\"10%\" bordercolor=\"#FFFFFF\" bgcolor=\"#FFFFFF\" scope=\"col\"><input type=\"submit\" name=\"Submit\" value=\"確定\"><input name=\"UPDATE_NM\" type=\"hidden\" id=\"UPDATE_NM\" value =\"".$ADMIN_DATA[$i][ADMIN_NM]."\"><input name=\"PA\" type=\"hidden\" id=\"PA\" value =\"".$PA."\"></th></form></tr>";
   }
   else{
   if($login_PRVL[PRVL_ID]==2 and $ADMIN_DATA[$i][PRVL_ID]==2){
echo "<tr bgcolor=#FFFFFF><form name=\"form1\" method=\"post\" action=\"admin_fix_action.php\"><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style4\"><span class=\"style10\">".$n."</span></span><span class=\"style4\"></span></th><th bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style4\"><span class=\"style10\">".$ADMIN_DATA[$i][ADMIN_NM]."</span></span><span class=\"style4\"></span></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style4\"><select name=\"ADMIN_PRVL\" id=\"ADMIN_PRVL\"><option value=\"0\"".$PRVL_SEL0.">請選擇權限...</option><option value=\"1\"".$PRVL_SEL1.">一般權限管理者</option><option value=\"2\"".$PRVL_SEL2.">最高權限管理者</option></select></span></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style4\"><input name=\"ADMIN_PASS\" type=\"text\" id=\"ADMIN_PASS\" size=\"15\" maxlength=\"128\" ></span></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style4\"><input type=\"checkbox\" name=\"del_check\" value=\"checkbox\"></span></th><th width=\"10%\" bordercolor=\"#FFFFFF\" bgcolor=\"#FFFFFF\" scope=\"col\"><input name=\"UPDATE_NM\" type=\"hidden\" id=\"UPDATE_NM\" value =\"".$ADMIN_DATA[$i][ADMIN_NM]."\"><input name=\"PA\" type=\"hidden\" id=\"PA\" value =\"".$PA."\"></th></form></tr>";
   }
   }
 
   $i++;
}
$i=0;
echo $i."<br>";
echo $login_PRVL[PRVL_ID]."<br>";
echo $ADMIN_DATA[$i][PRVL_ID]."<br>";
echo $ADMIN_DATA[$i][ADMIN_NM]."<br>";
echo $PAGE_NUM."<br>";
echo $NUM;





//頁數選擇;
switch($PAGE_NUM){
    case "0";
	   break;
    case "1";
	   break;
	default;
echo "<tr><th height=\"30\" colspan=\"6\" bordercolor=\"#FFFFFF\" bgcolor=\"#E1E1E1\" scope=\"col\">";
$p=1;
while($p<=$PAGE_NUM){
echo "<a href=\"admin_fix_usernm.php?PAGE=".$p."\"><u>".$p."</u> </a>";
$p++;
}
echo "</th></tr>";
break;
}
}
?>
      <tr>
      <th height="30" colspan="3" bordercolor="#FFFFFF" bgcolor="#666666" scope="col"><p align="center">
        <input onClick="location.href='admin_fix_usernm.php?PAGE=<?	 if($PAGE!=0){ $PAGE=$PAGE/10; $PAGE=$PAGE+1; } else{$PAGE=1;} echo $PAGE; ?>'" type="submit" name="Submit" value="重新整理">    
        <span class="style4"> </span><span class="style4"> </span><span class="style4"> </span> </p></th>
      <th height="30" colspan="3" bordercolor="#FFFFFF" bgcolor="#666666" scope="col"><span class="style4">
        <input onClick="location.href='admin_usernm.htm'" name="Cancle" type="button" id="Cancle" value="取消">
</span></th>
      </tr>
  </table>
</div>
</body>
</html>