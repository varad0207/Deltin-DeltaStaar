<?php
require 'includes/common.php';

if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $emp_code = $_POST['user'];
    $password =$_POST['pass'];
    $safe_pass = md5($password);
    $fetch = "select e.emp_id from employee e join login_credentials c on e.emp_id=c.emp_id where e.emp_code = '$emp_code'";

    $check = mysqli_query($conn,$fetch) or die(mysqli_error($conn));
    echo ("Logged in");

    if(mysqli_num_rows($check) == 0)
    {
        die("User Not Found,Please Contact Admin");
    }
    else
    {

        $fetch1 = "select e.emp_id from employee e join login_credentials c on e.emp_id=c.emp_id where e.emp_code = '$emp_code' && c.pass='$safe_pass'";
        $check1 = mysqli_query($conn,$fetch1) or die(mysqli_error($conn));
        if(mysqli_num_rows($check1) == 0)
        {
            // die("Incorrect Password");
            echo '<script>alert("Incorrect Password, Please try again");window.location = history.back();</script>';
        }
        $row = mysqli_fetch_array($check1);
        $emp_id = $row['emp_id'];
        $insert = "insert into login_history(emp_id) values ('{$row['emp_id']}')";
        $submit = mysqli_query($conn,$insert) or die(mysqli_error($conn));
        if(!isset($_SESSION['emp_id'])){
            $_SESSION['emp_id'] = $emp_id;
            $_SESSION['emp_code'] = $emp_code;
            $_SESSION['login_time'] = time();
            header("location:../views/superadmin.html");
        } 
    }								
}
?>