<?php
if (isset($_POST['submit'])|| isset($_POST['update'])||isset($_GET['del'])) {
    include('includes/common.php');
}else{
    include('includes/common.php');
}
?>
<?php

if (!isset($_SESSION)) {
    session_start();
}


// initialize variables
$role_name = "";
$role_id = "";
$rights = "";
$accomodation = "";
$employee_details = "";
$complaints = "";
$employee_outing = "";
$roles = "";
$rooms = "";
$tankers = "";
$jobs = "";
$vaccination = "";
$vaccination_category = "";
$visitor_log = "";

$update = false;

if (isset($_POST['submit'])) {
    $role_name = $_POST['role_name'];

    // $role_id = $_POST['role_id'];
    // $rights = $_POST['rights'];
    $accomodation = $_POST['rights_acc'];
    $employee_details = $_POST['rights_employee_details'];
    $complaints = $_POST['rights_complaints'];
    $employee_outing = $_POST['rights_employee_outing'];
    // $roles = $_POST[''];
    $rooms = $_POST['rights_room'];
    $tankers = $_POST['rights_tankers'];
    $jobs = $_POST['rights_jobs'];
    $vaccination = $_POST['rights_vaccination'];
    // $vaccination_category = $_POST[''];
    $visitor_log = $_POST['rights_visitors'];  
    mysqli_query($conn, "INSERT INTO rights (accomodation, complaints,employee_details,employee_outing,roles,rooms,tankers,jobs,vaccination,vaccination_category,visitor_log) VALUES 
                                            ('$accomodation', '$complaints','$employee_details','$employee_outing','7','$rooms','$tankers','$jobs','$vaccination','7','$visitor_log')");
    $last_insert_id = mysqli_insert_id($conn);

    // mysqli_query($conn, "INSERT INTO roles (role_name, rights) VALUES ('$role_name', '$last_insert_id')");
    
    // $_SESSION['message'] = "Role Saved";
    // header('location: ../views/hrm/roles_table.php');
}

if (isset($_POST['update'])) {
    $role_name = $_POST['role_name'];
    // $role_id = $_POST['role_id'];
    // $rights = $_POST['rights'];
    $accomodation = $_POST['rights_acc'];
    $employee_details = $_POST['rights_employee_details'];
    $complaints = $_POST['rights_complaints'];
    $employee_outing = $_POST['rights_employee_outing'];
    // $roles = $_POST[''];
    $rooms = $_POST['rights_room'];
    $tankers = $_POST['rights_tankers'];
    $jobs = $_POST['rights_jobs'];
    $vaccination = $_POST['rights_vaccination'];
    // $vaccination_category = $_POST[''];
    $visitor_log = $_POST['rights_visitors'];  

    mysqli_query($conn, "UPDATE employee SET fname='$fname', mname='$mname',lname='$lname',designation='$designation',dob='$dob',address='$address',
                                            state='$state',country='$country',pincode='$pincode',email='$email',blood_group='$blood_group',
                                            department='$department',joining_date='$joining_date',aadhaar_number='$aadhaar_number',salary='$salary',
                                            acc_id='$acc_id' WHERE emp_code='$emp_code'");
    $_SESSION['message'] = "Role Info Updated!";
    header('location: ../views/hrm/roles_table.php');
}

if (isset($_GET['del'])) {
    $role_id = $_GET['del'];
    mysqli_query($conn, "DELETE FROM roles WHERE role_id=$role_id");
    $_SESSION['message'] = "Role Deleted!";
    header('location: ../views/hrm/roles_table.php');
}