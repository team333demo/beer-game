<?php
require_once("dbconfig.php");
require_once("retailer.php");
function init(){
	global $db;
	$sql = "TRUNCATE TABLE retailer;";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_execute($stmt); 
	$sql = "INSERT INTO retailer(`tid`,`rord`,`period`,`stock`,`arrival`,`cost`,`rstat`) values (0,0,0,15,0,0,1);";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_execute($stmt); 
	addOrder(1);
	return;
}
function addOrder($period){ //新增一行 空白資料
	global $db;	
	$sql ="insert into retailer (`period`) values (?) " ;	
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "i",$period);
	mysqli_stmt_execute($stmt);
	return ;
}
function update($ord,$period){ 
	global $db;	
	$sql ="update retailer set rord = ?, rstat=1 where period = ?" ;	
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "ii",$ord,$period);
	mysqli_stmt_execute($stmt);
	return ;
}
function orderlist(){
	global $db;
	$sql = "select * from `retailer`";
	$stmt = mysqli_prepare($db, $sql );
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	return $result;
}
function period() {
    global $db;
    $sql = "select max(period) as currPeriod from retailer where 1";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt)); 
    $period = $result['currPeriod'];
    return $period;
}
/*function checkstat() {
    global $db;
    $sql = "select max(dstat) as currdstat from distributor where 1";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt)); 
    $stat = $result['currstat'];
    return $stat;
}*/
?>