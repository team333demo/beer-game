<?php
require("dbconfig.php");
$userID = $_POST['uid'];
$passWord = $_POST['pwd'];
$userName = $_POST['uname'];
//取得上傳檔案資訊
$filename=$_FILES['img']['name'];
$tmpname=$_FILES['img']['tmp_name'];
$filetype=$_FILES['img']['type'];
$filesize=$_FILES['img']['size'];
$fileContents;
if ($_FILES["img"]["size"] > 0 ) {
         //開啟圖片檔
         $file = fopen($_FILES["img"]["tmp_name"], "rb");
         // 讀入圖片檔資料
         $fileContents = fread($file, filesize($_FILES["img"]["tmp_name"])); 
         //關閉圖片檔
         fclose($file);
         // 圖片檔案資料編碼
         $fileContents = base64_encode($fileContents);
}
// 檢查ID是否存在
$sql = "SELECT uid FROM user where uid ='".$userID."'";
//$sql = "SELECT * FROM user WHERE loginID='" . $userName . "' AND password= '" . $passWord . "'";
if ($result = mysqli_query($db,$sql)) {
    if ($row=mysqli_fetch_array($result)) {
        echo "帳號已存在!!";
        exit(0);
    } else {
        $sql = "INSERT INTO user(uid, pwd, uname, role, pic, score) VALUES (?, ?, ?, 1,'". $fileContents."', 0)";
        $stmt = mysqli_prepare($db, $sql); //prepare sql statement
        mysqli_stmt_bind_param($stmt, "sss", $userID, $passWord,$userName); //bind parameters with variables
        mysqli_stmt_execute($stmt);  //執行SQL
        echo "註冊完成";
    }
}

?>
