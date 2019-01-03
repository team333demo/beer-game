<?php
require_once("dbconfig.php");
require_once("factory.php");
function init(){
	global $db;
	$sql = "TRUNCATE TABLE factory;";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_execute($stmt); 
	$sql = "INSERT INTO factory(`tid`,`ford`,`period`,`stock`,`arrival`,`cost`) values (0,0,0,15,0,0);";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_execute($stmt); 
	addOrder(1);
	return;
}
function addOrder($period){ //新增一行 空白資料
	global $db;	
	$sql ="insert into factory (`period`) values (?) " ;	
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "i",$period);
	mysqli_stmt_execute($stmt);
	return ;
}
function update($ord,$period){ 
	global $db;	
	$sql ="update factory set ford = ? where period = ?" ;	
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "ii",$ord,$period);
	mysqli_stmt_execute($stmt);
	return ;
}
function orderlist(){
	global $db;
	$sql = "select factory.*,distributor.dord from `factory`,distributor where factory.period = distributor.period";
	$stmt = mysqli_prepare($db, $sql );
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	return $result;
}
function getdemand(){
	global $db;

}
?>