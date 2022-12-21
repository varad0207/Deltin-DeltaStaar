<?php
require 'includes/common.php';
if(isset($_SESSION["emp_id"]))
{
    session_unset();
    session_destroy();
}
date_default_timezone_set('Asia/Calcutta');
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $emp_code = $_POST['user'];
    $password = $_POST['pass'];
    $safe_pass = md5($password);
    $fetch = "select e.emp_id from employee e join login_credentials c on e.emp_id=c.emp_id where e.emp_code = '$emp_code'";

    $check = mysqli_query($conn, $fetch) or die(mysqli_error($conn));

    if (mysqli_num_rows($check) == 0) {
        echo '<script>alert("User not found, Please try again");window.location = history.back();</script>';
    } else {

        $fetch1 = "select e.emp_id from employee e join login_credentials c on e.emp_id=c.emp_id where e.emp_code = '$emp_code' && c.pass='$safe_pass'";
        $check1 = mysqli_query($conn, $fetch1) or die(mysqli_error($conn));
        if (mysqli_num_rows($check1) == 0) {
            die('<script>alert("Incorrect Password, Please try again");window.location = history.back();</script>');
            // echo '<script>alert("Incorrect Password, Please try again");//window.location = history.back();</script>';   
        }
        session_start();
        $row = mysqli_fetch_array($check1);
        $emp_id = $row['emp_id'];
        $insert = "insert into login_history(emp_id) values ('{$row['emp_id']}')";
        $submit = mysqli_query($conn,$insert) or die(mysqli_error($conn));
        $last_insert_id = mysqli_insert_id($conn);
        if (!isset($_SESSION['emp_id'])) {
            $_SESSION['emp_id'] = $emp_id;
            $_SESSION['emp_code'] = $emp_code;
            $_SESSION['login_history_id'] = $last_insert_id;
            header("location:../views/dashboard.php");
        }
    }
}
?>