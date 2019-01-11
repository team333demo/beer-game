<?php
require_once("dbconfig.php");
require_once("dOrderView.php");
// checkLogin();
$Tid = $_REQUEST['Tid'];
$currPeriod0= period($Tid);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<title>Distributor</title>
<!--<link rel="stylesheet" type="text/css" href="main.css">-->
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Cabin+Sketch');
#view{
width: 600px;
margin: 30px auto;
}
body{
    background-image: url('pic/playbackground.jpg');
    background-repeat:no-repeat;
    background-size:cover;
    background-attachment:fixed;
    
}
/*
body{
background-color:skyblue;
}*/
font{
font-size: 30pt; 
color: green; 
style: text-shadow:3px 3px 3px #cccccc;
font-family:'Cabin Sketch', cursive;
}
font1{
font-size: 14pt; 
color: green; 
style: text-shadow:3px 3px 3px #cccccc;
font-family:Microsoft JhengHei;
}

td{
width: 200px;
border: 3px solid green;
font-size:18;
color:green;
font-family:Microsoft JhengHei;
}
.table{
border: 3px solid green;
text-align:center;
}
hr{
border-top: 3px solid green;
}
#w{
    font-family:Microsoft JhengHei;
    color:	green;
}
</style>
</head>

<body>

<div id="view">
<font><p>Distributor </p></font>
<img src="pic/distributor.gif" style="height:150px;width:190px;position:absolute;left:850px;top:30px;"/>
<font1><h1>當前期數:第 <?php echo $currPeriod0 ?> 期</h1></font1>
<hr />
<form method = "POST" action = "distributorOrder.php">
    <input type = "hidden" name="opr" value="reset"/>
    <div style="text-align:right;"><input type=image src=pic/resetd.png width="50"height="50" onclick="submit()" title="重置"></div>
</form>
<table width="600" border="1" class="" >
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
    echo"<td>" , $rs['word'],"</td>";//需求量=下游訂單
    echo"<td>" , $rs['dord'],"</td>";
    echo"<td>" , $rs['cost'],"</td>";
    echo"<td>" , $total, "</td></tr>";
    }
?>
</table>
<br><br>
<hr/>
<div id="w">
	<?php
	echo $currPeriod0;
		if($currPeriod0==0){
			insertfirst($Tid);
			
		}
	if (checkstat($currPeriod0,$Tid)==1){
    echo "<form method = 'POST' action = 'distributorOrder.php ?Tid=$Tid'>
        <input type = 'hidden' name='curr' value=$currPeriod/>
        <input type = 'hidden' name='opr' value='play'/>
        <input type = 'text' name = 'num'>
        <input type=image src='pic/buy.png' width='56' height='50' onclick='submit()' title='下單'>
    </form>";
	}else{
		echo"等待其他玩家中……";
	}
	?>
    </div>	
</div>
</body>
</html>