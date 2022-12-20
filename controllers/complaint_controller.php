<?php
if (isset($_POST['submit'])|| isset($_POST['update'])||isset($_GET['del'])) {
    include('../controllers/includes/common.php');
}else{
    include('../../controllers/includes/common.php');
}
?>
<?php

if (!isset($_SESSION)) {
    session_start();
}

    $raise_timestamp = "";
	$category = "";
	$description = "";
	$status = "";
	$tech_closure_timestamp = "";
	$sec_closure_timestamp = "";
	$warden_closure_timestamp = "";
	$remarks = "";
	$emp_code = "";

if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $emp_code = mysqli_real_escape_string($conn, $_POST['emp_code']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    echo "<script>console.log('1')</script>";
    $insert = "insert into complaints(emp_code, type, description) values ('$emp_code','$category','$description')";
    echo mysqli_error($conn);
    $submit = mysqli_query($conn, $insert) or die(mysqli_error($conn));
    header("location: ../index.html");
}

if (isset($_POST['update'])) {
    $id = $_POST['update'];
    $raise_timestamp = $_POST['raise_timestamp'];
	$category = $_POST['category'];
	$description = $_POST['description'];
	$status = $_POST['status'];
	$tech_closure_timestamp = $_POST['tech_closure_timestamp'];
	$sec_closure_timestamp = $_POST['sec_closure_timestamp'];
	$warden_closure_timestamp = $_POST['warden_closure_timestamp'];
	$remarks = $_POST['remarks'];
	$emp_code = $_POST['emp_code'];

    mysqli_query($conn, "UPDATE complaints SET emp_code='$emp_code', category='$category',description='$description' WHERE id='$id'");
    $_SESSION['message'] = "employee Info updated!";
    header('location: ../views/hrm/employee_table.php');
}
?>
