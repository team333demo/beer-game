<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet">
<title>修改玩家資訊</title>
<style type="text/css">
body {
    font-family: 'VT323', monospace;
}
h1 {
    font-family: "微軟正黑體";
    font-size: 50px;
    text-align: center;
}
fieldset {
    margin-left: auto;
    margin-right: auto;
    width: 80%;
    border-color: #fdd;
    border-style: solid;
    font-size: 40px;
    font-weight: bold;
}
table {
    margin-left: auto;
    margin-right: auto;
}
th {
    font-size: 40px;
    text-align:left;
}
input {
    height: 40px;
    font-size: 20px;
}
#preview_img {
    text-align: center;
}
#change {
    width: 10%;
    position: relative;
    top: 17px;
}

</style>

</head>
<body>
<h1>修改玩家資訊</h1>
<?php
require_once("dbconfig.php");

$userID = (String)$_GET['uid'];
if ($userID == null) {
	echo "empty ID";
	exit(0);
} 
$sql = "select * from user where uid= ?";
$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_bind_param($stmt, "s", $userID);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt); 
if ($rs = mysqli_fetch_array($result)) {
?>
<form id = "update" action="updateUserDataControl.php" method="POST" enctype="multipart/form-data">
    <fieldset id = "topFieldset"> 
    <legend id = "require">Required Fields</legend>
    <table>
    <tr>
        <td rowspan = "4">
        <?php
            $img=$rs["pic"];
            $logodata = $img;
            echo '<img width="450" height="450" src="data:'.'jpeg'.';base64,' . $logodata . '" /></br>';
        ?>
            <!-- <img id="preview_img" width="450" height="450" src="#" /><br /> -->
            change picture:　<input type="file" id = "pic" onchange="readURL(this)" targetID="preview_img" name="img"  value="<?php echo $rs['pic']; ?>" accept="image/gif, image/jpeg" >
            <!-- change picture:　<a href = "choosePicView.php"><img id = "change" src = "icon/settings_file.gif" > </a> -->
        </td>
        <th>
            User ID:　<input type="text" id="uid" name="uid" size="20" maxlength="15" value="<?php echo $rs['uid']; ?>" readonly  unselectable="on"/><br />
        </th> 
    </tr>

    <tr> 
        <th>
            User Password:　<input type="text" id="pwd" name="pwd" size="20" minlength="8" maxlength="15" value="<?php echo $rs['pwd']; ?>" placeholder="Your PWD(8~15)" required="required"/><br />
        </th>
    </tr>
    
    <tr>
        <th>
            User Name:　<input type="text" id="uname" name="uname" size="20" maxlength="20" value="<?php echo $rs['uname']; ?>" placeholder="Your Name(maxlength:20)" required="required"/><br />
        </th>
    <tr>
        <td>
            <input type="submit">
        </td>
    </tr>
    </table>
</form>
<?php
} else {
    echo "error";
}
?>

<script type="text/javascript">
    function readURL(input){
        if(input.files && input.files[0]){
            var imageTagID = input.getAttribute("targetID");
            var reader = new FileReader();
            reader.onload = function (e) {
                var img = document.getElementById(imageTagID);
                img.setAttribute("src", e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    
</script>
</body>

</html>