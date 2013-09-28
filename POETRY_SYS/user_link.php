<?php
ini_set("display_errors",0);
//HUwqsƮwܼ
   $SQLAccessID = "root"; 
   $SQLpwd = "Glorycellchurch15745112"; 
   $SQLHost = "localhost";
   $Mydatabase = "GCC";
   $MyLink =mysql_connect($SQLHost,$SQLAccessID,$SQLpwd);
   mysql_select_db($Mydatabase, $MyLink);
  
   $USER_LOG_NM = $_POST['USER_LOG_NM'];
   $USER_LOG_PASS = $_POST['USER_LOG_PASS'];
