<?php
require("dbconfig.php");
// checkLogin();
?>
<?php 
echo "當前時間：";
echo "";
//echo time();
//echo "<br>";
$datetime = date ("Y-m-d H:i:s" , mktime(date('H')+7, date('i'), date('s'), date('m'), date('d'), date('Y'))) ; 
echo $datetime ;
echo "<br>";
echo ("<script type=\"text/javascript\">");
echo ("function fresh_page()"); 
echo ("{");
echo ("window.location.reload();");
echo ("}"); 
echo ("setTimeout('fresh_page()',1000);"); 
echo ("</script>");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<title>無標題文件</title>
<link rel="stylesheet" type="text/css" href="main.css">

</head>

<body>

<p>my garbage 軟工 !! 　　統計圖表 參與紀錄 排行榜</p>
<hr />
<table width="200" border="1" class="">
  <tr>
    <td>隊伍名稱</td>
    <td>Factory</td>
    <td>Distributer</td>
    <td>Wholesaler</td>
	<td>Retailer</td>
	<td>成本加總</td>
	<td>排名</td>
  </tr>
  
<?php

$sql = "select * from `team` WHERE status= '等待中'or status= '完成'or status= '遊戲中';";
$stmt = mysqli_prepare($db, $sql );
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); 

while (	$rs = mysqli_fetch_assoc($result)) {
	
	echo "<tr><td>" , $rs['tname'],"</td>";
	if($rs['factory'] != NULL)
		echo"<td>" , $rs['factory'],"</td>";
    else 
        echo"<td>join</td>";
	if($rs['distributor'] != NULL)
		echo"<td>" , $rs['distributor'],"</td>";
    else 
        echo"<td>join</td>";
    if($rs['wholesaler'] != NULL)
		echo"<td>" , $rs['wholesaler'],"</td>";
    else 
        echo"<td>join</td>";
    if($rs['retailer'] != NULL)
		echo"<td>" , $rs['retailer'],"</td>";
    else 
        echo"<td>join</td>";
    if($rs['status'] != NULL)
        echo"<td>" , $rs['status'],"</td>";
    else 
        echo"<td></td>";
    
	$id=$rs['Tid'];
//$category=$rs['category'];
// $likes=$rs['likes'];
//echo '<td><a href="03.delete.php?id=', $rs['id'], '">刪</a> </td></tr>';
// echo "<td><a href='05.like.php?id=$id'>讚($likes)</a>";
// echo " - <a href='03.delete.php?id=$id'>刪</a>";
// echo " - <a href='04.editform.php?id=$id'>改</a> </td></tr>";
} 
?>

</table>
<p> <a href="IndexView.php">回到首頁</a></p>
</body>
</html>
