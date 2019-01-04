<?php
require("dbconfig.php");
require_once("loginModel.php");
$uname = getCurrentUserName() ;
// checkLogin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<title>indexView</title>
<link rel="stylesheet" type="text/css" href="main.css">

</head>

<body>
歷史紀錄<br/><br/>
<!-- <?php /*echo $uname;*/ ?><br/><br/> -->
<table width="600" border="1" class="">
  <tr>
    <td>隊伍名稱</td>
    <td>Factory</td>
    <td>Distributer</td>
    <td>Wholesaler</td>
	<td>Retailer</td>
    <td>分數</td>
	<td>狀態</td>
  </tr>
  
<?php
// echo getCurrentUser(); 
$sql = "select * from `team` WHERE status= '結束';";
$stmt = mysqli_prepare($db, $sql );
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); 

while (	$rs = mysqli_fetch_assoc($result)) {
    $id=$rs['Tid'];
    // $role = 0;
	echo "<tr><td>" , $rs['tname'],"</td>",
	"<td>" , $rs['factory'],"</td>",
	"<td>" , $rs['distributor'],"</td>",
	"<td>" , $rs['wholesaler'],"</td>",
	"<td>" , $rs['retailer'],"</td>",
    "<td>" , $rs['score'],"</td>",
    "<td>" , $rs['status'],"</td>";
} 
?>
</table>

</body>
</html>
