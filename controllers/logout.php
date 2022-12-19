<?php
require 'includes/common.php';
echo $_SESSION['emp_id'] . " " . $_SESSION['login_time'];

    if(isset($_SESSION["emp_id"]))
    {
        $dt = new DateTime($_SESSION['login_time']);
        $insert = "insert into login_history(emp_id) values ('{$_SESSION['emp_id']}')";
        $submit = mysqli_query($conn,$insert) or die(mysqli_error($conn));
        session_unset();
        session_destroy();
    }
    header("location: ..//index.html");
?>