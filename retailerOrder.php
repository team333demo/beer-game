<?php
require_once("rOrderView.php");
$opr = $_POST["opr"];
$curr = (int)$_POST["curr"];
$num = (int)$_POST["num"];
switch($opr){
    case "reset":
        init();
        break;
    case "play":
        period();
        addOrder($num,$curr);
        break;
}
header("Location: retailer.php");

 
?>