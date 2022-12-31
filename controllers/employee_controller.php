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
$emp_code = "";
$fname = "";
$mname = "";
$lname = "";
$designation = "";
$dob = "";
$address = "";
$state = "";
$country = "";
$pincode = "";
$contact = "";
$email = "";
$blood_group = "";
$department = "";
$joining_date = "";
$aadhaar_number = "";
$salary = "";
$acc_id = "";

$update = false;

if (isset($_POST['submit'])) {
    $emp_code = $_POST['emp_code'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $designation = $_POST['designation'];
    $dob = date('Y-m-d',strtotime($_POST['dob']));
    $address = $_POST['address'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $pincode = $_POST['pincode'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $blood_group = $_POST['blood_group'];
    $department = $_POST['department'];
    $joining_date = date('Y-m-d',strtotime($_POST['joining_date']));
    $aadhaar_number = $_POST['aadhaar_number'];
    $salary = $_POST['salary'];
    $acc_id = $_POST['acc_id'];
    // $desig_id = $_POST['desig_id'];

    mysqli_query($conn, "INSERT INTO employee (emp_code, fname,mname,lname,designation,dob,address,state,country,pincode,email,blood_group,department,joining_date,aadhaar_number,salary,acc_id) VALUES ('$emp_code', '$fname','$mname','$lname','$designation','$dob','$address','$state','$country','$pincode','$email','$blood_group','$department','$joining_date','$aadhaar_number','$salary','$acc_id')");
    $_SESSION['message'] = "Employee Details Saved";
    header('location: ../views/hrm/employee_table.php');
}

if (isset($_POST['update'])) {
    $emp_code = $_POST['emp_code'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $designation = $_POST['designation'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $pincode = $_POST['pincode'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $blood_group = $_POST['blood_group'];
    $department = $_POST['department'];
    $joining_date = $_POST['joining_date'];
    $aadhaar_number = $_POST['aadhaar_number'];
    $salary = $_POST['salary'];
    $acc_id = $_POST['acc_id'];
    // $desig_id = $_POST['desig_id'];
    // echo $dob;
    mysqli_query($conn, "UPDATE employee SET fname='$fname', mname='$mname',lname='$lname',designation='$designation',dob='$dob',address='$address',
                                            state='$state',country='$country',pincode='$pincode',email='$email',blood_group='$blood_group',
                                            department='$department',joining_date='$joining_date',aadhaar_number='$aadhaar_number',salary='$salary',
                                            acc_id='$acc_id' WHERE emp_code='$emp_code'");
    $_SESSION['message'] = "Employee Info Updated!";
    header('location: ../views/hrm/employee_table.php');
}

if (isset($_GET['del'])) {
    $emp_code = $_GET['del'];
    mysqli_query($conn, "DELETE FROM employee WHERE emp_code=$emp_code");
    $_SESSION['message'] = "Employee Deleted!";
    header('location: ../views/hrm/employee_table.php');
}