<?php
require_once("factory.php");
//echo "123";
$period=$_POST["curr"];
$opr = $_POST["opr"];
$num = (int)$_POST["num"];
$Tid = $_REQUEST["Tid"];
//$Tid = 1;
echo $Tid;
switch($opr){
    case "reset":
        init();		
        break;
    case "play":
		update($num,$period,$Tid);
		if ($period == 10)	{
			header("Location: disband.php?Tid=".$Tid);
		}else{
		addOrder($period+1,$Tid);        
		updatearrival($period,$Tid);
		updatesales($period,$Tid);
			header("Location: factory.php?Tid=".$Tid);
		}
		
 
		break;
}
header("Location: factory.php?Tid=".$Tid);
 
?>