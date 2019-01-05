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
  /* a {
    display:block;
    background-image:url(pic/beer.png);
    background-repeat:no-repeat;
    width:64px;
    line-height:64px;
    text-indent:1px;
    color:black;
  }
  a:hover {
    background-image:url(pic/bottom-2.png);
    font-weight:bold;
    color:green;
  } */
  #h{
    position:absolute;
    left:25px;
  }
</style>
<body>
<div id="til"  class="div-left">
<?php echo 'Admin : ',$uname; ?><br><br>
歷史紀錄<br><br>
<a href ='adminView.php'>往返</a>
</div>
<div id="content">
<table width="600" border="1" class="">
  <tr id="w">
    <td>隊伍名稱</td>
    <td>Factory</td>
    <td>Distributer</td>
    <td>Wholesaler</td>
	<td>Retailer</td>
    <td>分數</td>
	<td>狀態</td>
  </tr>
</div>
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
