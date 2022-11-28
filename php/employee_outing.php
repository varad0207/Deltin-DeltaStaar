<?php
require "includes/common.php";
// echo "Hii";
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    // echo "HELLO";
    $emp_code = mysqli_real_escape_string($conn, $_POST['emp_code']);
    $outing_date = $_POST['start_date'];
    $arrival_date = $_POST['arrival_date'];
    $category = $_POST['category'];
    $get_emp_id="select emp_id from employee where emp_code='{$emp_code}'";
	$submit1 = mysqli_query($conn,$get_emp_id) or die(mysqli_error($conn));
	$row1 = mysqli_fetch_array($submit1);
    $insert = "insert into employee_outing(emp_id,outing_date,arrival_date, category) values ('{$row1['emp_id']}','$outing_date','$arrival_date','$category')";
    $submit = mysqli_query($conn, $insert) or die(mysqli_error($conn));
    header("loaction:../html/employee_outing.html");
}
