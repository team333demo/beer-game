<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>input form</title>
</head>
<body>
<p>add new team !! </p>
<hr />

<table width="200" border="1">
  <tr>
    <td>隊伍名稱</td>
	  <td>player</td>

  </tr>
  <tr><form method="post" action="01.insert.php">
    <td><label>
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
	
	    <td><label>
      <input type="submit" name="Submit" value="送出" />
    </label></td>
	</form>
  </tr>
</table>
</body>
</html>
