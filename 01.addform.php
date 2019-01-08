<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="https://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>input form</title>
<style type="text/css">
body {
    font-family: 'VT323', monospace;
    background-image: url('background.jpg');
    background-position : 50% 100%;
    background-attachment:fixed;
    background-repeat:no-repeat;
    background-size:cover;
}
table {
    margin-left: auto;
    margin-right: auto;
    width: 300px;
    border-style: solid;
    font-weight: bold;
    font-size:20px;
    border-color: rgba(0%,0%,0%,0);
    border-width: thick;
}
p{
    font-family: 'Special Elite', cursive;
    font-size:40px;
    text-align: center;
}
input{
    font-size:20px;
}
select{
    font-size:20px;
}

</style>

</head>
<body>
<p>add new team !! </p>
<hr />

<table width="200" border="1">
  <tr>
    <td style='text-align:center;'>隊伍名稱</td>
	  <td>player</td>

  </tr>
  <tr><form method="post" action="01.insert.php">
    <td style='text-align:right;'><label>
      <input name="team" type="text" id="title" />
    </label></td>
    

    <td><label>
	
	  <select name="player">
      <option  value="factory">Factory</option>
      <option  value="distributor">Distributor</option>
      <option  value="wholesaler">Wholesaler</option>
      <option  value="retailer">Retailer</option>
    </select>
	
    </label></td>
	<tr><tr>
	    <td  colspan="2"; style='text-align:center;'><label>
            <br><a href="indexView.php?" ><img src="back.png" width="50"height="50" ; title="返回"></a>
            <input type=image src=send.png width="50"height="50" onclick="submit()" title="送出">
    </label></td></tr></tr>
	</form>
  </tr>
</table>
</body>
</html>
