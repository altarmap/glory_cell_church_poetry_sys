<? 
//引入no-cache.php
include("no-cache.php");
//引入資料庫連結程式，並回傳狀態
include("link.php");
$song_num_select="select * from SONG_LIST where PLAY_LISR_NBR=".$L." order by SONG_SERIL asc";
$song_num_que=mysql_query($song_num_select,$MyLink);
$song_num=mysql_num_rows($song_num_que);


?>

<html>
<head>
<title>投影片撥放</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<SCRIPT LANGUAGE="JavaScript">
	<!--
	function index(L,I,SONG,coda){
	top.frames["topFrame"].location.href = "powerpoint/"+SONG+".pps#"+coda; 
	top.frames["mainFrame"].location.href = "poetry_powerpoint_index.php?L="+L+"&I="+I+"&SONG="+SONG;
	
	
	
	//window.open("poetry_play_powerpoint.php");
	
	
	}
//-->
</script>
<link rel="stylesheet" href="1.css" type="text/css">
</head>
<body text="#000000" leftmargin="0" topmargin="0" marginwidth="00" marginheight="0" bgcolor="#000000">
<table width="1000" height="54"  border="3" align="center" cellpadding="5" cellspacing="1" bordercolor="#CCCCCC">
  <tr bgcolor="#333333"> 
    <th width="100%" height="2" bordercolor="#FFFFFF" scope="col"><font color="#FFFFFF"> 
      <? 
$u=0;
while($u<$song_num){
$song_num_fetc[$u]=mysql_fetch_array($song_num_que);
if($SONG==$song_num_fetc[$u][SONG_NBR]){
$back=$u-1;
$next=$u+1;
}
$u++;
}
$bingo_b=$song_num_fetc[$back][SONG_NBR];
$bingo_b_coda=$song_num_fetc[$back][SONGCODA];
$bingo_n=$song_num_fetc[$next][SONG_NBR];
$bingo_n_coda=$song_num_fetc[$next][SONGCODA];
if($SONG==$song_num_fetc[0][SONG_NBR]){
}else{
echo "<a href=\"javascript:index(".$L.",'".$I."',".$bingo_b.",".$bingo_b_coda.");\"><font color=\"#FFFFFF\"><span class=\"unnamed2\">上一首　　</span></font></a>";
}
echo "<a href=\"poetry_play_powerpoint.php?L=".$L."&I=".$I."\" target=\"_top\"><font color=\"#FFFFFF\"><span class=\"unnamed2\">回曲目</span></font></a> ";
$t=$song_num-1;
if($SONG==$song_num_fetc[$t][SONG_NBR]){
}else{
echo "<a href=\"javascript:index(".$L.",'".$I."',".$bingo_n.",".$bingo_n_coda.");\"><font color=\"#FFFFFF\"><span class=\"unnamed2\">　　下一首</span></font></a>";
}

?>
      </font>
    </th>
  </tr>
</table>
</body>
</html>
