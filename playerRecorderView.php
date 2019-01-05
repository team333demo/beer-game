<?php
require_once("loginModel.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet">
<title>玩家歷史參與紀錄</title>
<style type="text/css">
body {
    background-image: linear-gradient(to bottom right, #ffe6ff, #ffe6e6, #ffffe6, #e6ffe6, #e6ffff, #e6e6ff);
}
h1 {
    font-family: "微軟正黑體";
    font-size: 50px;
    text-align: center;
}
span {
    color: 	dodgerblue;
}
#beer {
    width: 350px;
    position: absolute;
    top: 300px;
    right: 30px;
}
div {
    height: 460px;
    weight: 1300px;
}
table {
    margin-top: 50px;
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
#team {
    color: deeppink;
}
#role {
    color: darkviolet;
}
#score {
    color: blue;
}
#tn {
    color: hotpink;
}
#r {
    color: violet;
}
#s {
    color: #00BBFF;
}
</style>

</head>
<body>
<h1><span><?php echo getCurrentUserName()?></span>的歷史資料</h1>
<img id='beer' src="snoopy.gif">
<?php
require_once("dbconfig.php");
require_once("loginModel.php");
require_once("playerRecorderModel.php");
$userID = getCurrentUser();
$trs = allTid($userID);
?>
<div>
<table >
<tr><td id='team'>team</td><td id='role'>role</td><td id='score'>score</td></tr>
<?php
while ($tid =  mysqli_fetch_assoc($trs)) {
    $frs = factory($userID);
    $drs = distributor($userID);
    $wrs = wholesaler($userID);
    $rrs = retailer($userID);
    while ($f = mysqli_fetch_assoc($frs)) {
        if ($tid['Tid'] == $f['Tid']) {
            echo "<tr><td id='tn'>", $f['tname'],
                "</td><td id='r'>factory</td><td id='s'>", $f['score'],
                "</td></tr>";
        }
    }
    while ($d = mysqli_fetch_assoc($drs)) {
        if ($tid['Tid'] == $d['Tid']) {
            echo "<tr><td id='tn'>", $d['tname'],
                "</td><td id='r'>distributor</td><td id='s'>", $d['score'],
                "</td></tr>";
        }
    }
    while ($w = mysqli_fetch_assoc($wrs)) {
        if ($tid['Tid'] == $w['Tid']) {
            echo "<tr><td id='tn'>", $w['tname'],
                "</td><td id='r'>wholesaler</td><td id='s'>", $w['score'],
                "</td></tr>";
        }
    }
    while ($r = mysqli_fetch_assoc($rrs)) {
        if ($tid['Tid'] == $r['Tid']) {
            echo "<tr><td id='tn'>", $r['tname'],
                "</td><td id='r'>retailer</td><td id='s'>", $r['score'],
                "</td></tr>";
        }
    }
}
?>
</table>
</div>
</body>
</html>
