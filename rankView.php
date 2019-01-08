<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet">
<title>排行榜</title>
<style type="text/css">
body {
    background-image: linear-gradient(to bottom right, #ffe6ff, #ffe6e6, #ffffe6, #e6ffe6, #e6ffff, #e6e6ff);
}
h1 {
    text-align: center;
    font-family: 微軟正黑體;
}
#beer {
    width: 300px;
    position: absolute;
    top: 250px;
    right: 70px;
}
table {
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    width: 500px;
}
#urank {
    width: 300px;
    position: absolute;
    top: 120px;
    left: 60px;
}
th {
    font-family: 'VT323', monospace;
    font-size: 50px;
}
td {
    font-family: 'VT323', monospace;
    font-size: 40px;
}
img {
    object-fit: contain;
}
a {
    /* font-family: 微軟正黑體; */
    text-decoration: none;
    font-size: 25px;
    color: darkorchid;
    font-weight: bold;
}
a:hover {
    color: pink;
}
#rank {
    color: red;
    font-weight: bold;
    font-size: 50px;
}
#photo {
    color: #FFBB00;
}
#name {
    color: #3CB371;
}
#score {
    color: blue;
}
#r {
    color: deeppink;
}
#n {
    color: 	#66DD00;
}
#s {
    color: #00BBFF;
    /* color: #777; */
}
</style>
</head>
<body>
<h1>排行榜</h1>
<img id='beer' src="pic/beer_rank.gif">
<?php
require_once("dbconfig.php");
checkLogin() ;
require_once("loginModel.php");
require_once("rankModel.php");
$userID = getCurrentUser();
$result = top10();
$uresult = userscore($userID);
$urank = userrank($userID);
?>
<table id='urank'>
    <tr>
        <td colspan = 3>
            <?php
                $img=$uresult["pic"];
                $logodata = $img;
                echo '<img id="preview_img" width="300" height="300" src="data:'.'jpeg'.';base64,' . $logodata . '" /></br>';
            ?>
        </td>
    </tr>
    <tr>
        <td id='rank'>rank</td>
        <td id='name'>name</td>
        <td id='score'>score</td>
    </tr>
    <tr>
        <td id='r'>
            <?php echo $urank; ?>
        </td>
        <td id='n'>
            <?php echo $uresult['uname']; ?>
        </td>
        <td id='s'>
            <?php echo $uresult['score']; ?>
        </td>
    </tr>
    <tr align='left'>
        <td colspan = 3>
            <a href="rankViewAll.php"> all rank </a>
        </td>
    </tr>
</table>
<table >
    <tr>
        <td id='rank'> rank </td><td id='photo'> photo </td><td id='name'> name </td><td id='score'> score </td>
    </tr>
<?php
$rank = 0;
while ($rs = mysqli_fetch_assoc($result)) {
    $rank++;
    $img=$rs["pic"];
    $logodata = $img;
    echo "<tr><th id='r'>", $rank,
        "</th><td>",'<img id="preview_img" width="50" height="50" src="data:'.'jpeg'.';base64,' . $logodata . '" /></br>',
        "</th><td id='n'>", $rs['uname'],
        "</td><td id='s'>", $rs['score'],
        "</td></tr>";
}
?>
</body>
</html>
