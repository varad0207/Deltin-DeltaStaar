<?php  include('../controllers/includes/common.php'); ?>
<?php 
	
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


	// initialize variables
	$emp_id = "";
	$role = "";
    /*$mname = "";
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
    $aadhaar_number = "";
    $salary = "";
    $acc_id = "";*/
    
	$update = false;

	if (isset($_POST['save'])) {
		$emp_id = $_POST['eId'];
		$role = $_POST['role'];
        /*$mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $designation = $_POST['designation'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $pincode = $_POST['pincode'];
        $email = $_POST['email'];
        $blood_group = $_POST['blood_group'];
        $department = $_POST['department'];
        $joining_date = $_POST['joining_date'];
        $aadhaar_number = $_POST['aadhaar_number'];
        $salary = $_POST['salary'];
        $acc_id = $_POST['acc_id'];*/
        

		mysqli_query($conn, "INSERT INTO technician (emp_id,role) VALUES ('$emp_id', '$role')"); 
		$_SESSION['message'] = "technician details saved"; 
		header('location: ../views/technician.php');
	}

    if (isset($_POST['update'])) {
        $emp_id= $_POST['eId'];
		$role = $_POST['role'];
       /* $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $designation = $_POST['designation'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $pincode = $_POST['pincode'];
        $email = $_POST['email'];
        $blood_group = $_POST['blood_group'];
        $department = $_POST['department'];
        $joining_date = $_POST['joining_date'];
        $aadhaar_number = $_POST['aadhaar_number'];
        $salary = $_POST['salary'];
        $acc_id = $_POST['acc_id'];*/
        
    
        mysqli_query($conn, "UPDATE technician SET emp_id='$emp_id', role='$role'");
        $_SESSION['message'] = "employee Info updated!"; 
        header('location: ../views/technician.php');
    }

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($conn, "DELETE FROM `technician` WHERE `id`=$id");
        $_SESSION['message'] = "technician deleted!"; 
        header('location: ../views/technician.php');
    } 