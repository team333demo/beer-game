<?php
require_once("fOrderView.php");
$period=$_POST["curr"];
$opr = $_POST["opr"];
$num = (int)$_POST["num"];
switch($opr){
    case "reset":
        init();
        break;
    case "play":
		update($num,$period);
        addOrder($period+1);
        break;
}
header("Location: factory.php");
 
?>