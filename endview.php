<?php
require("dbconfig.php");
// checkLogin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<title>無標題文件</title>
<link rel="stylesheet" type="text/css" href="main.css">
<style type="text/css">
body {
     background-image: linear-gradient(to bottom right, #ffe6ff, #ffe6e6, #ffffe6, #e6ffe6, #e6ffff, #e6e6ff);
    font-family: 'VT323', monospace;
    background-image: url('jiang.jpg');
    background-position : 50% 100%;
    background-attachment:fixed;
    background-repeat:no-repeat;
    background-size: cover;
    
}
#time{
    color=white;
}
p{
    font-family: "微軟正黑體";
    font-size:20px;
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
<p>my garbage 軟工 !!<hr><div id="aaa">統計圖表　　參與紀錄　　排行榜</div></hr></p>
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
    $id=$rs['Tid'];
    echo "<tr><td>", $i,"</td>";
	echo "<td>" , $rs['tname'],"</td>";
    echo"<td>" , $rs['cost'],"</td>";
    echo"<td>" , $count,"</td>";
} 
?>

</table>
<p> <a href="IndexView.php" style='background-color:white;box-shadow:1px 1px 3px gray;border:3px white dashed;border-radius:5px;'> 回到首頁 </a></p>
</body>
</html>
