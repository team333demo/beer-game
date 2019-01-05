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
#preview_img {
    text-align:center;
    object-fit: contain;
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
            <img id="preview_img" width="400" height="400" src="#" /><br />
            upload picture:　<input type="file" id = "pic" onchange="readURL(this)" targetID="preview_img" name="img" accept="image/gif, image/jpeg, image/png" required="required">
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
        <td  align='right'>
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
</fieldset>
<br/>
<br/>

</body>

</html>