<?php
require('dbconfig.php');
$Tid=(int)$_REQUEST['Tid'];

$d1 =(int)$_POST['demand1'];
$d2 =(int)$_POST['demand2'];

for($i = 0; $i < 50; $i++){
        $demand = rand($d1,$d2);
        $sql = "insert into demand (Tid,period,demand) values (?,?,?);";
        $stmt = mysqli_prepare($db, $sql );
        mysqli_stmt_bind_param($stmt,"iii", $Tid,$i,$demand);
        mysqli_stmt_execute($stmt);
        // $result = mysqli_stmt_get_result($stmt); 
    }
    $sql = "update team set demandstatus='1' where Tid=?";
    $stmt = mysqli_prepare($db, $sql );
    mysqli_stmt_bind_param($stmt,"i", $Tid);
    mysqli_stmt_execute($stmt);
    
    header('Location:setdemand.php ?Tid='.$Tid);
?>