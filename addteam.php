<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>input form</title>
</head>
<body>
<p>Add Team!! </p>
<hr />

<table width="200" border="1">
  <tr>
    <td>Team Name</td>
    <td>角色</td>
  </tr>
  <tr><form method="post" action="insertteam.php">
    <td>
      <input name="title" type="text" id="title" />

    </td>
    <td>
    <select id="select" name="select">
    <option value="Factory"selected>Factory</option>
    <option value="Distributor">Distributor</option>
    <option value="Wholesaler">Wholesaler</option>
    <option value="Retailer">Retailer</option>
    </select>
    </td></td>
  </tr>
</table>
<?php
echo "<a href='memberView.php'>送出</a>";
?>
<!-- <input type="submit" name="Submit" value="送出" /> -->
</form>
</body>
</html>