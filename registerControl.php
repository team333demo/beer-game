<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet">
<title>註冊</title>
<style type="text/css">
body {
    background-image: linear-gradient(to bottom right, #ffe6ff, #ffe6e6, #ffffe6, #e6ffe6, #e6ffff, #e6e6ff);
}
div {
    height: 410px;
    weight: 1300px;
}
table {
    margin-top: 200px;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
}
th {
    font-family: "微軟正黑體";
    font-size: 50px;
}
td {
    font-family: 'VT323', monospace;
    font-size: 40px;
}
</style>

</head>
<body>
<div>
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

$sqluid = "SELECT uid FROM user where uid ='".$userID."'";
//$sql = "SELECT * FROM user WHERE loginID='" . $userName . "' AND password= '" . $passWord . "'";
$sqluname = "SELECT uname FROM user where uname ='".$userName."'";
// 檢查ID是否存在
if ($result = mysqli_query($db,$sqluid)) {
    if ($row=mysqli_fetch_array($result)) {
        ?>
        <table>
            <tr>
                <th>帳號已存在!! <?php header( "refresh:5;url=registerView.php" );?> </th>
            </tr>
            <tr>
                <td>You'll be redirected in about 5 secs. If not, click <?php echo "<a href='registerView.php'>"?>here</a>.</td>
            </tr>
        </table>
        <!-- echo "帳號已存在!!"; -->
        <?php
        exit(0);
    }
    if ($result = mysqli_query($db,$sqluname)) {
        if ($row=mysqli_fetch_array($result)) {
            ?>
            
            <table>
                <tr>
                    <th>名稱已存在!! <?php header( "refresh:5;url=registerView.php" );?> </th>
                </tr>
                <tr>
                    <td>You'll be redirected in about 5 secs. If not, click <?php echo "<a href='registerView.php'>"?>here</a>.</td>
                </tr>
            </table>
            <!-- echo "名稱已存在!!"; -->
            <?php
            exit(0);
        } else {
            $sql = "INSERT INTO user(uid, pwd, uname, role, pic, score) VALUES (?, ?, ?, 0,'". $fileContents."', 0)";
            $stmt = mysqli_prepare($db, $sql); //prepare sql statement
            mysqli_stmt_bind_param($stmt, "sss", $userID, $passWord,$userName); //bind parameters with variables
            mysqli_stmt_execute($stmt);  //執行SQL
            ?>

            <!-- echo "註冊完成";
            header( "refresh:5;url=loginView.php" ); 
            echo '<br/>You\'ll be redirected in about 5 secs. If not, click <a href="loginView.php">here</a>.'; -->
            <table>
                <tr>
                    <th>註冊完成!! <?php header( "refresh:5;url=loginView.php" );?> </th>
                </tr>
                <tr>
                    <td>You'll be redirected in about 5 secs. If not, click <?php echo "<a href='loginView.php'>"?>here</a>.</td>
                </tr>
            </table>
<?php
        }
    } 
} 
?>
</div>
</body>
</html>
