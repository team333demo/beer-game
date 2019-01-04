<?php
require_once("rOrderView.php");
$period=$_POST["curr"];
$opr = $_POST["opr"];
$num = (int)$_POST["num"];
switch($opr){
    case "reset":
        init();
		
        break;
    case "play":
		update($num,$period);
		//if(checkstat()!=1){
			addOrder($period+1);
		//}
        break;
}
header("Location: retailer.php");
 
?>