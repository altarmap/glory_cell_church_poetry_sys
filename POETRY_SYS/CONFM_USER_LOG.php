<?
//引入no-cache.php
include("no-cache.php");
//引入資料庫連結程式，並回傳狀態
include("user_link.php");
//比對登者資料;
$Mytable2 = "GCC_USR_PROF";
$query2 = "select * from $Mytable2 where USER_NM=\"".$USER_LOG_NM."\" and USER_PSWD=\"".$USER_LOG_PASS."\" and STARTED_TAB=1";
$result2 = mysql_query($query2, $MyLink);
$check_NUM2 = mysql_num_rows($result2);
$Login_data2 = mysql_fetch_array($result2); 

	//判斷登入是否成功;
if($USER_LOG_NM != "" and $USER_LOG_PASS != ""){
	
	if($check_NUM2 != 1){
		header('Location:login_erro.php?LOG=1');
	} else {		
		//設定cookie變數;
		$CookieTab = "USER_COOKIE";
		$CRT_day = date("y-m-d h:i:s");
		$COOKIE_VAL = md5($Login_data2['CHN_NM'].$Login_data2['USER_PSWD'].$Login_data2['SEQ_NBR'].$CRT_day);

		include("link.php");
		//查詢本次進入的清單編號;
		$SONG_LIST_Q = "select SEQ_NBR from PLAY_LIST order by SEQ_NBR desc";
		$SONG_LIST_R = mysql_query($SONG_LIST_Q, $MyLink);
		$SONG_LIST_data_R= mysql_fetch_array($SONG_LIST_R);
		$L=$SONG_LIST_data_R[SEQ_NBR]+1;

		function insertdata ($aa,$bb)
		{
			return "insert into USER_COOKIE($aa) values ($bb)";
		}

		$LASTUSE_TIME=date("H:i:s");

		$Cookie_insert = insertdata ("COOKIE_VAL,USER_ID,LOG_TIME,LASTUSE_TIME","\"".$COOKIE_VAL."\",\"".$Login_data2['SEQ_NBR']."\",\"".$CRT_day."\",\"".$LASTUSE_TIME."\"");

		if(!mysql_query($Cookie_insert, $MyLink)){
			echo "資料無法存入\"COOKIE_TABLE\"";
			echo mysql_error();
		}
		else{
			$life_time = time()+7200;//二小時;
			//   setcookie ("COOKIE_VAL",$COOKIE_VAL,$life_time);

			setcookie ("USER_COOKIE_VAL",$COOKIE_VAL,0,"/",".glow.org.tw");
			//         setcookie ("USER_COOKIE_VAL",$COOKIE_VAL,0,"/");
			//		  echo $USER_COOKIE_VAL; 
			header("Location:poetry_system_user.php?L=".$L);
			//  	header("Location:ggg.php");
		}
	}
}else{
	header('Location:login_erro.php?LOG=1');
}
?>
