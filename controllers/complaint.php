<?php
include('../controllers/includes/common.php');
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    
    $emp_code = mysqli_real_escape_string($conn, $_POST['emp_code']);
    echo $emp_code;
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    
    echo "<script>console.log('1')</script>";
    $insert = "insert into complaints(emp_code, category, description) values ('$emp_code','$category','$description')";
    echo mysqli_error($conn);
    $submit = mysqli_query($conn, $insert) or die(mysqli_error($conn));
    header("location: ../index.html");
}