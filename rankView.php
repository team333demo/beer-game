<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet">
<title>排行榜</title>
<style type="text/css">
table {
    margin-top: 150px;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    width: 500px;
}
th {
    font-family: 'VT323', monospace;
    font-size: 50px;
}
td {
    font-family: 'VT323', monospace;
    font-size: 40px;
}
</style>

</head>
<body>
<?php
require_once("dbconfig.php");
require_once("loginModel.php");
require_once("rankModel.php");
$userID = getCurrentUser();
$result = allrank();
$uresult = userscore($userID);
$urank = userrank($userID);
?>
<table >
<?php
echo "<tr><th>", $urank,
    "</th><td>", $uresult['uname'],
    "</td><td>", $uresult['score'],
    "</td></tr></table><table>";
$rank = 0;
while ($rs = mysqli_fetch_assoc($result)) {
    $rank++;
    echo "<tr><th>", $rank,
        "</th><td>", $rs['uname'],
        "</td><td>", $rs['score'],
        "</td></tr>";
}
?>
</body>
</html>
