<?php
require("dbconfig.php");
checkLogin() ;
require_once("loginModel.php");
$uname = getCurrentUserName() ;
// checkLogin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
<!-- <link rel="stylesheet" type="text/css" href="main.css"> -->
</head>
<style type="text/css">
  body {
    width: 700px; margin:30px auto;
    opacity:0.9;
    background-color: #F2FFFF;
    text-align:center;
  }
  #content {
    color:black; 
    background-color:rgb(255, 239, 204); 
    border:2px outset #ccc; 
    padding:10px;
  }
  #til {
    font-weight: bold;
    position:absolute;
    left:90px;
    font-family: "微軟正黑體";
    color:black;
    font-size: 20px;
    text-align:middle;
    /* line-height:100px; */
  }
  #w{
    font-family: "微軟正黑體";
    font-size: 10px;
  }
  table {
    margin: 10px auto; border: 1px outset #ccc; width:600px;
  }
  #b{
    position:absolute;
    left:100px;
  }
  a {
    display:block;
    /* background-image:url(beer.png); */
    background-repeat:no-repeat;
    width:64px;
    line-height:40px;
    text-indent:1px;
    color:black;
  }
  a:hover {
    /* background-image:url(beer.png); */
    font-weight:bold;
    color:green;
  }
  #h{
    position:absolute;
    left:0px;
  }
</style>


<div id="til"  class="div-left" >
<?php echo 'Admin : ',$uname; ?>
<!-- <p>my garbage 軟工 !!</p> -->
<a href = "setdemand.php"><img src="pic/beer2.png" width="150"height="110"></a>　　　
<a href ='history.php'><img src="pic/book.png"id="h" width="150" height="100"></a>
<a href ='logout.php'><img src="pic/book.png"id="h" width="150" height="100"></a>
</div>
<body>
<div id="content">
<table width="600" border="1">
  <tr id="w">
    <td>隊伍名稱</td>
    <td>Factory</td>
    <td>Distributer</td>
    <td>Wholesaler</td>
	  <td>Retailer</td>
	  <td>狀態</td>
    <!-- <td>查看需求</td>     -->
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
  // echo"<td><a href = 'setdemand.php?Tid=$Tid'>設定</a></td>";
    
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
<!-- <div id="b">

</div> -->
</body>
</html>
