<?php
require_once("dbconfig.php");
require_once("retailer.php");
function init($Tid){
	global $db;
	$sql = "TRUNCATE TABLE retailer where Tid = ?;";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "i",$Tid);
	mysqli_stmt_execute($stmt); 
	$sql = "INSERT INTO retailer(`Tid`,`rord`,`period`,`stock`,`arrival`,`cost`,`rstat`) values (?,0,0,15,0,0,1);";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "i",$Tid);
	mysqli_stmt_execute($stmt); 
	addOrder(1,$Tid);
	return;
}
function addOrder($period,$Tid){ //新增一行 空白資料
	global $db;	
	$sql ="insert into retailer (`period`,`Tid`) values (?,?) " ;	
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "ii",$period,$Tid);
	mysqli_stmt_execute($stmt);
	return ;
}
function update($ord,$period,$Tid){ 
	global $db;	
	$sql ="update retailer set rord = ?, rstat=1 where period = ? and Tid = ?" ;	
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "iii",$ord,$period,$Tid);
	mysqli_stmt_execute($stmt);
	return ;
}
function orderlist($Tid){
	global $db;
	$sql = "select retailer.*,demand.demand from `retailer`,`demand` where (retailer.period = demand.period) and retailer.Tid = ? ";
	$stmt = mysqli_prepare($db, $sql );
	mysqli_stmt_bind_param($stmt, "i",$Tid);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	return $result;
}
function period($Tid) {
    global $db;
    $sql = "select max(period) as currPeriod from retailer where Tid = ?";
    $stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "i",$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt)); 
    $period = $result['currPeriod'];
    return $period;
}
function checkstat($period,$Tid) {
    global $db;
    $sql = "select dstat  from distributor where period = (?-1) and Tid = ? ";
    $stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt,"ii",$period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
	$result1=mysqli_fetch_assoc($result);
	
	$sql = "select fstat from factory where period = (?-1) and Tid = ?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "ii",$period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
	$result2=mysqli_fetch_assoc($result);
	
	$sql = "select wstat from wholesaler where period = (?-1) and Tid = ?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "ii",$period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
	$result3=mysqli_fetch_assoc($result);
	
	$sql = "select rstat from retailer where period = ? and Tid = ?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "ii",$period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
	$result4=mysqli_fetch_assoc($result);
	
	if($result1['dstat']==1&&$result2['fstat']==1&&$result3['wstat']==1&&$result4['rstat']==0){
		return 1;
	}else{
		return 0;
	}
}
function countstock ($period,$Tid) {
	global $db;
	$sql="select stock as laststock from retailer where period=? and Tid = ?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "ii",$period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt)); 
    $cstock = $result['laststock'];
	
	$sql="select demand.demand as ord from demand where period=(?+1) and Tid = ?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt,"ii",$period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt)); 
    $ord = $result['ord'];
	
	$sql="select arrival as arrive from retailer where period=(?+1) and Tid = ?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "ii",$period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt)); 
    $arrival = $result['arrive'];
    $stock = $cstock + $arrival - $ord;
	
    updatestock($stock,$period+1,$Tid);
	return;
}
function updatestock ($stock,$period,$Tid) {
	global $db;
	$sql="update retailer set stock = ? where period = ? and Tid = ?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt,"iii",$stock,$period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt); 
    return $result ; 
}
function countcost ($period,$Tid) {    //成本
	global $db;
    $sql= "select stock  from retailer where period = ? and Tid = ?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt,"ii",$period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt); 
    $stock = mysqli_fetch_assoc($result);
	  if ($stock['stock'] < 0) { // 欠貨
        $sql = "select (stock*(-2)) as cost from retailer 
        where period = ? and Tid = ?";
    } else {
        $sql = "select (stock*1) as cost from retailer 
        where period = ? and Tid = ?";
    }
	$stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "ii",$period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $rs = mysqli_stmt_get_result($stmt); 
    $cost = mysqli_fetch_assoc($rs);
	$sql = "update retailer set cost = ? where period = ? and Tid = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "iii", $cost['cost'],$period,$Tid);
    mysqli_stmt_execute($stmt);
	//updatecost($cost,$period);
	return;
}
function updatecost ($cost,$period,$Tid) {
	global $db;
	$sql="update retailer set cost = ? where period = ? and Tid = ?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt,"iii",$cost,$period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    mysqli_stmt_get_result($stmt); 
    return ; 
}
function updatearrival($period,$Tid) { // 修改到貨量
    global $db; 
    $sql = "select rord as arr from retailer where period = (?-2) and Tid = ?";
    $stmt = mysqli_prepare($db, $sql); 
    mysqli_stmt_bind_param($stmt, "ii", $period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    $arr = mysqli_fetch_assoc($result);
    if ($period >= 2) {
        $sql = "update retailer set arrival = ? where period = ? and Tid = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "iii", $arr['arr'],$period,$Tid);
    } else {
        $sql = "update retailer set arrival = 0 where period = ? and Tid = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "ii",$period,$Tid);
    }
    mysqli_stmt_execute($stmt); 
    return;
}
function updatesales($period,$Tid) { // 修改銷貨量
 global $db; 
    $sql = "select stock arrival from retailer where period = ? and Tid = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "ii",$period,$Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    $current = mysqli_fetch_assoc($result);

    $sql = "select  demand.demand from demand where period = ? ";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i",$period);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    $current = mysqli_fetch_assoc($result);
	
    $sql2 = "select stock from retailer where period = ? and Tid = ?";
    $p = $period - 1;	
    $stmt2 = mysqli_prepare($db, $sql2);
    mysqli_stmt_bind_param($stmt2, "ii",  $p,$Tid);
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
            $sales = $current['demand'];
        }
    }
    $sql = "update retailer set rsale = ? where period = ? and Tid = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "iii", $sales,$period,$Tid);
    mysqli_stmt_execute($stmt);
    return;
}

    	
?>
