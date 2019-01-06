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
// $tname =$_POST['team'];
// $player =$_POST['player'];
$status = '等待中';
$uname = getCurrentUserName();
$uid = getCurrentUser();
$role=(int)$_REQUEST['role'];
// echo $role;

$sql = "select factory,distributor,wholesaler,retailer,Tid from `team` WHERE status= '等待中';";
$stmt = mysqli_prepare($db, $sql );
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); 
// $rs = mysqli_fetch_assoc($result);

while($rs = mysqli_fetch_assoc($result)){
    $Tid=$rs['Tid'];
	if($rs['factory'] == $uname || $rs['distributor'] == $uname || $rs['wholesaler'] == $uname || $rs['retailer'] == $uname) {
		$sql = "insert into role (uid,Tid,r) values (?,?,?);";
        $stmt = mysqli_prepare($db, $sql );
        mysqli_stmt_bind_param($stmt,"sii",$uid,$Tid,$role);
        mysqli_stmt_execute($stmt);
	}
}
             
?>
<a href="indexView.php">回首頁</a>
</body>
</html>
