<?php
require("dbconfig.php");
$uid = getCurrentUser();

$dt =(int)$_POST['disbandteam'];

$sql = "delete from `demand`";
$stmt = mysqli_prepare($db, $sql );
// mysqli_stmt_bind_param($stmt);
// mysqli_stmt_execute($stmt);
// $result = mysqli_stmt_get_result($stmt); 
// echo "111";

if($dt==1){//還沒試
    $sql = "delete from `role`where uid=?";
    $stmt = mysqli_prepare($db, $sql );
    mysqli_stmt_bind_param($stmt,"s",$uid);
    mysqli_stmt_execute($stmt);
}
header("Location:indexView.php");
?>