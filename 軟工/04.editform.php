<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>my guest book !! </p>
<hr />
<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>message</td>
    <td>name</td>
  </tr>
<?php
require("dbconfig.php");

$id=(int)$_GET['id'];
if ($id <=0) {
	echo "empty ID";
	exit(0);
} 
	$sql = "select * from guestbook where id=?;";
	$stmt = mysqli_prepare($db, $sql );
	mysqli_stmt_bind_param($stmt, "i", $id);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt); 
if ($rs=mysqli_fetch_array($result)) {
?>
<form method="post" action="04.update.php">
  <tr>
    <td><label>
      <input type="hidden" name="id" value="<?php echo $rs['id']; ?>" />
	  <?php echo $rs['id']; ?>
    </label></td>
    <td><label>
      <input name="title" type="text" id="title" value="<?php echo $rs['title']; ?>"/>
    </label></td>
    <td><label>
      <input name="msg" type="text" id="msg" value="<?php echo $rs['msg']; ?>"/>
    </label></td>
    <td><label>
      <input name="myname" type="text" id="myname" value="<?php echo $rs['name']; ?>"/>
	  <?php	  
	  if($rs['sec']=="作者保密"){
	  echo"<input name='myname' type='text' id='myname' value='作者保密'/>";
	  }
	  ?>
    </label></td>
	<td><label>
      <input type="radio" name="rb" value="<?php echo $rs['sec'];?>">
	  <?php
	  if($rs['sec']=="作者公開"){
	  echo"<input value ='作者公開'>";
	  }
	  else if($rs['sec']=="作者保密"){
	  echo"<input value ='作者保密'>";

	  }
	  ?>
    </label></td>
	    <td><label>
 	<select name="category" selected >
	<option value="<?php echo $rs['category']; ?>" selected><?php echo $rs['category']; ?></option>
	<?php
	if($rs['category']=="閒聊"){
	    echo "<option value='爆料'>","爆料","</option>";
        echo "<option value='通知'>","通知","</option>";
	}
		if($rs['category']=="爆料"){
	    echo "<option value='閒聊'>","閒聊","</option>";
        echo "<option value='通知'>","通知","</option>";
	}
		if($rs['category']=="通知"){
	    echo "<option value='爆料'>","爆料","</option>";
        echo "<option value='閒聊'>","閒聊","</option>";
	}
	?>

    </select>
    </label></td>
  </tr>
</table>
<input type="submit" name="Submit" value="送出" />
</form>

<?php
} else echo "cannot find the message to edit.";
?>
</body>
</html>
