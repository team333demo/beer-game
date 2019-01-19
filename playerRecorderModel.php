<?php
require_once("dbconfig.php");

function factory($userName) {
    global $db;
    $sql = "SELECT `Tid`, `tname`, `factory`, `score` FROM team 
    WHERE factory = ? and status='結束' order by Tid desc";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "s", $userName);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}
function distributor($userName) {
    global $db;
    $sql = "SELECT `Tid`, `tname`, `distributor`, `score` FROM `team` 
    WHERE distributor = ? and status='結束' order by Tid desc";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "s", $userName);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}
function wholesaler($userName) {
    global $db;
    $sql = "SELECT `Tid`, `tname`, `wholesaler`, `score` FROM `team`   
    WHERE wholesaler = ? and status='結束' order by Tid desc";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "s", $userName);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}
function retailer($userName) {
    global $db;
    $sql = "SELECT `Tid`, `tname`, `retailer`, `score` FROM `team`  
    WHERE retailer = ? and status='結束' order by Tid desc";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "s", $userName);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}
function allTid($userName) {
    global $db;
    $sql = "SELECT `Tid`, `tname` FROM `team`  
    WHERE (factory = ? or distributor = ? or wholesaler = ? or retailer = ?) and status='結束' order by Tid desc";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $userName, $userName, $userName, $userName);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}
?>