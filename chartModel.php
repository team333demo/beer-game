<?php
require_once("dbconfig.php");
function factory($tid) {
    global $db;
    $sql = "select period, stock, cost from factory where Tid = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i", $tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}
function distributor($tid) {
    global $db;
    $sql = "select period, stock, cost from distributor where Tid = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i", $tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}
function wholesaler($tid) {
    global $db;
    $sql = "select period, stock, cost from wholesaler where Tid = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i", $tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}
function retailer($tid) {
    global $db;
    $sql = "select period, stock, cost from retailer where Tid = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i", $tid);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}
?>