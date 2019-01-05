<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet">
<title>註冊</title>
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
#beer {
    width: 250px;
    position: absolute;
    top: 400px;
    right: 350px;
}
fieldset {
    margin-left: auto;
    margin-right: auto;
    width: 80%;
    border-style: solid;
    font-size: 30px;
    font-weight: bold;
    border-color: gainsboro;
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
#ok {
    position: relative;
    width: 80px;
    height: 80px;
    bottom: 50px;
}
#preview_img {
    text-align:center;
    object-fit: contain;
}

</style>
<script type="text/javascript">
    window.onload=function() {
        document.getElementById("register").onsubmit=join;
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
        var engValue = document.getElementById("uid").value;
        re = /[a-zA-Z0-9]/;
        if(!re.test(engValue)) {
            alert("user id有非英文及數字的字喔!");
            return false;
        }
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
<h1>註冊</h1>
<img id='beer' src="beer.gif">
<form id="register" action="registerControl.php" method="POST" enctype="multipart/form-data">
    <fieldset id = "topFieldset"> 
    <legend id = "require">Required Fields</legend>
    <table>
    <tr>
        <td rowspan = "4">
            <img id="preview_img" width="400" height="400" src="#" /><br />
            upload picture:　<input type="file" id = "pic" onchange="readURL(this)" targetID="preview_img" name="img" accept="image/gif, image/jpeg, image/png" required="required">
        </td>
        <th>
            User ID:　<input  type="text" id="uid" name="uid" size="20" maxlength="15" placeholder="Your ID(maxlength:15)" required="required" /><br />
        </th> 
    </tr>

    <tr> 
        <th>
            User Password:　<input type="text" id="pwd" name="pwd" size="20" minlength="8" maxlength="15" placeholder="Your PWD(8~15)" required="required"/><br />
        </th>
    </tr>
    
    <tr>
        <th>
            User Name:　<input type="text" id="uname" name="uname" size="20" maxlength="20" placeholder="Your Name(maxlength:20)" required="required"/><br />
        </th>
    <tr>
        <td  align='right'>
            <input id='ok' type="image" src="ok.png">
            <!-- <input type="submit"> -->
        </td>
    </tr>
    </table>
</form>



</fieldset>
<br/>
<br/>

</body>

</html>