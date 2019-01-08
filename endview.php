<?php
require_once("dbconfig.php");
require_once("loginModel.php");
checkLogin();
$tid = $_REQUEST["tid"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<title>無標題文件</title>
<link rel="stylesheet" type="text/css" href="main.css">
<style type="text/css">
body {
    background-image: linear-gradient(to bottom right, #ffe6ff, #ffe6e6, #ffffe6, #e6ffe6, #e6ffff, #e6e6ff);
    font-family: 'VT323', monospace;
    background-image: url('pic/jiang0.jpg');
    background-position : 50% 100%;
    background-attachment:fixed;
    background-repeat:no-repeat;
    background-size: 100%100%;
    
}
p{
    font-family: 'Special Elite', cursive;
    font-size:40px;
    text-align: center;
}
fieldset {
    color: white;
    margin-left: auto;
    margin-right: auto;
    width: 700px;
    border-style: solid;
    font-weight: bold;
    border-color: rgba(0%,0%,0%,0);
    border-width: thick;
    flex-direction: column;
}
table {
    color: white;
    margin-left: auto;
    margin-right: auto;
    width: 800px;
    border-style: solid;
    font-weight: bold;
    border-color: rgba(0%,0%,0%,0);
    border-width: thick;
}
#preview_img {
    object-fit: contain;
}
#aaa{
    position:absolute;
    left:500px;
    text-align:center;
}


</style>
</head>

<body>

<fieldset>
<p>my garbage 軟工 !!<hr><div id="aaa">統計圖表-<?php echo "<a href='chartView_stock.php?tid=$tid' >"?>庫存</a>、<?php echo "<a href='chartView_less.php?tid=$tid' >"?>欠貨</a>、<?php echo "<a href='chartView_cost.php?tid=$tid' >"?>累計成本</a>　　<?php echo '<a href="playerRecorderView.php?uid=', getCurrentUser(), '">'?>參與紀錄</a>　　<?php echo '<a href="rankView.php?uid=', getCurrentUser(), '">'?>排行榜</a></div></hr></p>
</fieldset>
<hr />
<table width="200" border="1" class="">
  <tr>
    <td>排名</td>
    <td>隊伍名稱</td>
	<td>成本加總</td>
	<td>分數</td>
  </tr>
  
<?php
$sql = "select count(Tid) from `team` WHERE status= '遊戲中';";
$stmt = mysqli_prepare($db, $sql );
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); 
$rs = mysqli_fetch_assoc($result);
$count = $rs['count(Tid)']+1;

$sql = "select * from `team` WHERE status= '遊戲中'ORDER BY cost DESC";
$stmt = mysqli_prepare($db, $sql );
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); 

$i=0;
while (	$rs = mysqli_fetch_assoc($result)) {
    $i++;
    $count--;
    $Tid=$rs['Tid'];
    echo "<tr><td>", $i,"</td>";
	echo "<td>" , $rs['tname'],"</td>";
    echo"<td>" , $rs['cost'],"</td>";
    echo"<td>" , $count,"</td>";
    //輸入分數
    $sql = "update team set score=? where Tid=?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "ii",$count, $Tid);
    mysqli_stmt_execute($stmt); //執行SQL
} 
?>

</table>
<p> <a href="indexView.php" onclick="return confirm('使否確定要離開隊伍？');"style='background-color:white;box-shadow:1px 1px 3px gray;border:3px white dashed;border-radius:3px;font-size:20px;'> 
回到首頁 </a></p>

<!-- <a href="indexView.php"  onclick="return confirm('使否確定要離開隊伍？');">回首頁</a> -->


</body>
</html>
