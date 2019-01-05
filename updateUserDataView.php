<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet">
<title>修改玩家資訊</title>
<style type="text/css">
body {
    font-family: 'VT323', monospace;
    background-image: linear-gradient(to bottom right, #ffe6ff, #ffe6e6, #ffffe6, #e6ffe6, #e6ffff, #e6e6ff);
}
h1 {
    font-family: "微軟正黑體";
    /* font-size: 50px; */
    text-align: center;
}
fieldset {
    margin-left: auto;
    margin-right: auto;
    width: 80%;
    border-color: gainsboro;
    border-style: solid;
    font-size: 30px;
    font-weight: bold;
    border-width: thick;
}
table {
    margin-left: auto;
    margin-right: auto;
    width: 1050px;
}
th {
    font-size: 30px;
    text-align:left;
}
input {
    height: 30px;
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
#preview_img {
    object-fit: contain;
}

</style>
<script type="text/javascript">
    window.onload=function() {
        document.getElementById("update").onsubmit=join;
    };
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
    function join(){
        var pwdVal = document.getElementById("pwd").value;
        ch = /[a-zA-Z0-9]/;
        if(!ch.test(pwdVal)) {
            alert("password有非英文及數字的字喔!");
            return false;
        }
    }
</script>

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
            echo '<img id="preview_img" width="400" height="400" src="data:'.'jpeg'.';base64,' . $logodata . '" /></br>';
        ?>
            <!-- <img id="preview_img" width="450" height="450" src="#" /><br /> -->
            change picture:　<input type="file" id = "pic" onchange="readURL(this)" targetID="preview_img" name="img"  value="<?php echo $rs['pic']; ?>" accept="image/gif, image/jpeg, image/png" >
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

</fieldset>
<br/>
<br/>
</body>

</html>