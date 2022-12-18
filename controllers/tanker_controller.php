<?php
require "includes/common.php";

if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $emp_id = $_SESSION['emp_id'];
    $get_accomodation_id = "select acc_id from security where emp_id='{$emp_id}'";
    $submit1 = mysqli_query($conn, $get_accomodation_id) or die(mysqli_error($conn));
    $row1 = mysqli_fetch_array($submit1);
    $acc_id = $row1['acc_id'];
    $get_accomodation_location = "select acc_name from accomodation where acc_id='{$acc_id}'";
    $submit1 = mysqli_query($conn, $get_accomodation_location) or die(mysqli_error($conn));
    $row1 = mysqli_fetch_array($submit1);
    $location = $row1['acc_name'];
    $vname = $row1['vname'];
    $billno = $row1['billno'];
    $quality = $row1['quality'];
    $qty = $row1['qty'];
    $timestamp = time();
    $insert = "insert into tankers(id,acc_id,security_emp_id,location,quality_check,qty,bill_no,vendor_name,timestamp) values ('','$acc_id','$emp_id','$location','$quality','$qty', '$billno','$vname','$timestamp')";
    $submit = mysqli_query($conn, $insert) or die(mysqli_error($conn));
    header("loaction: ../index.html");
}
