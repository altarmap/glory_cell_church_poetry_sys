<?
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
if ($login_PRVL[PRVL_ID]== 1 ||$login_PRVL[PRVL_ID]==2){
	$fix_data_query = "select * from POETRY_DATA where SEQ_NBR=\"".$SN."\"";
	$fix_data_result = mysql_query($fix_data_query, $MyLink);
	$fix_data= mysql_fetch_array($fix_data_result);
//查詢修改者類別;
if($fix_data[SONG_KIND]==0){
		  $KIND="selected";
		  }else{
		  $KIND="";
		  }
//查詢修改者出處;
if($fix_data[SONG_ORIG]==0){
		  $KINDO="selected";
		  }else{
		  $KINDO="";
		  }		  
//查詢類別索引;
$kind_index_q="select KIND_NM from POETRY_KIND order by KIND_NM asc";
$kind_index_result= mysql_query($kind_index_q, $MyLink);
$kind_num = mysql_num_rows($kind_index_result);
//查詢出處索引;
$orig_index_q="select ORIG_NM from POETRY_ORIG order by ORIG_NM asc";
$orig_index_result= mysql_query($orig_index_q, $MyLink);
$orig_num = mysql_num_rows($orig_index_result);
//音調判別;
 $KEY0="";
 $KEY1="";
 $KEY2="";
 $KEY3="";
 $KEY4="";
 $KEY5="";
 $KEY6="";
 $KEY7="";
 $KEY8="";
 $KEY9="";
 $KEY10="";
 $KEY11="";
 $KEY12="";
 switch($fix_data[SONG_KEY]){
case"0";
  $KEY0="selected";
break;
case"1";
  $KEY1="selected";
break;
case"2";
  $KEY2="selected";
break;
case"3";
  $KEY3="selected";
break;
case"4";
  $KEY4="selected";
break;
case"5";
  $KEY5="selected";
break;
case"6";
  $KEY6="selected";
break;
case"7";
  $KEY7="selected";
break;
case"8";
  $KEY8="selected";
break;
case"9";
  $KEY9="selected";
break;
case"10";
  $KEY10="selected";
break;
case"11";
  $KEY11="selected";
break;
case"12";
  $KEY12="selected";
break;
}

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
<title>修改歌曲</title>
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
.style11 {color: #666666; font-size: 18px; }
-->
</style>
<link href="1.css" rel="stylesheet" type="text/css">
</head>

<body>
<form action="poetry_fix_action.php" method="post" enctype="multipart/form-data" name="form1"><div align="center">
  <p>&nbsp;</p>
    <p>     
    </p>
  <table width="49%" height="313"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
    <tr>
        <th height="30" colspan="5" bgcolor="#666666" class="style3" scope="col">敬拜詩歌 
          管理系統 修改歌曲 </th>
    </tr>
    <tr class="unnamed1">
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><div align="center" class="style11"><a href="Poetry_New_Lang.htm">名稱</a> 
            <input name="SONG_NM" type="text" value="<? echo $fix_data[SONG_NM]; ?>" size="23" maxlength="254">
          </div></th>
      <th colspan="3" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><div align="left"><span class="style11">　　編號：<? echo sprintf("%05d",$fix_data[SEQ_NBR]);?>
        <input name="SN" type="hidden" id="SN" value="<? echo $SN; ?>">
      </span></div></th>
    </tr>
    <tr class="unnamed1">
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">出處
            <select name="SONG_ORIG" id="SONG_ORIG">
              <option value="0" <? echo $KINDO; ?>>請選取歌曲出處..</option>
              <?
$f=0;
while($f<$orig_num){
$orig_nm[$f] = mysql_fetch_array($orig_index_result);
if($orig_nm[$f][ORIG_NM]==$fix_data[SONG_ORIG]){
echo "<option value=\"".$orig_nm[$f][ORIG_NM]."\" selected>".$orig_nm[$f][ORIG_NM]."</option>";
}
else{
echo "<option value=\"".$orig_nm[$f][ORIG_NM]."\">".$orig_nm[$f][ORIG_NM]."</option>";
}
$f++;
} 
?>
            </select>              
      </span></span></th>
      <th height="30" colspan="3" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col">類別
        <select name="SONG_KIND" id="SONG_KIND">
          <option value="0" <? echo $KIND; ?>>請選取歌曲類別..</option>
<?
$j=0;
while($j<$kind_num){
$kind_nm[$j] = mysql_fetch_array($kind_index_result);
if($kind_nm[$j][KIND_NM]==$fix_data[SONG_KIND]){
echo "<option value=\"".$kind_nm[$j][KIND_NM]."\" selected>".$kind_nm[$j][KIND_NM]."</option>";
}
else{
echo "<option value=\"".$kind_nm[$j][KIND_NM]."\">".$kind_nm[$j][KIND_NM]."</option>";
}
$j++;
} 
?>
    </select></th>
    </tr>
    <tr class="unnamed1">
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10">調性
              <select name="SONG_KEY" id="SONG_KEY">
                <option value="0" <? echo $KEY0; ?>>請選擇歌曲調性...</option>
                <option value="1" <? echo $KEY1; ?>>C</option>
                <option value="2" <? echo $KEY2; ?>>D</option>
                <option value="3" <? echo $KEY3; ?>>E</option>
                <option value="4" <? echo $KEY4; ?>>F</option>
                <option value="5" <? echo $KEY5; ?>>G</option>
                <option value="6" <? echo $KEY6; ?>>A</option>
                <option value="7" <? echo $KEY7; ?>>B</option>
                <option value="8" <? echo $KEY8; ?>>bD</option>
                <option value="9" <? echo $KEY9; ?>>bE</option>
                <option value="10" <? echo $KEY10; ?>>bG</option>
                <option value="11" <? echo $KEY11; ?>>bA</option>
                <option value="12" <? echo $KEY12; ?>>bB</option>
              </select>
      </span></span></th>
      <th height="30" colspan="3" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style11">簡譜
            <input name="SONG_MUSIC" type="text" id="SONG_MUSIC" size="16" maxlength="254" value="<? echo trim($fix_data[SONG_MUSIC]); ?>">
      </span></th>
    </tr>
    <tr valign="top" class="unnamed1">
      <th height="119" colspan="5" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><div align="center" class="style4">歌詞<span class="style10">
          <textarea name="SONG_CHAR" cols="45" rows="10" wrap="VIRTUAL" id="SONG_CHAR"><? echo trim($fix_data[SONG_CHAR]); ?></textarea>
      </span></div></th>
    </tr>
    <tr class="unnamed1">
      <th height="30" colspan="5" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><input name="re" type="reset" id="re" value="重新整理"></th>
    </tr>
    <tr class="unnamed1">
      <th width="27%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style10"><a href="Logout.php">登出回苜頁</a></span></span></th>
      <th height="30" colspan="2" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><a href="poetry_system_admin.htm">回管理頁面</a></th>
      <th width="13%" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><input name="Fix" type="submit" id="Fix" value="修改"></th>
      <th width="13%" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><input onClick="location.href='poetry_enter_fix.html'" name="Cencle" type="button" id="Cencle" value="取消"></th>
    </tr>
  
  </table>
</div>
</form>
</body>
</html>
