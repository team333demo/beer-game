<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>insert new team</p>
<hr />
<?php
require('dbconfig.php');
require("loginModel.php");
// $title=$_POST['title'];
// $msg=$_POST['msg'];
// $name=$_POST['myname'];
// $sec=$_POST['sec'];
$tname =$_POST['team'];
$player =$_POST['player'];
$status = '等待中';
$uname = getCurrentUserName();
if ($tname) {
	if($player == 'factory') {
		$sql = "insert into team (tname,factory,status) values (?,?,?)";
		$stmt = mysqli_prepare($db, $sql); //prepare sql statement
		mysqli_stmt_bind_param($stmt, "sss", $tname, $uname,$status); //bind parameters with variables
		mysqli_stmt_execute($stmt);  //執行SQL
		echo "team added.";
	}
	// if($player == 'factory') {
	// 	$sql = "insert into team (tname,status) values (?,?)";
	// 	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	// 	mysqli_stmt_bind_param($stmt, "ss", $tname,$status); //bind parameters with variables
	// 	mysqli_stmt_execute($stmt);  //執行SQL
	// 	echo "team added.";
	// }
	// if($player == 'factory') {
	// 	$sql = "insert into team (tname,status) values (?,?)";
	// 	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	// 	mysqli_stmt_bind_param($stmt, "ss", $tname,$status); //bind parameters with variables
	// 	mysqli_stmt_execute($stmt);  //執行SQL
	// 	echo "team added.";
	// }
	// if($player == 'factory') {
	// 	$sql = "insert into team (tname,status) values (?,?)";
	// 	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	// 	mysqli_stmt_bind_param($stmt, "ss", $tname,$status); //bind parameters with variables
	// 	mysqli_stmt_execute($stmt);  //執行SQL
	// 	echo "team added.";
	// }

} else {
	echo "empty title, cannot insert.";
}
?>
<a href="indexView.php">回首頁</a>
</body>
</html>
