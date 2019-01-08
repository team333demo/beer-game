<?php
require_once("dbconfig.php");
require_once("wOrderView.php");
// checkLogin();
$Tid = $_REQUEST['Tid'];
$currPeriod0= period($Tid);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<title>Wholesaler</title>
<!--<link rel="stylesheet" type="text/css" href="main.css">-->
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Cabin+Sketch');
#view{
width: 400px;
margin: 30px auto;
}
body{
    background-image: url('pic/playbackground.jpg');
    background-repeat:no-repeat;
    background-size:cover;
    background-attachment:fixed;
    
}
/*body{
background-color:skyblue;
}*/
font{
font-size: 30pt; 
color: #4d3300; 
style: text-shadow:3px 3px 3px #cccccc;
font-family:'Cabin Sketch', cursive;
}
font1{
font-size: 14pt; 
color: #4d3300; 
style: text-shadow:3px 3px 3px #cccccc;
font-family:Microsoft JhengHei;
}

td{
width: 200px;
border: 3px solid #4d3300;
font-size:18;
color:#4d3300;
font-family:Microsoft JhengHei;
}
.table{
border: 3px solid #4d3300;
text-align:center;
}
hr{
border: 3px solid #4d3300;
}
#w{
    font-family:Microsoft JhengHei;
    color:		#4d3300;
}
</style>
</head>

<body>

<div id="view">
<font><p>Wholesaler </p></font>
<img src="pic/wholesaler.png" style="height:150px;width:190px;position:absolute;left:800px;top:30px;"/>
<font1><h1>當前期數:第 <?php echo $currPeriod0 ?> 期</h1></font1>
<hr />
<form method = "POST" action = "wholesalerOrder.php">
    <input type = "hidden" name="opr" value="reset"/>
    <div style="text-align:right;"><input type=image src=pic/resetw.png width="50"height="50" onclick="submit()" title="重置"></div>
</form>
<table width="550" border="1" class="table" >
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
    echo"<td>" , $rs['rord'],"</td>";//需求量=下游訂單
    echo"<td>" , $rs['word'],"</td>";
    echo"<td>" , $rs['cost'],"</td>";
    echo"<td>" , $total, "</td></tr>";
    }
?>
</table>
<br><br>
<hr/>
<br>
<div id="w">
    <?php
	if (checkstat($currPeriod0,$Tid)==1){
    echo "<form method = 'POST' action = 'wholesalerOrder.php?Tid=$Tid'>
        <input type = 'hidden' name='curr' value=$currPeriod/>
        <input type = 'hidden' name='opr' value='play'/>
        <input type = 'text' name = 'num'><br/>
        <input type = 'submit' value = '下單'> 
    </form>";
	}else{
		echo"等待其他玩家中……";
	}
	?>
    </div>
</div>
</body>
</html>