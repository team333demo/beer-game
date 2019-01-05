<?php
require_once("dbconfig.php");

function factory($uid) {
    global $db;
    $sql = "SELECT `Tid`, `tname`, `factory`, `score` FROM team 
    WHERE factory = ? and status='結束' order by Tid desc";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "s", $uid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}
function distributor($uid) {
    global $db;
    $sql = "SELECT `Tid`, `tname`, `distributor`, `score` FROM `team` 
    WHERE distributor = ?  and status='結束' order by Tid desc";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "s", $uid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}
function wholesaler($uid) {
    global $db;
    $sql = "SELECT `Tid`, `tname`, `wholesaler`, `score` FROM `team`   
    WHERE wholesaler = ? and status='結束' order by Tid desc";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "s", $uid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}
function retailer($uid) {
    global $db;
    $sql = "SELECT `Tid`, `tname`, `retailer`, `score` FROM `team`  
    WHERE retailer = ? and status='結束' order by Tid desc";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "s", $uid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}
function allTid($uid) {
    global $db;
    $sql = "SELECT `Tid`, `tname` FROM `team`  
    WHERE (factory = ? or distributor = ? or wholesaler = ? or retailer = ?) and status='結束' order by Tid desc";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $uid, $uid, $uid, $uid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}
?>