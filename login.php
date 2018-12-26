<?php
require_once("dbconfig.php");
function login($uid, $pwd) 
{
    global $db;
    $_SESSION['uid'] ="";
	$_SESSION['role'] = '';
    if ($uid> " ") {
        $sql = "select * from user where uid=? and pwd=?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $uid, $pwd);
        mysqli_stmt_execute($stmt); //執行SQL
        $result = mysqli_stmt_get_result($stmt); 
        $r=mysqli_fetch_assoc($result);
        if($r) {
			$_SESSION['uid'] = $r['uid'];
			$_SESSION['role'] = $r['role'];
            return 1;
        } else {
            return 0;
        } 
    } 
}

function getRole() 
{
    return $_SESSION['role'];
}

function getCurrentUser() 
{
    return $_SESSION['uid'];
}
?>
<?php
$userName = $_POST['id'];
$passWord = $_POST['pwd'];
$r=$_GET['role'];
if (login($userName, $passWord)==1) {
    if(getRole()=="0"){
        header("Location: indexView.php" );
    }else{
        header("Location: adminView.php");
    }

}else{
        header("Location: loginView.php");
    }
?>