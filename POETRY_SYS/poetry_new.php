<?
//引入no-cache.php
include("./no-cache.php");
//引入資料庫連結程式，並回傳狀態
include("link.php");
//查出新增者;
   $login_query = "select * from ADMIN_COOKIE where COOKIE_VAL=\"".$COOKIE_VAL."\"";
   $login_result = mysql_query($login_query, $MyLink);
   $login_ID_num = mysql_num_rows($login_result);
   $login_ID = mysql_fetch_array($login_result);
   $PRVL_query = "select * from ADMIN_DATA where SEQ_NBR=".$login_ID[ADMIN_ID];
   $PRVL_result = mysql_query($PRVL_query, $MyLink);
   $login_PRVL = mysql_fetch_array($PRVL_result);
//判斷是否登出或網頁過期
include("check_logout.php");
//依據權限給予使用;
if ($login_PRVL[PRVL_ID]== 1 || $login_PRVL[PRVL_ID]==2){
$LASTUSE_TIME=date("H:i:s");
$Cookie_update="update ADMIN_COOKIE set LASTUSE_TIME=\"".$LASTUSE_TIME."\" where COOKIE_VAL=\"".$COOKIE_VAL."\"";
if(!mysql_query($Cookie_update, $MyLink)){
             echo "資料無法存入\"COOKIE_TABLE\"";
             echo mysql_error();
        	}else{
//查出最近歌曲編號;
$num_last_data=	"select SEQ_NBR from POETRY_DATA order by SEQ_NBR desc";
$num_last_data_result = mysql_query($num_last_data, $MyLink);
$num_last_data_r= mysql_fetch_array($num_last_data_result);
$NUM=$num_last_data_r[SEQ_NBR]+1;
$NUM_D= sprintf ("%05d",$NUM);
//查詢類別索引;
$kind_index_q="select KIND_NM from POETRY_KIND order by KIND_NM asc";
$kind_index_result= mysql_query($kind_index_q, $MyLink);
$kind_num = mysql_num_rows($kind_index_result);
//查詢出處索引;
$orig_index_q="select ORIG_NM from POETRY_ORIG order by ORIG_NM asc";
$orig_index_result= mysql_query($orig_index_q, $MyLink);
$orig_num = mysql_num_rows($orig_index_result);
}	
}else{
	 	header('Location:admin_fix_noprvl.htm');
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>新增歌曲</title>
<style type="text/css">
<!--
body {
	background-color: #000000;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
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
-->
</style>
<link href="1.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="../glory.css" type="text/css">
</head>

<body background="../bg.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<form action="poetry_new_insert.php" method="post" enctype="multipart/form-data" name="form1"><div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="53%" height="282"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
    <tr>
      <th height="30" colspan="5" bgcolor="#666666" class="style3" scope="col">敬拜詩歌 管理系統 新增歌曲 </th>
    </tr>
    <tr class="unnamed1">
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><div align="center" class="style11"><a href="Poetry_New_Lang.htm">名稱</a>
              <input name="SONG_NM" type="text" id="SONG_NM" size="16" maxlength="128">
            <input name="SL" type="hidden" value=<? echo $SL; ?> >
          </div>
        </th>
      <th colspan="3" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><div align="center"><span class="style11">編號
            <? echo $NUM_D; ?>
</span></div></th>
    </tr>
    <tr class="unnamed1">
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">出處
              <select name="SONG_ORIG" id="SONG_ORIG">
		<option value="0">請選擇歌曲出處...</option>
          <?
		  $f=0;
		  while($f<$orig_num){
		  $orig_nm[$f]=mysql_fetch_array($orig_index_result);
		  echo "<option value=\"".$orig_nm[$f][ORIG_NM]."\">".$orig_nm[$f][ORIG_NM]."</option>";
		  $f++; 		  
		  } 
		  ?>
      </select>
      </span></span></th>
      <th height="30" colspan="3" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style11">類別<span class="style4"><span class="style10">
        <select name="SONG_KIND" id="SONG_KIND">
		<option value="0">請選擇歌曲類別...</option>
          <?
		  $x=0;
		  while($x<$kind_num){
		  $kind_nm[$x]=mysql_fetch_array($kind_index_result);
		  echo "<option value=\"".$kind_nm[$x][KIND_NM]."\">".$kind_nm[$x][KIND_NM]."</option>";
		  $x++; 		  
		  } 
		  ?>
      </select>
      </span></span></span></th>
    </tr>
    <tr class="unnamed1">
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">調性
              <select name="SONG_KEY" id="SONG_KEY">
            <option value="0" selected>請選擇歌曲調性...</option>
            <option value="1">C</option>
            <option value="2">D</option>
            <option value="3">E</option>
            <option value="4">F</option>
            <option value="5">G</option>
            <option value="6">A</option>
            <option value="7">B</option>
            <option value="8">bD</option>
            <option value="9">bE</option>
            <option value="10">bG</option>
            <option value="11">bA</option>
            <option value="12">bB</option>
          </select>
      </span></span></th>
      <th height="30" colspan="3" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style11">簡譜
            <input name="SONG_MUSIC" type="text" id="SONG_MUSIC" size="16" maxlength="254">
      </span></th>
    </tr>
    <tr valign="top" class="unnamed1">
      <th height="119" colspan="5" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><div align="center" class="style4">歌詞<span class="style10">
          <textarea name="SONG_CHAR" cols="45" rows="10" wrap="VIRTUAL" id="SONG_CHAR"></textarea>
      </span></div></th>
    </tr>
    <tr class="unnamed1">
      <th width="32%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10"><a href="Logout.php">登出回苜頁</a></span></span></th>
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><a href="poetry_system_admin.htm">回管理頁面</a></span></th>
      <th width="13%" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><input name="Create" type="submit" id="Create" value="新增"></th>
      <th width="13%" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><input onClick="location.href='poetry_system_admin.htm'" name="Cencle" type="button" id="Cencle" value="取消"></th>
    </tr>
  </table>
  </div>
</form>
</body>
</html>
