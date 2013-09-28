<?php
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
//判斷排列方式;
if($index==""){
	$index="S";
	}
switch($index){
   case("S");
   $order="order by SEQ_NBR asc";
   break;

   case("N");
   $order="order by SONG_NM asc";
   break;
   case("KE");
   $order="order by SONG_KEY asc,SEQ_NBR asc";
   break;   
   case("K");
   $order="order by SONG_KIND asc,SEQ_NBR asc";
   break;      
   case("O");
   $order="order by SONG_ORIG asc,SEQ_NBR asc";
   break;
   default;
   $order="order by SEQ_NBR asc";
   break;
}
$song_num_q="select SEQ_NBR from POETRY_DATA where SONG_LANG=\"1\"";
$song_num_R=mysql_query($song_num_q, $MyLink);
$song_num=mysql_num_rows($song_num_R);
}
else
{
	header("Location:user_noprvl.htm");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>詩歌總目錄</title>
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
	color: #336666;
}
a:visited {
	text-decoration: none;
	color: #336666;
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
.style11 {color: #FF0000}
.style12 {color: #666666; font-size: 18px; }
-->
</style>
<link rel="stylesheet" href="../glory.css" type="text/css">
</head>
<body background="../bg.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div align="center">
<br>
  <table width="84%" height="162"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
    <tr>
      <th height="30" colspan="5" bgcolor="#666666" class="style3" scope="col"> 詩 　歌 　總 　目　 錄</th>
    </tr>
    <tr>
      <th width="6%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><div align="center"><span class="style10"><a href="poetry_sys_index_c.php?L=<? echo $L; ?>&PAGE=<? if($PAGE==""){ echo "1";}else{ echo $PAGE; } ?>&index=S">編號</a></span></div></th>
      <th width="43%" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style10"><a href="poetry_sys_index_c.php?L=<? echo $L; ?>&PAGE=<? if($PAGE==""){ echo "1";}else{ echo $PAGE; } ?>&index=N">名　　　稱</a></span></th>
      <th width="6%" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style10"><a href="poetry_sys_index_c.php?L=<? echo $L; ?>&PAGE=<? if($PAGE==""){ echo "1";}else{ echo $PAGE; } ?>&index=KE">音調</a></span></th>
      <th width="17%" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10"><a href="poetry_sys_index_c.php?L=<? echo $L; ?>&PAGE=<? if($PAGE==""){ echo "1";}else{ echo $PAGE; } ?>&index=K">類　別</a></span></span></th>
      <th width="28%" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10"><a href="poetry_sys_index_c.php?L=<? echo $L; ?>&PAGE=<? if($PAGE==""){ echo "1";}else{ echo $PAGE; } ?>&index=O">出　處</a></span></span></th>
    </tr>
    <? 
if($song_num==0){
	echo "<tr bgcolor=\"#FFFFFF\"><th height=\"30\" colspan=\"5\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style4\"><span class=\"style12\"><span class=\"style10\">查無任何詩歌！</span></span> </span></th></tr>";
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
   $song_data_query = "select * from POETRY_DATA where SONG_LANG=\"1\" ".$order." limit $PAGE,10";
   $song_data_result = mysql_query($song_data_query, $MyLink);
   $NUM = mysql_num_rows($song_data_result);
//資料列印;
   $i=0;
   $n=1;
   while($i<$NUM){
$song_data[$i] = mysql_fetch_array($song_data_result);  
 switch($song_data[$i][SONG_KEY]){
case"0";
  $KEY="音調未輸入";
break;
case"1";
  $KEY="C";
break;
case"2";
  $KEY="D";
break;
case"3";
  $KEY="E";
break;
case"4";
  $KEY="F";
break;
case"5";
  $KEY="G";
break;
case"6";
  $KEY="A";
break;
case"7";
  $KEY="B";
break;
case"8";
  $KEY="bD";
break;
case"9";
  $KEY="bE";
break;
case"10";
  $KEY="bG";
break;
case"11";
  $KEY="bA";
break;
case"12";
  $KEY="bB";
break;
} 	
if($song_data[$i][SONG_KIND]=="0"){
$SONG_KIND="";
}
else{
$SONG_KIND=$song_data[$i][SONG_KIND];
}
if($song_data[$i][SONG_ORIG]=="0"){
$SONG_ORIG="";
}
else{
$SONG_ORIG=$song_data[$i][SONG_ORIG];
}
if($PAGE==0){
   $PA="1";
   }
   else{
   $PA=$PAGE/10;
   $PA=$PA+1;
   }
echo "<tr bgcolor=\"#FFFFFF\"><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style4\"><span class=\"style12\"><span class=\"style10\">".sprintf("%05d",$song_data[$i][SEQ_NBR])."</span></span></span></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style4\"><span class=\"style12\"><span class=\"style10\"><a href=\"poetry_sys_find_sear.php?L=".$L."&S=10&La=1&PAGE=".$PA."&index=".$index."&WORD_FIND=".$song_data[$i][SEQ_NBR]."\">".$song_data[$i][SONG_NM]."</a></span></span></span></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style12\"><span class=\"style10\">".$KEY."</span></span></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style12\"><span class=\"style10\">".$SONG_KIND."</span></span></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><span class=\"style12\"><span class=\"style10\">".$SONG_ORIG."</span></span></th></tr>";
$i++;
$n++;
}
//頁數選擇;
$PAGE_NUM = ceil($song_num/10);
switch($PAGE_NUM){
    case "0";
	   break;
    case "1";
	   break;
	   default;
echo "<tr><th height=\"30\" colspan=\"6\" bordercolor=\"#FFFFFF\" bgcolor=\"#FFFFFF\" scope=\"col\">";
$p=1;
while($p<=$PAGE_NUM){
echo "<a href=\"poetry_sys_index_c.php?L=".$L."&index=".$index."&PAGE=".$p."\"><u>".$p."</u> </a>";
$p++;
}
echo "</th></tr>";
break;
}
}


?>
    <tr>
      <form name="form1" method="post" action="">
        <th height="30" colspan="5" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"> <span class="style4">
          <input onClick="location.href='poetry_sys_index.php?L=<? echo $L; ?>'" name="Cancle" type="button" id="Cancle" value="取消">
        </span></th>
      </form>
    </tr>
  </table>
</div>
</body>
</html>
