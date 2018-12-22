<?php
require("dbconfig.php");

$_SESSION['uID'] = 0;
$userName = $_POST['id'];
$passWord = $_POST['pwd'];

		$sql = "SELECT * FROM user WHERE loginID='" . $userName . "' AND password= '" . $passWord . "'";
		if ($result = mysqli_query($db,$sql)) {
			if ($row=mysqli_fetch_array($result)) {
				$_SESSION['uID'] = $row['uid'];
				echo "<a href='index.php'>go</a>";
				exit(0);
			} else {
				echo "Invalid Username or Password - Please try again <br />";
			}
		}


?>
<h1>Login Form</h1><hr />
<form method="post" action="login.php">
User Name: <input type="text" name="id"><br />
Password : <input type="password" name="pwd"><br />
<input type="submit">
</form>