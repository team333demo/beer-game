<?php
require_once("dbconfig.php");
require_once("factory.php");
function init(){
	global $db;
	$sql = "TRUNCATE TABLE factory;";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_execute($stmt); 
	$sql = "INSERT INTO factory(`tid`,`ord`,`period`,`stock`,`arrival`,`cost`) values (0,0,0,0,0,0);";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_execute($stmt); 
	return;
}
function addOrder($num,$period){
	global $db;

	if((int)$period === 0) {
		$sql = "UPDATE `factory` SET `ord` = ? ,`period` = 1";
	}
	else {
		$sql = "INSERT INTO factory
	(`tid`,`ord`,`period`,`stock`,`arrival`,`cost`)
	values(1,?,(
	(IF ((SELECT max( abc.period ) FROM ( SELECT *  FROM factory ) as abc) IS NULL, 1, (SELECT max( abc.period ) FROM ( SELECT *  FROM factory ) as abc) +1 ))),0,0,0);";
	}
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "i",$num);
	mysqli_stmt_execute($stmt);
	return ;
   }
function period(){
 global $db;
 $sql = "update factory set period = 
 IF ((SELECT max(abc.period)FROM ( SELECT *  FROM factory) as abc) ,period, period+1)
 Where EXISTS (select fid,max(fid) 
 group by fid)";
 $stmt = mysqli_prepare($db, $sql);
 mysqli_stmt_bind_param($stmt);
 $result=mysqli_stmt_execute($stmt); 
 return $result;  
}
function orderlist(){
	global $db;
	$sql = "select * from `factory`;";
	$stmt = mysqli_prepare($db, $sql );
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	return $result;
}
?>