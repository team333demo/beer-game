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
		update($num,$period,$Tid);
		if ($period == 3)	{
			header("Location: endView.php");
		}else{
		addOrder($period+1,$Tid);        
		updatearrival($period,$Tid);
		updatesales($period,$Tid);
			
		}
		
 
		break;
}
header("Location: distributor.php?Tid=".$Tid);
?>