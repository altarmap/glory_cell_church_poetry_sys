<?php
//引入no-cache.php
include("no-cache.php");
//引入資料庫連結程式，並回傳狀態
include("link.php");
$WORD_FIND=empty($WORD_FIND)?@$_POST['WORD_FIND']:$WORD_FIND;
$L=empty($L)?@@$_GET['L']:$L;
$S=empty($S)?@@$_GET['S']:$S;
//查出登入者;
   $login_query = "select * from USER_COOKIE where COOKIE_VAL=\"".$USER_COOKIE_VAL."\"";
   $login_result = mysql_query($login_query, $MyLink);
   $login_ID = mysql_fetch_array($login_result);
   $login_ID_NUM = mysql_num_rows($login_result);
//判斷是否登出或網頁過期;

include("check_user_logout.php");
//依據權限給予使用
if ($login_ID_NUM == 1){
//判斷查詢形式;
        switch($S){
	case"1";
	$SER_KIND="poetry_sys_word_find.php?L=".$L;
	if ($WORD_FIND==""){
		header("Location:sear_poetry_erro2.php?L=".$L."&S=".$S);
		}
	$song_query = "select * from POETRY_DATA where SONG_NM like \"".$WORD_FIND."%\" order by SONG_NM desc";
	break;
	case"2";
	$SER_KIND="poetry_sys_name_find.php?L=".$L;
	if ($WORD_FIND==""){
		header("Location:sear_poetry_erro2.php?L=".$L."&S=".$S);
		}
	$song_query = "select * from POETRY_DATA where SONG_NM like \"%".$WORD_FIND."%\" order by SONG_NM desc";
	break;
	case"3";
	$SER_KIND="poetry_sys_nmb_find.php?L=".$L;
	if ($WORD_FIND==""){
		header("Location:sear_poetry_erro2.php?L=".$L."&S=".$S);
		exit();
	}
	else{
	$WORD_FIND=sprintf("%d",$WORD_FIND);
	$song_query = "select * from POETRY_DATA where SEQ_NBR =".$WORD_FIND;
	break;
	}
	case"4";
	$SER_KIND="poetry_sys_char_find.php?L=".$L;
	if ($WORD_FIND==""){
		header("Location:sear_poetry_erro2.php?L=".$L."&S=".$S);
		exit();
	}
	$song_query = "select * from POETRY_DATA where SONG_CHAR like \"%".$WORD_FIND."%\" order by SONG_NM desc";	
	break;
	case"5";
	$SER_KIND="poetry_sys_key_find.php?L=".$L;
	if ($WORD_FIND=="0"){
		header("Location:sear_poetry_erro2.php?L=".$L."&S=".$S);
		exit();
		}
	$song_query = "select * from POETRY_DATA where SONG_KEY=\"".$WORD_FIND."\" order by SONG_NM desc";
	break;
	case"6";
	$SER_KIND="poetry_sys_kind_find.php?L=".$L;
	if ($WORD_FIND=="0"){
		header("Location:sear_poetry_erro2.php?L=".$L."&S=".$S);
		exit();
		}
	$song_query = "select * from POETRY_DATA where SONG_KIND=\"".$WORD_FIND."\" order by SONG_NM desc";
	break;
	case"7";
	$SER_KIND="poetry_sys_orig_find.php?L=".$L;
	if ($WORD_FIND=="0"){
		header("Location:sear_poetry_erro2.php?L=".$L."&S=".$S);
		exit();
		}
	$song_query = "select * from POETRY_DATA where SONG_ORIG=\"".$WORD_FIND."\" order by SONG_NM desc";
	break;
	case"8";
	$SER_KIND="poetry_sys_song_find.php?L=".$L;
	if ($WORD_FIND==""){
		header("Location:sear_poetry_erro2.php?L=".$L."&S=".$S);
		exit();
		}
	$song_query = "select * from POETRY_DATA where SONG_MUSIC like \"%".$WORD_FIND."%\" order by SONG_NM desc";
	break;
	case"9";
	$SER_KIND="poetry_sys_muti_find.php?L=".$L;
	if ($WORD_FIND=="" and $SONG_KEY=="0" and $SONG_KIND=="0" and $SONG_ORIG=="0"){
		header("Location:sear_poetry_erro2.php?L=".$L."&S=".$S);
		exit();
	}
	else{
	if($SONG_KEY!="0"){
		$key=0;
	}
	else{
	$key=1;
	} 
        if($SONG_KIND!="0"){
        	$kind=0;
        }
        else{
        $kind=1;
        }
        if($SONG_ORIG!="0"){
        	$orig=0;
        }
        else{
        $orig=1;
        }
	 if($SONG_KEY=="0" and $SONG_KIND=="0" and $SONG_ORIG=="0"){
		$song_query = "select * from POETRY_DATA where SONG_NM like \"".$WORD_FIND."%\" order by SONG_NM desc";
		}
		else{
		if($key=="0" and $SONG_KIND=="0" and $SONG_ORIG=="0" and $WORD_FIND!=""){
		$song_query = "select * from POETRY_DATA where SONG_NM like \"".$WORD_FIND."%\" and SONG_KEY=\"".$SONG_KEY."\" order by SONG_NM desc";	
			}else{
		if($SONG_ORIG=="0" and $key==0 and $kind==0 and $WORD_FIND!=""){
		$song_query = "select * from POETRY_DATA where SONG_NM like \"".$WORD_FIND."%\" and SONG_KEY=\"".$SONG_KEY."\" and SONG_KIND=\"".$SONG_KIND."\" order by SONG_NM desc";	
		}
		else{
		if($key==0 and $kind==0 and $orig==0 and $WORD_FIND!=""){
		$song_query = "select * from POETRY_DATA where SONG_NM like \"".$WORD_FIND."%\" and SONG_KEY=\"".$SONG_KEY."\" and SONG_KIND=\"".$SONG_KIND."\" order by SONG_NM desc";		
			}
                	}						
		}
	}
	
	if($key==0 and $SONG_KIND=="0" and $SONG_ORIG=="0" and $WORD_FIND==""){
        $song_query = "select * from POETRY_DATA where SONG_KEY =\"".$SONG_KEY."\" order by SONG_NM desc";			
	}
	else{
	if($key==0 and $kind==0 and $SONG_ORIG=="0" and $WORD_FIND==""){
        $song_query = "select * from POETRY_DATA where SONG_KEY =\"".$SONG_KEY."\" SONG_KIND =\"".$SONG_KIND."\" order by SONG_NM desc";			
		}else{
	if($key==0 and $kind==0 and $orig==0 and $WORD_FIND==""){
	}
	}
	}
	
	if($key==1 and $kind==0 and $orig==1 and $WORD_FIND==""){
	$song_query = "select * from POETRY_DATA where SONG_KIND =\"".$SONG_KIND."\" order by SONG_NM desc";
		}else{
	if($key==1 and $kind==0 and $orig==1 and $WORD_FIND!=""){
	$song_query = "select * from POETRY_DATA where SONG_NM like \"".$WORD_FIND."%\" and SONG_KIND=\"".$SONG_KIND."\" order by SONG_NM desc";	
	}
	else{
	if($key==1 and $kind==0 and $orig==0 and $WORD_FIND==""){
	$song_query = "select * from POETRY_DATA where SONG_KIND=\"".$SONG_KIND."\" and SONG_ORIG=\"".$SONG_ORIG."\" order by SONG_NM desc";	
	}
	}
		
	}	
	if($key==1 and $kind==1 and $orig==0 and $WORD_FIND==""){
	$song_query = "select * from POETRY_DATA where SONG_ORIG=\"".$SONG_ORIG."\" order by SONG_NM desc";		
		}else{
	if($key==1 and $kind==1 and $orig==0 and $WORD_FIND!=""){
	$song_query = "select * from POETRY_DATA where SONG_NM like \"".$WORD_FIND."%\" and SONG_ORIG=\"".$SONG_ORIG."\" order by SONG_NM desc";			
		}else{
	if($key==0 and $kind==1 and $orig==0 and $WORD_FIND==""){
	$song_query = "select * from POETRY_DATA where SONG_KEY=\"".$SONG_KEY."\" and SONG_ORIG=\"".$SONG_ORIG."\" order by SONG_NM desc";				
		}
		}
		}
		}
        break;
        case"10";
	$SER_KIND="poetry_sys_index_c.php?L=".$L;
	$WORD_FIND=sprintf("%d",$WORD_FIND);
	$song_query = "select * from POETRY_DATA where SEQ_NBR =".$WORD_FIND;
	break;
         }
        $song_result= mysql_query($song_query, $MyLink);
	$song_num = mysql_num_rows($song_result);
	$S=chop($S);
	if($song_num==0){
    	header("Location:searc_poetry_nofind.php?L=".$L."&S=".$S);
    	}
else{
	if($song_num==1){
    	$poetry_data=mysql_fetch_array($song_result);
    	header("Location:poetry_sys_find_result.php?L=".$L."&S=".$S."&La=".$La."&index=".$index."&PAGE=".$PAGE."&N=".$poetry_data[SEQ_NBR]);	
    	}
}
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
<title>詩歌查詢</title>
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
<style type="text/css">
<!--
.style12 {color: #FFFFFF}
.style13 {font-size: 16px}
.style14 {color: #FF0000}
.style17 {font-size: 16}
.style18 {color: #3366FF; font-size: 16; }
-->
</style>
<link rel="stylesheet" href="../glory.css" type="text/css">
</head>
<body background="../bg.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<form action="poetry_new_insert.php" method="post" enctype="multipart/form-data" name="form1">
<div align="center">
    <p>&nbsp;</p>
  <table width="76%" height="165"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
    <tr>
      <th height="30" colspan="6" bgcolor="#666666" class="style3" scope="col"> 詩歌查詢</th>
    </tr>
    <tr bgcolor="#FFFFFF" class="unnamed1">
      <th height="30" colspan="6" bordercolor="#FFFFFF" scope="col"><div align="center" class="style11 style13">您輸入的資料查詢到有<span class="style14"> <? echo $song_num; ?> </span>筆，請選擇想查詢的歌曲名稱！</div></th>
    </tr>
    <tr>
      <th width="8%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style11">NO.</span></span><span class="style4"></span></th>
      <th width="30%" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style11">名 稱</span></span><span class="style4"></span></th>
      <th width="11%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style11">編 號</span></span></th>
      <th width="17%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style11">出 處</span></span></th>
      <th width="24%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style11">類別</span></span></th>
      <th width="10%" height="30" bordercolor="#FFFFFF" bgcolor="#E1E1E1" scope="col"><span class="style4"><span class="style11">調性</span></span></th>
    </tr>   
    <?
    	$i=0;
    	while($i<$song_num){
    		$poetry_data[$i]=mysql_fetch_array($song_result);
    	switch($poetry_data[$i][SONG_KEY]){
    		case"0";
    		$KEY="未輸入音調";
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
    	echo "<tr bgcolor=\"#FFFFFF\" class=\"unnamed1\"><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><div align=\"center\"><span class=\"style11 style14 style13\"><span class=\"style4 style17\">".($i+1)."</span></span></div></th><th bordercolor=\"#FFFFFF\" scope=\"col\"><div align=\"center\"><span class=\"style18\"><a href=\"poetry_sys_find_result.php?L=".$L."&S=".$S."&N=".$poetry_data[$i][SEQ_NBR]."\">".$poetry_data[$i][SONG_NM]."</a></span></div></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><div align=\"center\"><span class=\"style17\">".sprintf("%05d",$poetry_data[$i][SEQ_NBR])."</span></div></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><div align=\"center\"><span class=\"style17\">".$poetry_data[$i][SONG_ORIG]."</span></div></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><div align=\"center\">".$poetry_data[$i][SONG_KIND]."</div></th><th height=\"30\" bordercolor=\"#FFFFFF\" scope=\"col\"><div align=\"center\">".$KEY."</div></th></tr>";
 	$i++;
 	   	}
    	
	


?>
 <tr bgcolor="#666666">
      <th height="30" colspan="6" bordercolor="#FFFFFF" scope="col"><span class="style4">
        <input onClick="location.href='<? echo $SER_KIND; ?>'" name="Cancle" type="button" id="Cancle" value="取消">
      </span></th>
      </tr>
    </table>
  </div>
</form>
</body>
</html>
