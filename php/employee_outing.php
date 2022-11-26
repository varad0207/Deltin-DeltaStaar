<?php
require "includes/common.php";
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $emp_code = mysqli_real_escape_string($conn, $_POST['emp_code']);
    $outing_date = $_POST['start_date'];
    $arrival_date =$_POST['arrival_date'];
    $category=$_POST['category'];
    echo "<script>console.log(1);</script>";
    $insert = "insert into employee_outing(emp_code,outing_date,arrival_date, category) values ('$emp_code','$outing_date','$arrival_date','$category')";
    $submit = mysqli_query($conn, $insert) or die(mysqli_error($conn));
    header("location: ../html/employee_outing.html");
}
?>
