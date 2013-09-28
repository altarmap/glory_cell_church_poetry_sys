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
if ($login_PRVL[PRVL_ID] == 2 || $login_PRVL[PRVL_ID] == 1){
//查詢出處索引;
$orig_index_q="select ORIG_NM from POETRY_ORIG order by ORIG_NM asc";
$orig_index_result= mysql_query($orig_index_q, $MyLink);
$orig_num = mysql_num_rows($orig_index_result);
}
else{
	header('Location:admin_fix_noprvl.htm');
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>歌曲出處更換</title>
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
<form name="form1" method="post" action="poetry_replace_orig.php?PAGE=<? echo $PAGE; ?>">
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="32%" height="131"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
    <tr>
      <th height="30" colspan="2" bgcolor="#666666" class="style3" scope="col"> 歌曲出處更換名稱 </th>
    </tr>
    <tr>
      <th width="48%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">原歌曲出處</span></span></th>
      <th width="52%" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">欲更換出處</span></span></th>
    </tr>
    <tr bgcolor="#FFFFFF">
      <th height="30" bordercolor="#FFFFFF" scope="col"><span class="style4"><? echo $OM; ?>
        <input type="hidden" name="OM" value="<? echo $OM; ?> ">
      </span></th>
      <th height="30" bordercolor="#FFFFFF" scope="col"><span class="style4">
        <select name="SONG_ORIG" id="SONG_ORIG">
          <option value="0">請選擇出處名稱...</option>
<?
$j=0;
while($j<$orig_num){
$orig_nm[$j] = mysql_fetch_array($orig_index_result);
if($orig_nm[$j][ORIG_NM]!=$OM){
echo "<option value=\"".$orig_nm[$j][ORIG_NM]."\">".$orig_nm[$j][ORIG_NM]."</option>";	
}
$j++;
}
?>
        </select>
		</span></th>
    </tr>
    <tr>
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><p align="center"><span class="style4">
      <input onClick="location.href='poetry_orig.php?PAGE=<? echo $PAGE; ?>'" name="Cencle" type="button" id="Cencle" value="取消">　　
      </span><span class="style4">
            </span><span class="style4">
            
            </span>
            <input type="submit" name="Submit" value="確定更換取代">
        </p>
        </th>
      </tr>
  </table>
</div>
</form>
</body>
</html>
