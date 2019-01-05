<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet">
<title>登入</title>
<style type="text/css">
body {
    background: RGB(189,215,238);
    /* background-image: linear-gradient(to bottom right, #ffe6ff, #ffe6e6, #ffffe6, #e6ffe6, #e6ffff, #e6e6ff); */
}
p {

    font-family: "微軟正黑體";
    font-size: 100px;
    position: absolute;
    color: darkorchid;/*RGB(189,215,238);*/
    bottom: 200px;
    left: 140px;
    font-weight: bold;
    text-shadow: -2px -2px white, 2px 2px #444;
}
h1 {
    font-size: 50px;
    text-align: center;
}
form {
    font-family: 'VT323', monospace;
    margin: auto;
    padding: 0;
    width: 430px; 
    position:absolute; height:500px;
    top:0; bottom:0; left:0; right:0;
    font-size: 40px;
}
img {
    width: 1100px;
}
input {
    font-size: 20px;
}
a {
    position: relative; 
    text-decoration: none;
    top: 5px;
    color: darkorchid;
}
a:hover {
    color: deeppink;
}
#r {
    font-family: "微軟正黑體";
    font-size: 25px;
}
</style>

</head>
<body>

<img style="display:block; margin:auto;" src="home3.jpg">
<p>啤酒<br/>遊戲</p>
<form method="post" action="loginControl.php">
<h1>Login</h1>
<table>
<tr><td>User ID: <input type="text" name="id"></td></tr>
<tr><td>Password : <input type="password" name="pwd"></td></tr>
<tr><td id='r' align='right'>    
    <input type="submit" value='登入'>
    <a href='registerView.php'>註冊</a>
</tr></td>
</form>
</body>
</html>