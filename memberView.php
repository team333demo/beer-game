<?php
require("teamModel.php");
// checkLogin();
// $result=getPrdList(); 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>

<!-- <p>XXX,你好!</p>  -->
<hr />
<table width="500" border="1" class="">
  <tr>
    <!-- <td>id</td> -->
    <td>Team Name</td>
    <td>Factory</td>
    <td>Distributor</td>
    <td>Wholesaler</td>
    <td>Retailer</td>
    <td>狀態</td>
  </tr>
<?php
$result=teamGetAll();
while (	$rs = mysqli_fetch_assoc($result)) {

	// echo "<tr><td>" , $rs['tid'] ,
	echo"</td><td>" , $rs['tname'],
  "</td><td>" , //$rs['Factory'],
  "</td><td>" , //$rs['Distributor'],
  "</td><td>" , //$rs['Wholesaler'],
  "</td><td>" , //$rs['Retailer'],
  "</td><td>" , $rs['status'];
$id=$rs['tid'];
//echo '<td><a href="03.delete.php?id=', $rs['id'], '">刪</a> </td></tr>';
// echo "<td><a href='add2Cart.php?id=$id'>加</a>";
// echo " - <a href='04.editform.php?id=$id'>改</a> </td></tr>";

}
?>
</table>
<?php
echo "<a href='addteam.php?id=$id'>新建隊伍</a>";
?>
</body>
</html>