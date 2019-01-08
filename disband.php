<?php
require("dbconfig.php");
// $uid = getCurrentUser();

// $dt =(int)$_POST['disbandteam'];

//刪除需求
$sql = "delete from `demand`";
$stmt = mysqli_prepare($db, $sql );
// mysqli_stmt_bind_param($stmt);
mysqli_stmt_execute($stmt);
$tid = $_REQUEST["Tid"];

//隊伍狀態改結束
$sql = "select * from `team` WHERE status= '遊戲中';";
$stmt = mysqli_prepare($db, $sql );
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); 
// $rs = mysqli_fetch_assoc($result);
// $check=0;

while($rs = mysqli_fetch_assoc($result)){
    $Tid=$rs['Tid'];
    $sql = "update team set status='結束' where Tid=?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i", $Tid);
    mysqli_stmt_execute($stmt); //執行SQL
    // header('Location:indexView.php');

}
header("Location:endview.php".$tid);
?>