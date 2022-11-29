<?php
require "includes/common.php";
if (!isset($_SESSION['emp_id'])) header("location:../html/login.html");
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $emp_id = $_SESSION['emp_id'];
    $get_accomodation_id="select acc_id from security where emp_id='{$emp_id}'";
	$submit1 = mysqli_query($conn,$get_accomodation_id) or die(mysqli_error($conn));
	$row1 = mysqli_fetch_array($submit1);
    $acc_id=$row1['acc_id'];
    $get_accomodation_location="select acc_name from accomodation where acc_id='{$acc_id}'";
	$submit1 = mysqli_query($conn,$get_accomodation_location) or die(mysqli_error($conn));
	$row1 = mysqli_fetch_array($submit1);
    $location=$row1['acc_name'];
    $insert = "insert into tankers(acc_id,security_emp_id,tanker_id,location,quality_check,qty, bill_no,vendor_name) values ('$acc_id','$emp_id','tanker_id','$location','quality_check','qty', 'bill_no','vendor_name')";
    $submit = mysqli_query($conn, $insert) or die(mysqli_error($conn));
    header("loaction:../html/tankers.html");
}
