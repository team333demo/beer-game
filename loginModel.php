<?php
require_once("dbconfig.php");
function login($uid, $pwd) 
{
    global $db;
    $_SESSION['uid'] ="";
    $_SESSION['role'] = '';
    $_SESSION['uname'] = '';
    if ($uid> " ") {
        $sql = "select * from user where uid=? and pwd=? ";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $uid, $pwd);
        mysqli_stmt_execute($stmt); //執行SQL
        $result = mysqli_stmt_get_result($stmt); 
        $r=mysqli_fetch_assoc($result);
        if($r) {
			$_SESSION['uid'] = $r['uid'];
            $_SESSION['role'] = $r['role'];
            $_SESSION['uname'] = $r['uname'];
            return 1;
        } else {
            return 0;
        } 
    } 
}

function getRole() 
{
    return $_SESSION['role'];
}

function getCurrentUser() 
{
    return $_SESSION['uid'];
}

function getCurrentUserName() 
{
    return $_SESSION['uname'];
}
?>
