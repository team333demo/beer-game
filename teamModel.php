<!-- method 介面改寫 -->
<?php
require("dbconfig.php");
// function teamUpdate($id, $tname, $Factory, $Distributor, $Wholesaler, $Retailer, $Status){
// 	if ($id>0) {
// 		$sql = "update guestbook set tname=?, Factory=?, Distributor=? ,Wholesaler=?, Retailer=? where tid=?";
// 		$stmt = mysqli_prepare($db, $sql);
// 		mysqli_stmt_bind_param($stmt, "sssssi", $tname, $Factory,$Distributor, $Wholesaler, $Retailer, $id);
// 		mysqli_stmt_execute($stmt); //執行SQL
// 		$ret "team updated";
// 	} else $ret= "empty team id.";
// 	return $ret;
// }
// $id=(int)$_POST["id"];
// $title=$_POST['title'];
// $select=$_POST['select'];
// $msg=$_POST['msg'];
// $name=$_POST['myname'];


// function msgDelete($id){
// 	if ($id>0) {
// 	$sql = "delete from guestbook where id=?;";
// 	$stmt = mysqli_prepare($db, $sql );
// 	mysqli_stmt_bind_param($stmt, "i", $id);
// 	mysqli_stmt_execute($stmt);

// 	$ret= "message deleted.";
// 	} else {
// 	$ret= "empty id, cannot delete.";
// 	}
// 	return $ret;
// }

function teamAdd($title, $msg, $name, $select){
	if ($title) {
		$sql = "insert into guestbook (title, msg, name, 類型) values (?,?,?, ?)";
		$stmt = mysqli_prepare($db, $sql); //prepare sql statement
		mysqli_stmt_bind_param($stmt, "ssss", $title, $msg,$name, $select); //bind parameters with variables
		mysqli_stmt_execute($stmt);  //執行SQL
		$ret= "message added.";
	} else {
		$ret= "empty title, cannot insert.";
	}
}

// function msgGetOne($id){
// 	$sql = "select * from guestbook where id=?;";
// 	$stmt = mysqli_prepare($db, $sql );
// 	mysqli_stmt_bind_param($stmt, "i", $id);
// 	mysqli_stmt_execute($stmt);
// 	$result = mysqli_stmt_get_result($stmt); 
// 	return mysqli_fetch_array($result));
// }


function teamGetAll(){
	global $db;//
	$sql = "select * from team;";
	$stmt = mysqli_prepare($db, $sql );
	// mysqli_stmt_bind_param($stmt, "i", $id);
	mysqli_stmt_execute($stmt);
	// $result = mysqli_stmt_get_result($stmt); //刪掉
	return mysqli_fetch_array($result);
}
