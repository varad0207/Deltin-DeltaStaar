<?php
require 'includes/common.php';
$dt = new DateTime($_SESSION['login_time']);
echo $dt->format('Y-m-d H:i:s');
$insert = "insert into login_history(emp_id,login_time) values ('ABCD1234','{$dt->format('Y-m-d H:i:s')}')";
$submit = mysqli_query($conn, $insert) or die(mysqli_error($conn));
//     if(isset($_SESSION["emp_id"]))
//     {

//         session_unset();
//         session_destroy();
//     }
// header("location: ..//index.html");
?>