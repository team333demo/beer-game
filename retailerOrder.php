<?php
require_once("rOrderView.php");
$period=$_POST["curr"];
$opr = $_POST["opr"];
$num = (int)$_POST["num"];
$Tid = $_REQUEST["Tid"];
switch($opr){
    case "reset":
        init($Tid);
        break;
   case "play":
		update($num,$period,$Tid);	
		if ($period == 3){
			header("Location: endview.php?Tid=".$Tid);
		}else{
			addOrder($period+1,$Tid);     
			updatearrival($period,$Tid);
			updatesales($period,$Tid);
			header("Location: retailer.php?Tid=".$Tid);
		}	
		break;
}
?>