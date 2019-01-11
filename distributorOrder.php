<?php
require_once("dOrderView.php");
//require_once("wOrderView.php");
$period=$_POST["curr"];
$opr = $_POST["opr"];
$num = (int)$_POST["num"];
$Tid = $_REQUEST["Tid"];
switch($opr){
    case "reset":
        init();		
        break;
    case "play":
	// echo $period;

		update($num,$period,$Tid);
		if ($period == 3)	{
			header("Location: endView.php?Tid=".$Tid);
		}else{
		addOrder($period+1,$Tid);        
		updatearrival($period,$Tid);
		updatesales($period,$Tid);
		header("Location: distributor.php?Tid=$Tid");
		}		
		break;
}
 
?>