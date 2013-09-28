<? 
//引入no-catch程式;
  header("Cache-Control: no-cache");
  header("Pragma: no-cache");
  header("Expires: Tue, Jan 12 1999 05:00:00 GMT");

echo $ADMIN_COOKIE;
echo "<br>";
echo date("Y-m-d H:m:s");
//phpinfo();
?>

<html>
<head>
<title>Untitled Document</title>
<META HTTP-EQUIV="refresh" CONTENT="30; URL=testcook.php">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<body bgcolor="#FFFFFF" text="#000000">

</body>
</html>
