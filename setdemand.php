<a href ='adminView.php'>往返</a><br/><br/>
<?php
require("dbconfig.php");
// $Tid=(int)$_REQUEST['Tid'];

echo $Tid;
    $sql = "select period,demand from demand ;";
    $stmt = mysqli_prepare($db, $sql );
    mysqli_stmt_bind_param($stmt,"i", $Tid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    // $rs1 = mysqli_fetch_assoc($result);
    $check=0;
    echo "<table width='500' border='1'>",
             "<tr><td>期數</td>
              <td>需求量</td>
              </tr>";

    while ($rs = mysqli_fetch_assoc($result)){
        if($rs != NULL)
            $check=1;
    }
    if($check == 1) {
        echo "<script>alert('警告：目前有遊戲進行中!'); location='adminView.php';</script>";
    }else{
        echo "<form method='post' action='insertdemand.php'>
        <tr><td>50</td><td>
        <input name='demand1' type='text' id='demand1' /> ~ 
        <input name='demand2' type='text' id='demand2' /></td></tr></table><br/>
        <input type='submit' name='Submit' value='送出' /></form>";
    }
        
?>
<!-- <table width="500" border="1" class="">
    <tr>
      <td>期數</td>
      <td>需求量</td>
    </tr> -->
<?php    
// for($i = 0; $i < 50; $i++){
//     $demand = rand(1,60);
//     $sql = "insert into demand (Tid,period,demand) values (?,?,?);";
//     $stmt = mysqli_prepare($db, $sql );
//     mysqli_stmt_bind_param($stmt,"iii", $Tid,$i,$demand);
//     mysqli_stmt_execute($stmt);
//     // $result = mysqli_stmt_get_result($stmt); 
// }
// $sql = "update team set demandstatus='1' where Tid=?";
// $stmt = mysqli_prepare($db, $sql );
// mysqli_stmt_bind_param($stmt,"i", $Tid);
// mysqli_stmt_execute($stmt);

// header('Location:adminView.php');
?>