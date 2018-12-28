<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet">
<title>註冊</title>
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
}
#preview_img {
    text-align:center;
}

</style>

</head>
<body>
<h1>註冊</h1>

<form id="register" action="registerControl.php" method="POST" enctype="multipart/form-data">
    <fieldset id = "topFieldset"> 
    <legend id = "require">Required Fields</legend>
    <table>
    <tr>
        <td rowspan = "4">
            <img id="preview_img" width="450" height="450" src="#" /><br />
            upload picture:　<input type="file" id = "pic" onchange="readURL(this)" targetID="preview_img" name="img" accept="image/gif, image/jpeg" required="required">
        </td>
        <th>
            User ID:　<input type="text" id="uid" name="uid" size="20" maxlength="15" placeholder="Your ID(maxlength:15)" required="required"/><br />
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
        <td>
            <input type="submit">
        </td>
    </tr>
    </table>
</form>


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
    // var ww, hh;
    // function getElementHW() {
    //     ww = document.documentElement.clientWidth;
    //     hh = document.documentElement.clientHeight;
    // }
    // window.onload=function() {
    //     var pic;
    // };
</script>
</body>

</html>