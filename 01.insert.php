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
$uid = getCurrentUser();
$role = 0;

$sql = "select factory,distributor,wholesaler,retailer from `team` WHERE status= '等待中'or status= '完成'or status= '遊戲中';";
$stmt = mysqli_prepare($db, $sql );
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); 
// $rs = mysqli_fetch_assoc($result);
$check=0;

while($rs = mysqli_fetch_assoc($result)){
	if($rs['factory'] == $uname || $rs['distributor'] == $uname || $rs['wholesaler'] == $uname || $rs['retailer'] == $uname) {
		$check = 1;
	}
}

if($check == 1) {
	echo "<script>alert('警告：你已加入其他隊伍中!'); location='indexView.php';</script>";
}else{
	if ($tname) {
		if($player == 'factory') {
			$role = 1;
			$sql = "insert into team (tname,factory,status) values (?,?,?)";
			$stmt = mysqli_prepare($db, $sql); //prepare sql statement
			mysqli_stmt_bind_param($stmt, "sss", $tname, $uname,$status); //bind parameters with variables
			mysqli_stmt_execute($stmt);  //執行SQL
			echo "team added.";
		}
		if($player == 'Distributor') {
			$role = 2;
			$sql = "insert into team (tname,Distributor,status) values (?,?,?)";
			$stmt = mysqli_prepare($db, $sql); //prepare sql statement
			mysqli_stmt_bind_param($stmt, "sss", $tname, $uname,$status); //bind parameters with variables
			mysqli_stmt_execute($stmt);  //執行SQL
			echo "team added.";
		}
		if($player == 'wholesaler') {
			$role = 3;
			$sql = "insert into team (tname,wholesaler,status) values (?,?,?)";
			$stmt = mysqli_prepare($db, $sql); //prepare sql statement
			mysqli_stmt_bind_param($stmt, "sss", $tname, $uname,$status); //bind parameters with variables
			mysqli_stmt_execute($stmt);  //執行SQL
			echo "team added.";
		}
		if($player == 'retailer') {
			$role = 4;
			$sql = "insert into team (tname,retailer,status) values (?,?,?)";
			$stmt = mysqli_prepare($db, $sql); //prepare sql statement
			mysqli_stmt_bind_param($stmt, "sss", $tname, $uname,$status); //bind parameters with variables
			mysqli_stmt_execute($stmt);  //執行SQL
			echo "team added.";
		}
		header('Location:insertrole.php? role='.$role);
	} else {
	echo "empty title, cannot insert.";
	echo "<br/><a href='indexView.php'>回首頁</a>";
	}
}
