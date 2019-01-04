<?php
require_once("dbconfig.php");
function allrank() {
    global $db;
    $sql = "select uname,uid,score from user order by score desc";
    $stmt = mysqli_prepare($db, $sql);
    //mysqli_stmt_bind_param($stmt, "s", $userID);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}
function userrank($uid) {
    $rank = 0;
    $result = allrank();
    while ($rs = mysqli_fetch_assoc($result)) {
        $rank++;
        if ($uid == $rs['uid'])
            break;
    }
    return $rank;
}
function userscore($uid) {
    global $db;
    $sql = "select uname,score from user where uid = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "s", $uid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    $rs = mysqli_fetch_assoc($result);
    return $rs;
}
?>