<?php  include('../controllers/includes/common.php'); ?>
<?php 
	
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


	// initialize variables
	$emp_id = "";
	$acc_id = "";
    //$mname = "";
    //$lname = "";
    //$designation = "";
    //$dob = "";
    //$address = "";
    //$state = "";
    //$country = "";
   // $pincode = "";
   // $email = "";
   // $blood_group = "";
    //$department = "";
    //$joining_date = "";
    //$aadhaar_number = "";
    //$salary = "";
    //$acc_id = "";
    
	$update = false;

	if (isset($_POST['save'])) {
		$emp_id = $_POST['Id'];
		$acc_id = $_POST['acId'];
        //$mname = $_POST['mname'];
       /* $lname = $_POST['lname'];
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
        

		mysqli_query($conn, "INSERT INTO security (emp_id,acc_id) VALUES ('$emp_id', '$acc_id')"); 
		$_SESSION['message'] = "employee details saved"; 
		header('location: ../index.html');
	}

    if (isset($_POST['update'])) {
        $emp_code = $_POST['Id'];
		$fname = $_POST['acId'];
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
        
    
        mysqli_query($conn, "UPDATE security SET emp_id='$emp_id', acc_id='$acc_id'");
        $_SESSION['message'] = "employee Info updated!"; 
        header('location: ../views/security.php');
    }

    if (isset($_GET['del'])) {
        $emp_code = $_GET['del'];
        mysqli_query($conn, "DELETE FROM employee WHERE emp_code=$emp_code");
        $_SESSION['message'] = "employee deleted!"; 
        header('location: ../views/security.php');
    }