<?php
require("dbconfig.php");
// checkLogin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>

<p>my garbage 軟工 !!</p>
<hr />
<a href="">  </a>
<table width="600" border="1" class="">
  <tr>
    <td>隊伍名稱</td>
    <td>Factory</td>
    <td>Distributer</td>
    <td>Wholesaler</td>
	<td>Retailer</td>
	<td>狀態</td>
    <td>設定需求</td>    
  </tr>
<?php

$sql = "select * from team WHERE status= '等待中'or status= '完成'or status= '遊戲中';";
$stmt = mysqli_prepare($db, $sql );
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); 

while (	$rs = mysqli_fetch_assoc($result)) {
	$Tid = $rs['Tid'];
	echo "<tr><td>" , $rs['tname'],"</td>";
	echo"<td>" , $rs['factory'],"</td>";
	echo"<td>" , $rs['distributor'],"</td>";
	echo"<td>" , $rs['wholesaler'],"</td>";
	echo"<td>" , $rs['retailer'],"</td>";     
    echo"<td>" , $rs['status'],"</td>";
    echo"<td><a href = 'setdemand.php?Tid=$Tid'>設定</a></td>";
    
	// $id=$rs['Tid'];
//$category=$rs['category'];
// $likes=$rs['likes'];
//echo '<td><a href="03.delete.php?id=', $rs['id'], '">刪</a> </td></tr>';
// echo "<td><a href='05.like.php?id=$id'>讚($likes)</a>";
// echo " - <a href='03.delete.php?id=$id'>刪</a>";
// echo " - <a href='04.editform.php?id=$id'>改</a> </td></tr>";

}
?>
</table>
<a href ='startgame.php'>開始遊戲</a>
</body>
</html>
