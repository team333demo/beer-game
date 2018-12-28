<?php
require("loginModel.php");

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