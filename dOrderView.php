<?php
require_once("dbconfig.php");
//require_once("distributor.php");
function init(){
	global $db;
	$sql = "TRUNCATE TABLE distributor;";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_execute($stmt); 
	$sql = "INSERT INTO distributor(`tid`,`dord`,`period`,`stock`,`arrival`,`cost`,`dstat`) values (0,0,0,15,0,0,1);";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_execute($stmt); 
	addOrder(1);
	return;
}
function addOrder($period){ //新增一行 空白資料
	global $db;	
	$sql ="insert into distributor (`period`) values (?) " ;	
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "i",$period);
	mysqli_stmt_execute($stmt);
	return ;
}
function update($ord,$period){ 
	global $db;	
	$sql ="update distributor set dord = ? , dstat = 1 where period = ?" ;	
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "ii",$ord,$period);
	mysqli_stmt_execute($stmt);
	return ;
}
function orderlist(){
	global $db;
	$sql = "select distributor.*,wholesaler.word from `distributor`,`wholesaler` where distributor.period=wholesaler.period";
	$stmt = mysqli_prepare($db, $sql );
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	return $result;
}
function period() {
    global $db;
    $sql = "select max(period) as currPeriod from distributor where 1";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt)); 
    $period = $result['currPeriod'];
    return $period;
}
function checkstat() {
    global $db;
    $sql = "select max(wstat) as currstat from wholesaler where 1";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt)); 
    $stat = $result['currstat'];
    return $stat;
}
?>