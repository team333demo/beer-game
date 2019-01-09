<?php
require_once("wOrderView.php");
$period=$_POST["curr"];
$opr = $_POST["opr"];
$num = (int)$_POST["num"];
$Tid = $_REQUEST["Tid"];
echo $Tid;
switch($opr){
    case "reset":
        init();		
        break;
    case "play":
		update($num,$period,$Tid);
		if ($period == 50)	{
			header("Location: endview.php?Tid=".$Tid);
		}else{
		addOrder($period+1,$Tid);        
		updatearrival($period,$Tid);
		updatesales($period,$Tid);
		header("Location: wholesaler.php?Tid=".$Tid);
		}		
		break;
}
?>