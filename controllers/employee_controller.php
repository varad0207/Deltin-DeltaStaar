
<?php
    require "includes/common.php";


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
    // $emp_id = $_POST['emp_id'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $designation = $_POST['designation'];
    $dob = date('Y-m-d',strtotime($_POST['dob']));
    $address = $_POST['address'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $pincode = $_POST['pincode'];
    // $contacts_id = $_POST['contacts_id'];
    // $contact1 = mysqli_real_escape_string($conn,$_POST['contact1']);
    // $contact2 = mysqli_real_escape_string($conn,$_POST['contact2']);
    $contact = $_POST['contact1'];
    $email = $_POST['email'];
    $blood_group = $_POST['blood_group'];
    $department = $_POST['department'];
    $joining_date = date('Y-m-d',strtotime($_POST['joining_date']));
    $aadhaar_number = $_POST['aadhaar_number'];
    $salary = $_POST['salary'];
    $acc_id = $_POST['acc_id'];
    // $desig_id = $_POST['desig_id'];
    !empty($acc_id)?mysqli_query($conn, "INSERT INTO employee (emp_code, fname,mname,lname,designation,dob,contact,address,state,country,pincode,email,blood_group,department,joining_date,aadhaar_number,salary,acc_id) VALUES ('$emp_code', '$fname','$mname','$lname','$designation','$dob','$contact','$address','$state','$country','$pincode','$email','$blood_group','$department','$joining_date','$aadhaar_number','$salary','$acc_id')"):mysqli_query($conn, "INSERT INTO employee (emp_code, fname,mname,lname,designation,dob,contact,address,state,country,pincode,email,blood_group,department,joining_date,aadhaar_number,salary) VALUES ('$emp_code', '$fname','$mname','$lname','$designation','$dob','$contact','$address','$state','$country','$pincode','$email','$blood_group','$department','$joining_date','$aadhaar_number','$salary')");

    // $last_insert_id = mysqli_insert_id($conn);
    // mysqli_query($conn, "INSERT INTO contact (emp_id, primary_contact,secondary_contact) VALUES ('$last_insert_id', '$contact1','$contact2')");
    // $last_insert_id = mysqli_insert_id($conn);
    // mysqli_query($conn, "UPDATE employee SET contact='$last_insert_id' WHERE emp_code='$emp_code'");
    // $_SESSION['message'] = "Employee Details Saved";
    header('location: ../views/hrm/employee_table.php');
}

if (isset($_POST['update'])) {
    $emp_code = $_POST['emp_code'];
    $emp_id = $_POST['emp_id'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $designation = $_POST['designation'];
    $dob = date('Y-m-d',strtotime($_POST['dob']));
    $address = $_POST['address'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $pincode = $_POST['pincode'];
    // $contacts_id = $_POST['contacts_id'];
    // $contact1 = $_POST['contact1'];
    // $contact2 = $_POST['contact2'];
    $contact = $_POST['contact1'];
    $email = $_POST['email'];
    $blood_group = $_POST['blood_group'];
    $department = $_POST['department'];
    $joining_date = date('Y-m-d',strtotime($_POST['joining_date']));
    $aadhaar_number = $_POST['aadhaar_number'];
    $salary = $_POST['salary'];
    $acc_id = $_POST['acc_id'];
    // $desig_id = $_POST['desig_id'];
    // mysqli_query($conn, "UPDATE contact SET primary_contact='$contact1',secondary_contact='$contact2' where emp_id='$emp_id'");
    mysqli_query($conn, "UPDATE employee SET fname='$fname', mname='$mname',lname='$lname',designation='$designation',dob='$dob',contact='$contact',address='$address',
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