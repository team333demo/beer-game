<?php
require_once("factory.php");
//echo "123";
$period=$_POST["curr"];
$opr = $_POST["opr"];
$num = (int)$_POST["num"];
$Tid = $_REQUEST["Tid"];
// $Tid = 1;
echo $Tid;
switch($opr){
    case "reset":
        init($Tid);
        break;
   case "play":
		update($num,$period,$Tid);		
		addOrder($period+1,$Tid);        
		updatearrival($period,$Tid);
		updatesales($period,$Tid);
		break;
}
header("Location: factory.php?Tid=".$Tid);
 
?>