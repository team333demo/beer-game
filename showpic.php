<?php
require("dbconfig.php");
$sql = "SELECT pic FROM user where uid = '123456789'";
$result = mysqli_query($db,$sql);

// $data=mysql_fetch_array($stmt);
// //設定網頁資料格式
// header("Content-Type: $data[1]");
// // 輸出圖片資料
// echo base64_decode($data[0]);
$row=mysqli_fetch_array($result);
        header("Content-type: image/png");     
        echo base64_decode($row[0]);
?>
