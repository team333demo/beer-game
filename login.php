<?php
require_once("dbconfig.php");
function login($id, $pwd) 
{
    global $db;
    $_SESSION['uID'] = 0;
	$_SESSION['role'] = '';
    if ($id> " ") {
        $sql = "select * from user where loginID=? and password=?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $id, $pwd);
        mysqli_stmt_execute($stmt); //執行SQL
        $result = mysqli_stmt_get_result($stmt); 
        $r=mysqli_fetch_assoc($result);
        if($r) {
			$_SESSION['uID'] = $r['uid'];
			$_SESSION['role'] = $r['role'];
            return 1;
        } else {
            return 0;
        } 
    } 
    return 0;
}

function getRole() 
{
    return $_SESSION['role'];
}

function getCurrentUser() 
{
    return $_SESSION['uID'];
}
?>
<?php
$userName = $_POST['id'];
$passWord = $_POST['pwd'];
if (login($userName, $passWord)==1) {
    header("Location: indexView.php" );
} else {
    header("Location: loginView.php");
}
?>