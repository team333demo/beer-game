<?php
require("dbconfig.php");
require_once("loginModel.php");
$uname = getCurrentUserName() ;
// checkLogin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<link rel="stylesheet" type="text/css" href="main.css">
<style type="text/css">
  body {
    width: 500px; margin:100px auto;
    background-repeat:no-repeat;
    background-image:url(pic/beer2.jpg);
    background-size:100% 100%;
    opacity:0.9;
    background-color: #F2FFFF;
  }
  #content {
    color:black; background-color:rgb(255, 239, 204); border:2px outset #ccc; padding:20px;
  }
  #til {
    font-family: "微軟正黑體";
    color:ivory;
    font-size: 20px;
  }
  #w{
    font-family: "微軟正黑體";
    font-size: 10px;
  }
  table {
    margin: 10px auto; border: 1px outset #ccc; width:400px;
  }
  td {
    text-align;
  }
  ul a {
    display:block;
    background-image:url(pic/beer.png);
    background-repeat:no-repeat;
    width:64px;
    line-height:64px;
    text-indent:1px;
    color:black;
  }
  ul a:hover {
    background-image:url(pic/bottom-2.png);
    font-weight:bold;
    color:green;
  }
</style>
</head>
<body>
<div id="til">
<?php echo 'Welcome User : ',$uname; ?>
<p>my garbage 軟工 !!</p>
</div>
<hr />
<div id="content">

<table width="500" border="1">
  <tr id="w">
    <td>隊伍名稱</td>
    <td>Factory</td>
    <td>Distributer</td>
    <td>Wholesaler</td>
	  <td>Retailer</td>
	  <td>狀態</td>
    <td>設定需求</td>   
    <td>設定需求狀態</td>  
  </tr>
</div>
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
    echo"<td>" , $rs['demandstatus'],"</td>";
    
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
<ul>
<a href ='startgame.php'>startgame</a>　
<a href ='history.php'>historyteam</a>
</ul>
</body>
</html>
