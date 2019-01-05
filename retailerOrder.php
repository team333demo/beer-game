<?php
require_once("rOrderView.php");
$period=$_POST["curr"];
$opr = $_POST["opr"];
$num = (int)$_POST["num"];
$Tid =0;
$Tid = $Tid+Tid();
switch($opr){
    case "reset":
        init();
		
        break;
    case "play":
		update($num,$period,$Tid);		
		addOrder($period+1,$Tid);        
		updatearrival($period,$Tid);
		updatesales($period,$Tid);
		break;
}
header("Location: retailer.php");
 
?>