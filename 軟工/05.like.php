<?php
require("dbconfig.php");

$id=(int)$_REQUEST["id"];

if ($id>0) {
	$sql = "update guestbook set likes = likes+1 where id=?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "i", $id);
	mysqli_stmt_execute($stmt); //執行SQL
	//echo "message updated";
} //else echo "empty message id.";

header('Location: ./');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>update message</p>
<hr />
<a href="./">回首頁</a>
</body>
</html>
