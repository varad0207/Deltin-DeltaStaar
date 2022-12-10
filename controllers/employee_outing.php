<?php
require "../../controllers/includes/common.php";
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $emp_code = mysqli_real_escape_string($conn, $_POST['emp_code']);
    $outing_date = $_POST['start_date'];
    $arrival_date = $_POST['arrival_date'];
    $category = $_POST['category'];
    $get_emp_id = "select emp_id from employee where emp_code='{$emp_code}'";
    $submit1 = mysqli_query($conn, $get_emp_id) or die(mysqli_error($conn));
    $row1 = mysqli_fetch_array($submit1);
    $insert = "insert into employee_outing(emp_id,outing_date,arrival_date, category) values ('{$row1['emp_id']}','$outing_date','$arrival_date','$category')";
    $submit = mysqli_query($conn, $insert) or die(mysqli_error($conn));
    header("loaction:../views/employee_outing.html");
}