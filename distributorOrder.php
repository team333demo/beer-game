<?php
require_once("dOrderView.php");
//require_once("wOrderView.php");
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
		updatearrival($period);
		updatesales($period);
		break;
}
header("Location: distributor.php");
 
?>