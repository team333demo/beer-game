<?php
require_once("dbconfig.php");
checkLogin() ;
require_once("factory.php");
function init($Tid){
	global $db;
	$sql = "TRUNCATE TABLE factory;";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_execute($stmt); 
	$sql = "INSERT INTO factory(`Tid`,`ford`,`period`,`stock`,`arrival`,`cost`,`fstat`) values (?,0,0,15,0,0,1);";
	$stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i",$Tid);
    mysqli_stmt_execute($stmt); 
	addOrder(1,$Tid);
	return;
}
function addOrder($period,$Tid){ //新增一行 空白資料
	global $db;	
	$sql ="insert into factory (`period`,`Tid`) values (?,?) " ;	
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "ii",$period,$Tid);
	mysqli_stmt_execute($stmt);
	return ;
}
function update($ord,$period,$Tid){ 
	global $db;	
	$sql ="update factory set ford = ? , fstat = 1 where period = ? and Tid = ? " ;	
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "iii",$ord,$period,$Tid);
	mysqli_stmt_execute($stmt);
	return ;
}
function orderlist($Tid){
	global $db;
	$sql = "select factory.*,distributor.dord from `factory`,distributor where (factory.period = distributor.period) and factory.Tid = ? AND distributor.Tid= ? ";
	$stmt = mysqli_prepare($db, $sql );
	mysqli_stmt_bind_param($stmt, "ii",$Tid,$Tid);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	return $result;
}
function period($Tid) {
    global $db;
    $sql = "select max(period) as currPeriod from factory where Tid=?";
    $stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "i",$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt)); 
    $period = $result['currPeriod'];
    return $period;
}
function checkstat($period,$Tid) {
	//test
    global $db;
    $sql = "select dstat  from distributor where period = (?-1) AND Tid = ?";
    $stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt,"ii",$period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
	$result1=mysqli_fetch_assoc($result);
	
	$sql = "select rstat from retailer where period = (?-1) AND Tid = ?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "ii",$period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
	$result2=mysqli_fetch_assoc($result);
	
	$sql = "select wstat from wholesaler where period = (?-1) AND Tid = ?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "ii",$period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
	$result3=mysqli_fetch_assoc($result);
	
	$sql = "select fstat from factory where period = ? AND Tid = ?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "ii",$period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
	$result4=mysqli_fetch_assoc($result);
	
	if($result1['dstat']==1&&$result2['rstat']==1&&$result3['wstat']==1&&$result4['fstat']==0){
		return 1;
	}else{
		return 0;
	}
}
function countstock ($period,$Tid) {
	global $db;
	$sql="select stock as laststock from factory where period=? AND Tid = ?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "ii",$period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt)); 
    $cstock = $result['laststock'];
	
	$sql="select distributor.dord as ord from distributor where period=(?+1) AND Tid=?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt,"ii",$period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt)); 
    $rord = $result['ord'];
	
	$sql="select arrival as arrive from factory where period=(?+1) AND Tid = ?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "ii",$period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt)); 
    $arrival = $result['arrive'];
    $stock = $cstock + $arrival - $rord;
	
    updatestock($stock,$period+1,$Tid);
	return;
}
function updatestock ($stock,$period,$Tid) {
	global $db;
	$sql="update factory set stock = ? where period = ? AND Tid = ?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt,"iii",$stock,$period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt); 
    return $result ; 
}
function countcost ($period,$Tid) {    //成本
	global $db;
    $sql= "select stock  from factory where period = ? AND Tid = ?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt,"ii",$period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt); 
    $stock = mysqli_fetch_assoc($result);
	  if ($stock['stock'] < 0) { // 欠貨
        $sql = "select (stock*(-2)) as cost from factory 
        where period = ? AND Tid = ?";
    } else {
        $sql = "select (stock*1) as cost from factory 
        where period = ? AND Tid = ?";
    }
	$stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "ii",$period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $rs = mysqli_stmt_get_result($stmt); 
    $cost = mysqli_fetch_assoc($rs);
	$sql = "update factory set cost = ? where period = ? AND Tid = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "iii", $cost['cost'],$period,$Tid);
    mysqli_stmt_execute($stmt);
	//updatecost($cost,$period);
	return;
}
function updatecost ($cost,$period,$Tid) {
	global $db;
	$sql="update factory set cost = ? where period = ? AND Tid = ?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt,"iii",$cost,$period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    mysqli_stmt_get_result($stmt); 
    return ; 
}
function updatearrival($period,$Tid) { // 修改到貨量
    global $db; 
    $sql = "select ford as arr from factory where period = (?-2) AND Tid = ?";
    $stmt = mysqli_prepare($db, $sql); 
    mysqli_stmt_bind_param($stmt, "ii", $period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    $arr = mysqli_fetch_assoc($result);
    if ($period >= 2) {
        $sql = "update factory set arrival = ? where period = ? AND Tid = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "iii", $arr['arr'],$period,$Tid);
    } else {
        $sql = "update factory set arrival = 0 where period = ? AND Tid = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "ii",$period,$Tid);
    }
    mysqli_stmt_execute($stmt); 
    return;
}
function updatesales($period,$Tid) { // 修改銷貨量
    global $db; 
    $sql = "select stock, distributor.dord , arrival from distributor,factory where period = ? AND Tid = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "ii",$period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    $current = mysqli_fetch_assoc($result);
	
    $sql2 = "select stock from factory where period = ? AND Tid = ?";
    $p = $period - 1;	
    $stmt2 = mysqli_prepare($db, $sql2);
    mysqli_stmt_bind_param($stmt2, "ii",  $p ,$Tid);
    mysqli_stmt_execute($stmt2); //執行SQL
    $rs = mysqli_stmt_get_result($stmt2);
    $last = mysqli_fetch_assoc($rs);
    $sales = 0;
    if ($last['stock'] < 0) { 
        if ($current['stock'] < 0) {
            $sales = $current['arrival'];
        } else {
            $sales = $current['arrival'] - $current['stock'];
        }
    } else {
        if ($current['stock'] < 0) {
            $sales = $last['stock'] + $current['arrival'];
        } else {
            $sales = $current['dord'];
        }
    }
    $sql = "update factory set fsale = ? where period = ? AND Tid = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "iii", $sales,$period,$Tid);
    mysqli_stmt_execute($stmt);
    return;
}
?>