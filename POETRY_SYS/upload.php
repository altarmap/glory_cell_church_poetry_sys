<?
// display file details
echo "Filename: " . $_FILES['userfile']['name'] . "<br>";
echo "Temporary Name: " . $_FILES['userfile']['tmp_name'] . "<br>";
echo "Size: ". $_FILES['userfile']['size'] . "<br>";
echo "Type: ". $_FILES['userfile']['type'] . "<br>";
echo "Erro: ". $_FILES['userfile']['erro'] . "<br>";
//判斷檔案存在
if(!is_uploaded_file($_FILES['userfile']['tmp_name'])){
	echo "檔案上傳錯誤！請確認上傳檔案小於2MB！";
		}
else{
//判斷檔案存取類型;
$File_Extension = explode(".", $_FILES['userfile']['name']);
$File_Extension = $File_Extension[count($File_Extension)-1];
strtolower($File_Extension);
switch($File_Extension){
	case"gif";
	break;
	case"jpg";
	break;
	case"jpe";
	break;
	case"bmp";
	break;
	case"tga";
	break;
	case"png";
	break;
	default;
	echo "你上傳的檔案格式錯誤！請確認格式後上傳！";
	exit();	
	}
// copy file here

if(copy($_FILES['userfile']['tmp_name'], "/home/httpd/htdocs/". $_FILES['userfile']['name'])){
echo "<b>File successfully upload</b>";
}
else{
echo "<b>Error: failed to upload file</b>";
}

}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>無標題文件</title>
</head>

<body>
</body>
</html>
