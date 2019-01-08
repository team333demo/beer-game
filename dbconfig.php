<?php
session_start();

$host = 'localhost';
$user = 'root';
$pass = 'www2018';
$dbName = 'beer game';
$db = mysqli_connect($host, $user, $pass, $dbName) or die('Error with MySQL connection'); //跟MyMSQL連線並登入
mysqli_query($db,"SET NAMES utf8"); //選擇編碼

function checkLogin() {
    // echo $_SESSION["uid"];
    if ( ! isset($_SESSION["uid"]) or $_SESSION["uid"] == Null) {
            header("Location: loginView.php");
    }
}
?>