<? 
ini_set("display_errors",0);
//以下定義連結資料庫變數
   $SQLAccessID = "root"; 
   $SQLpwd = "Glorycellchurch15745112"; 
   $SQLHost = "localhost";
   $Mydatabase = "POETRY";
   $MyLink =mysql_connect($SQLHost,$SQLAccessID,$SQLpwd);
   
   mysql_select_db($Mydatabase, $MyLink);
   mysql_query("SET NAMES 'utf8'"); 
   mysql_query("SET CHARACTER_SET_CLIENT=utf8"); 
   mysql_query("SET CHARACTER_SET_RESULTS=utf8"); 

   
/*連結並查詢資料庫連結狀態  
if(mysql_select_db($Mydatabase, $MyLink))
  {
    echo"很好，我知道你可以的<br>";
  }
  else
  {
    echo"不能連資料庫";
    exit();
  }*/
?>
