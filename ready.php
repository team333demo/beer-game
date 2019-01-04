<?php
require("dbconfig.php");
// require("loginModel.php");
// require("join.php");
$Tid=(int)$_REQUEST['Tid'];
// $role =(int)$_REQUEST['role'];
echo $Tid;
$sql = "select * from `team` WHERE Tid=?;";
$stmt = mysqli_prepare($db, $sql );
mysqli_stmt_bind_param($stmt,"i", $Tid);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); 
// $rs = mysqli_fetch_assoc($result);
// $check=0;
$rs = mysqli_fetch_assoc($result);
	if($rs['factory']!= NULL && $rs['distributor']!= NULL && $rs['wholesaler']!= NULL && $rs['retailer']!= NULL){
        $sql = "update team set status='完成' where Tid=?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "i", $Tid);
        mysqli_stmt_execute($stmt); //執行SQL
        
    }
    header('Location:indexView.php');
// }



?>