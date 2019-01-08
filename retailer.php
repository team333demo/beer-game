<?php
require_once("dbconfig.php");
require_once("rOrderView.php");
// checkLogin();
$Tid = $_REQUEST['Tid'];
$currPeriod0= period($Tid);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<title>無標題文件</title>
<link rel="stylesheet" type="text/css" href="main.css">

</head>

<body>

<p>Retailer </p>
<h1>當前期數:第<?php echo $currPeriod0 ?>期</h1>
<hr />
<form method = "POST" action = "retailerOrder.php">
    <input type = "hidden" name="opr" value="reset"/>
    <input type = "submit" value = "重置"> 
</form>
<table width="200" border="1" class="" >
  <tr>
    <td>週次</td>
    <td>到貨量</td>
    <td>庫存量</td>
    <td>需求量</td>
    <td>訂貨量</td>
    <td>當期成本</td>
    <td>成本累計</td>
  </tr>
  
<?php
$total = 0;
$currPeriod = 0;
$result = orderlist($Tid);
while ( $rs = mysqli_fetch_assoc($result)) {
    countstock($rs['period'],$Tid);
	countcost($rs['period'],$Tid);
    if($rs['period']>0){
		$total = $total + $rs['cost'];
	}
    $currPeriod = $rs['period'];
    echo "<tr><td>" , $rs['period'],"</td>";
    echo"<td>" , $rs['arrival'],"</td>";
    echo"<td>" , $rs['stock'],"</td>";
    echo"<td>" , $rs['demand'],"</td>";//需求量=下游訂單
    echo"<td>" , $rs['rord'],"</td>";
    echo"<td>" , $rs['cost'],"</td>";
    echo"<td>" , $total, "</td></tr>";
    }
?>
</table>

<hr/>
	<?php
	if (checkstat($currPeriod0,$Tid)==1){
    echo "<form method = 'POST' action = 'retailerOrder.php ?Tid=$Tid'>
        <input type = 'hidden' name='curr' value=$currPeriod/>
        <input type = 'hidden' name='opr' value='play'/>
        <input type = 'text' name = 'num'><br/>
        <input type = 'submit' value = '下單'> 
    </form>";
	}else{
		echo"等待其他玩家中";
	}
	?>
</body>
</html>