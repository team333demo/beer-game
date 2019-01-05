<?php
require_once("dbconfig.php");
require_once("wOrderView.php");
// checkLogin();
$currPeriod0= period();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<title>無標題文件</title>
<!--<link rel="stylesheet" type="text/css" href="main.css">-->
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Cabin+Sketch');
#view{
width: 400px;
margin: 30px auto;
}
font{
font-size: 28pt; 
color: #DED418; 
style: text-shadow:3px 3px 3px #cccccc;
font-family:'Cabin Sketch', cursive;
}
font1{
font-size: 12pt; 
color: #DED418; 
style: text-shadow:3px 3px 3px #cccccc;
font-family:Microsoft JhengHei;
}

td{
width: 200px;
border: 3px solid #DED418;
font-size:13;
color:black;
font-family:Microsoft JhengHei;
}
.table{
border: 3px solid #DED418;
}
</style>
</head>

<body>
<div id="view">
<font><p>Wholesaler </p></font>
<font1><h1>當前期數:第<?php echo $currPeriod0 ?>期</h1><font1>
<hr />
<form method = "POST" action = "wholesalerOrder.php">
    <input type = "hidden" name="opr" value="reset"/>
    <input type = "submit" value = "重置"> 
</form>
<table width="200" border="1" class="table" >
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
$result = orderlist();
while ( $rs = mysqli_fetch_assoc($result)) {
    
    $total = $total + $rs['cost'];
    $currPeriod = $rs['period'];
    echo "<tr><td>" , $rs['period'],"</td>";
    echo"<td>" , $rs['arrival'],"</td>";
    echo"<td>" , $rs['stock'],"</td>";
    echo"<td>" , $rs['rord'],"</td>";//需求量=下游訂單
    echo"<td>" , $rs['word'],"</td>";
    echo"<td>" , $rs['cost'],"</td>";
    echo"<td>" , $total, "</td></tr>";
    }
?>
</table>

<hr/>
    <form method = "POST" action = "wholesalerOrder.php">
        <input type = "hidden" name="curr" value="<?php echo $currPeriod ?>"/>
        <input type = "hidden" name="opr" value="play"/>
        <input type = "text" name = "num"><br>
        <input type = "submit" value = "下單"> 
    </form>
</div>
</body>
</html>