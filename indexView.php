<?php
require("dbconfig.php");
checkLogin() ;
require_once("loginModel.php");
$uname = getCurrentUserName() ;
$uid = getCurrentUser();

// checkLogin(); 
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
echo ("setTimeout('fresh_page()',10000);"); 
echo ("</script>");

echo ("</script>");

$sql = "select uname,status,role.Tid,r from `team`,role,user WHERE role.Tid=team.Tid and role.uid=user.uid and (status= '等待中'or status= '完成' or status= '遊戲中') and uname=?";
$stmt = mysqli_prepare($db, $sql );
mysqli_stmt_bind_param($stmt, "s",$uname);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); 
$rs = mysqli_fetch_assoc($result);

$Tid=$rs['Tid'];
// echo $Tid;
if($rs['status'] =='遊戲中'){
    if($rs['r']==1){
        header('Location:factoryOrder.php?Tid='.$Tid);
    }
    if($rs['r']==2){
        header('Location:distributorOrder.php?Tid='.$Tid);
    }
    if($rs['r']==3){
        header('Location:wholesalerOrder.php?Tid='.$Tid);
    }
    if($rs['r']==4){
        header('Location:retailerOrder.php?Tid='.$Tid);
    }
    
    //判斷是什麼角色並前往(Tid,role)
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<title>開始畫面</title>
<!--<link rel="stylesheet" type="text/css" href="main.css">-->
<style type="text/css">
body {
    background-image: linear-gradient(to bottom right, #ffe6ff, #ffe6e6, #ffffe6, #e6ffe6, #e6ffff, #e6e6ff);
    font-family: 'VT323', monospace;
    background-image: url('pic/city.jpg');
    background-position : 50% 100%;
    background-attachment:fixed;
    background-repeat:no-repeat;
    background-size:cover;
}
p{
    font-family: 'Special Elite', cursive;
    font-size:40px;
    text-align: center;
}
fieldset {
    margin-left: auto;
    margin-right: auto;
    width: 950px;
    border-style: solid;
    font-weight: bold;
    border-color: rgba(0%,0%,0%,0);
    border-width: thick;
    flex-direction: column;
    position: absolute;
    top:40px;
    left:270px;
}
table {
    margin-left: auto;
    margin-right: auto;
    width: 1050px;
    border-style: solid;
    font-weight: bold;
    border-color: rgba(0%,0%,0%,0);
    border-width: thick;
}
#preview_img {
    object-fit: contain;
}
#a{
    position:absolute;
    left:20px;
    font-family: "微軟正黑體";
    color:brown;
}
#name{
    left:20px;
    font-family: "微軟正黑體";
    color:brown;
}

</style>
</head>

<body>
<br>
<div id="name"  class="div-left" >
<?php echo $uname; 
$sql = "select * from user where uname= ?";
$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_bind_param($stmt, "s", $uname);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); 
$rs = mysqli_fetch_array($result);
$img=$rs["pic"];
$logodata = $img;
echo '<img id="preview_img" width="70" height="70" src="data:'.'jpeg'.';base64,' . $logodata . '" /> ,歡迎您!<br><br>';
?>
</div><br>
<fieldset>
<p>🍻 BEER GAME 🍻 </p>
<hr>
</fieldset>
<table width="500" border="1" class="">
  <tr>
    <td>隊伍名稱</td>
    <td>Factory</td>
    <td>Distributer</td>
    <td>Wholesaler</td>
	<td>Retailer</td>
	<td>狀態</td>
  </tr>
<div id="a"  class="div-left" >
<?php
// echo getCurrentUser(); 
echo '<a href="updateUserDataView.php?uid=', getCurrentUser(), '"><img src="pic/cloud1.png" width="120"height="60"></a><br>';
echo '<a href="01.addform.php?"><img src="pic/cloud2.png" width="120"height="60"></a><br>';
echo '<a href="rankView.php?uid=', getCurrentUser(), '"><img src="pic/cloud3.png" width="120"height="60"></a>';
echo '<br/><a href="logout.php">登出</a>';
$sql = "select * from `team` WHERE status= '等待中'or status= '完成'or status= '遊戲中';";
$stmt = mysqli_prepare($db, $sql );
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); 

while (	$rs = mysqli_fetch_assoc($result)) {
    $id=$rs['Tid'];
    // $role = 0;
	echo "<tr><td>" , $rs['tname'],"</td>";
	if($rs['factory'] != NULL)
		echo"<td>" , $rs['factory'],"</td>";
    else 
        echo"<td><a href='join.php ?Tid=$id&role=1'>join</a></td>";
	if($rs['distributor'] != NULL)
		echo"<td>" , $rs['distributor'],"</td>";
    else 
        echo"<td><a href='join.php ?Tid=$id&role=2'>join</a></td>";
    if($rs['wholesaler'] != NULL)
		echo"<td>" , $rs['wholesaler'],"</td>";
    else 
        echo"<td><a href='join.php ?Tid=$id&role=3'>join</a></td>";
    if($rs['retailer'] != NULL)
		echo"<td>" , $rs['retailer'],"</td>";
    else 
        echo"<td><a href='join.php ?Tid=$id&role=4'>join</a></td>";
    if($rs['status'] != NULL)
        echo"<td>" , $rs['status'],"</td>";
    else 
        echo"<td></td>";
} 
?>
</div>
</table>

</body>
</html>
