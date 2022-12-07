<?php  include('includes/common.php'); ?>
<?php 
	session_start();

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
    $email = "";
    $blood_group = "";
    $department = "";
    $joining_date = "";
    $aadhar_number = "";
    $salary = "";
    $acc_id = "";
    $role_id = "";
	$update = false;

	if (isset($_POST['save'])) {
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
        $email = $_POST['emial'];
        $blood_group = $_POST['blood_group'];
        $department = $_POST['department'];
        $joining_date = $_POST['joining_date'];
        $aadhar_number = $_POST['aadhar_number'];
        $salary = $_POST['salary'];
        $acc_id = $_POST['acc_id'];
        $role_id = $_POST['role_id'];

		mysqli_query($conn, "INSERT INTO employee (emp_code, fname,mname,lname,designation,dob,address,state,country,pincode,email,blood_group,department,joining_date,aadhar_number,salary,acc_id,role_id) VALUES ('$emp_code', '$fname','$mname','$lname','$designation','$dob','$address','$state','$country','$pincode','$email','$blood_group','$department','$joining_date','$aadhar_number','$salary','$acc_id','$role_id')"); 
		$_SESSION['message'] = "employee details saved"; 
		header('location: ../views/employee.php');
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
        $email = $_POST['emial'];
        $blood_group = $_POST['blood_group'];
        $department = $_POST['department'];
        $joining_date = $_POST['joining_date'];
        $aadhar_number = $_POST['aadhar_number'];
        $salary = $_POST['salary'];
        $acc_id = $_POST['acc_id'];
        $role_id = $_POST['role_id'];
    
        mysqli_query($conn, "UPDATE employee SET fname='$fname', mname='$mname',lname='$lname',designation='$designation',dob='$dob',address='$address',state='$state',country='$country',pincode='$pincode',email='$email',blood_group='$blood_group',department='$department',joining_date='$joining_date',aadhar_number='$aadhar_number',salary='$salary',acc_id='$acc_id',role_id='$role_id' WHERE emp_code=$emp_code");
        $_SESSION['message'] = "employee Info updated!"; 
        header('location: ../views/employee.php');
    }

    if (isset($_GET['del'])) {
        $emp_code = $_GET['del'];
        mysqli_query($conn, "DELETE FROM employee WHERE emp_code=$emp_code");
        $_SESSION['message'] = "employee deleted!"; 
        header('location: ../views/employee.php');
    }