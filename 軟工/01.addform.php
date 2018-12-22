<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>input form</title>
</head>
<body>
<p>my guest book !! </p>
<hr />

<table width="200" border="1">
  <tr>
    <td>隊伍名稱</td>
    <td>message</td>
    <td>玩家名稱</td>
	<td>sec</td>
	<td>category</td>

  </tr>
  <tr><form method="post" action="01.insert.php">
    <td><label>
      <input name="title" type="text" id="title" />
    </label></td>
    <td><label>
      <input name="msg" type="text" id="msg" />
    </label></td>
    <td><label>
      <input name="myname" type="text" id="myname" />
    </label></td>
	
	<td><label>
      <input name="sec" type="radio" value="作者公開" />作者公開
	  <input name="sec" type="radio" value="作者保密" />作者保密
    </label></td>
	
    <td><label>
	
	<select name="category">
    <option  value="閒聊">[閒聊]</option>
    <option  value="爆料">[爆料]</option>
    <option  value="通知">[通知]</option>
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
