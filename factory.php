<?php
require("dbconfig.php");
// checkLogin();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<title>無標題文件</title>
<link rel="stylesheet" type="text/css" href="main.css">

</head>

<body>

<p>Factory</p>
<hr />
<table width="200" border="1" class="">
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

$sql = "select * from `factory`;";
$stmt = mysqli_prepare($db, $sql );
mysqli_stmt_execute($stmt);
$total = 0;
$result = mysqli_stmt_get_result($stmt); 
while (	$rs = mysqli_fetch_assoc($result)) {
	$total = $total + $rs['cost'];
	echo "<tr><td>" , $rs['tid'],"</td>";
	echo"<td>" , $rs['period'],"</td>";
	echo"<td>" , $rs['stock'],"</td>";
	echo"<td>" , $rs['ord'],"</td>";
	echo"<td>" , $rs['arrival'],"</td>";
    echo"<td>" , $rs['cost'],"</td>";
    echo"<td>" , $total, "</td></tr>";
    }
?>
</table>
<hr/>
</body>
</html>
