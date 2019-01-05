<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet">
<title>修改玩家資訊</title>
<style type="text/css">
body {
    background-image: linear-gradient(to bottom right, #ffe6ff, #ffe6e6, #ffffe6, #e6ffe6, #e6ffff, #e6e6ff);
}
div {
    height: 610px;
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
require_once("loginModel.php");

$userID = $_POST['uid'];
$passWord = $_POST['pwd'];
$userName = $_POST['uname'];
$userName_origin = getCurrentUserName();
//取得上傳檔案資訊
$filename=$_FILES['img']['name'];
$tmpname=$_FILES['img']['tmp_name'];
$filetype=$_FILES['img']['type'];
$filesize=$_FILES['img']['size'];
$fileContents;
$sql = "select pic from user where uid = ?";
$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_bind_param($stmt, "s", $userID);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); 
$pic = mysqli_fetch_array($result);

if ($_FILES["img"]["size"] > 0 ) {
         //開啟圖片檔
         $file = fopen($_FILES["img"]["tmp_name"], "rb");
         // 讀入圖片檔資料
         $fileContents = fread($file, filesize($_FILES["img"]["tmp_name"])); 
         //關閉圖片檔
         fclose($file);
         // 圖片檔案資料編碼
         $fileContents = base64_encode($fileContents);
} else {
    $fileContents = $pic['pic'];
}

$sqluname = "SELECT uname FROM user where uname = '".$userName."'";
// 檢查名稱是否存在
if ($userName == $userName_origin) {
    $sql = "UPDATE user SET pwd = ?, uname=?, pic='". $fileContents."' where uid = '". $userID."'";
    $stmt = mysqli_prepare($db, $sql); //prepare sql statement
    mysqli_stmt_bind_param($stmt, "ss", $passWord,$userName); //bind parameters with variables
    mysqli_stmt_execute($stmt);  //執行SQL
    // echo "修改完成";
    // header( "refresh:5;url=indexView.php" ); 
    // echo '<br/>You\'ll be redirected in about 5 secs. If not, click <a href="indexView.php">here</a>.';
?>

<table>
    <tr>
        <th>修改完成 <?php header( "refresh:5;url=indexView.php" );?></th>
    </tr>
    <tr>
        <td>You'll be redirected in about 5 secs. If not, click <a href="indexView.php">here</td>.</p>
    </tr>
</table>

<?php
} else if ($result = mysqli_query($db,$sqluname)) {
    if ($row=mysqli_fetch_array($result)) {
        // echo "名稱已存在!!";
        // header( "refresh:5;url=updateUserDataView.php?uid=$userID" ); 
        // echo '<br/>You\'ll be redirected in about 5 secs. If not, click <a href="indexView.php">here</a>.';
    ?>
        <table>
            <tr>
                <th>名稱已存在!! <?php header( "refresh:5;url=updateUserDataView.php?uid=$userID" );?> </th>
            </tr>
            <tr>
                <td>You'll be redirected in about 5 secs. If not, click <?php echo "<a href='updateUserDataView.php?uid=$userID'>"?>here</a>.</td>
            </tr>
        </table>
    <?php
        exit(0);
    } else {
        $sql = "UPDATE user SET pwd = ?, uname=?, pic='". $fileContents."' where uid = '". $userID."'";
        $stmt = mysqli_prepare($db, $sql); //prepare sql statement
        mysqli_stmt_bind_param($stmt, "ss", $passWord,$userName); //bind parameters with variables
        mysqli_stmt_execute($stmt);  //執行SQL
    ?>
        <table>
            <tr>
                <th>修改完成 <?php header( "refresh:5;url=indexView.php" );?></th>
            </tr>
            <tr>
                <td>You'll be redirected in about 5 secs. If not, click <a href="indexView.php">here</td>.</p>
            </tr>
        </table>
 <?php
        // echo "修改完成";
        // header( "refresh:5;url=indexView.php" ); 
        // echo '<br/>You\'ll be redirected in about 5 secs. If not, click <a href="indexView.php">here</a>.';
    }
} 

?> 
</div>
</body>
</html>
