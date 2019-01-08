<?php
require("dbconfig.php");
require("loginModel.php");
// require("indexView.php");
$uname=getCurrentUserName();
$uid = getCurrentUser();
$Tid=(int)$_REQUEST['Tid'];
$role =(int)$_REQUEST['role'];


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
} else{
	if($role ==1){
		$sql = "update team set factory=? where Tid=?";
		$stmt = mysqli_prepare($db, $sql);
		mysqli_stmt_bind_param($stmt, "si",$uname, $Tid);
		mysqli_stmt_execute($stmt); //執行SQL
		// header('Location:indexView.php');

	}
	else if($role == 2){
		$sql = "update team set distributor=? where Tid=?";
		$stmt = mysqli_prepare($db, $sql);
		mysqli_stmt_bind_param($stmt, "si",$uname, $Tid);
		mysqli_stmt_execute($stmt); //執行SQL
		
	}
	else if($role == 3){
		$sql = "update team set wholesaler=? where Tid=?";
		$stmt = mysqli_prepare($db, $sql);
		mysqli_stmt_bind_param($stmt, "si",$uname, $Tid);
		mysqli_stmt_execute($stmt); //執行SQL
		// header('Location:indexView.php');
	}
	else if($role == 4){
		$sql = "update team set retailer=? where Tid=?";
		$stmt = mysqli_prepare($db, $sql);
		mysqli_stmt_bind_param($stmt, "si",$uname, $Tid);
		mysqli_stmt_execute($stmt); //執行SQL
		// header('Location:indexView.php');
	}
	$sql = "insert into role (uid,Tid,r) values (?,?,?);";
    $stmt = mysqli_prepare($db, $sql );
    mysqli_stmt_bind_param($stmt,"sii",$uid,$Tid,$role);
	mysqli_stmt_execute($stmt);
	
	header('Location:ready.php?Tid='.$Tid);
}
//header('Location:indexView.php');
// echo "empty message id.";
?>




