<?php
require('dbconfig.php');
// $Tid=(int)$_REQUEST['Tid'];

$d1 =(int)$_POST['demand1'];
$d2 =(int)$_POST['demand2'];

for($i = 1; $i <= 50; $i++){
        $demand = rand($d1,$d2);
        $sql = "insert into demand (period,demand) values (?,?);";
        $stmt = mysqli_prepare($db, $sql );
        mysqli_stmt_bind_param($stmt,"ii",$i,$demand);
        mysqli_stmt_execute($stmt);
        // $result = mysqli_stmt_get_result($stmt); 
    }
    $sql = "select * from `team` WHERE status= '完成';";
    $stmt = mysqli_prepare($db, $sql );
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); 
    // $rs = mysqli_fetch_assoc($result);

    while($rs = mysqli_fetch_assoc($result)){
        $Tid=$rs['Tid'];
        $sql = "update team set status='遊戲中'where Tid=?;";
        $stmt = mysqli_prepare($db, $sql);
		mysqli_stmt_bind_param($stmt, "i", $Tid);
		mysqli_stmt_execute($stmt); //執行SQL
    }
    
    
    header('Location:adminView.php');
?>