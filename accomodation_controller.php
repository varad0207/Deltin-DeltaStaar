<?php  include('../controllers/includes/common.php'); ?>
<?php 
	
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


	// initialize variables
	$acc_code = "";
	$acc_name = "";
    $bldg_status =  "";
    $location = "";
    $gender = "";
    $tot_capacity = "";
    $no_of_rooms = "";
    $occupied_rooms = "";
    $available_rooms = "";
    $owner = "";
    $remark = "";
    
	$update = false;

	if (isset($_POST['save'])) {
	$acc_code =  $_POST['acc_code'];
    $acc_name = $_POST['acc_name'];
    $bldg_status = $_POST['bldg_status'];
    $location =  $_POST['location'];
    $gender = $_POST['gender'];
    $tot_capacity = $_POST['tot_capacity'];
    $no_of_rooms = $_POST['no_of_rooms'];
    $occupied_rooms = $_POST['occupied_rooms'];
    $available_rooms = $_POST['available_rooms'];
    $owner = $_POST['owner'];
    $remark = $_POST['remark'];

		mysqli_query($conn, "INSERT INTO accomodation( acc_code, acc_name, bldg_status, location, gender, tot_capacity, no_of_rooms, occupied_rooms, available_rooms, owner, remark) values ( '$acc_code', '$acc_name', '$bldg_status', '$location', '$gender', '$tot_capacity', '$no_of_rooms', '$occupied_rooms', '$available_rooms', '$owner', '$remark')"); 
		$_SESSION['message'] = "accomodation details saved"; 
		header('location: ../index.html');
	}

    if (isset($_POST['update'])) {
        $acc_code =  $_POST['acc_code'];
        $acc_name = $_POST['acc_name'];
        $bldg_status = $_POST['bldg_status'];
        $location =  $_POST['location'];
        $gender = $_POST['gender'];
        $tot_capacity = $_POST['tot_capacity'];
        $no_of_rooms = $_POST['no_of_rooms'];
        $occupied_rooms = $_POST['occupied_rooms'];
        $available_rooms = $_POST['available_rooms'];
        $owner = $_POST['owner'];
        $remark = $_POST['remark'];
    
    
        mysqli_query($conn, "UPDATE accomodation SET acc_code='$acc_code', acc_name='$acc_name',bldg_status='$bldg_status',location='$location',gender='$gender',tot_capacity='$tot_capacity',no_of_rooms='$no_of_rooms',occupied_rooms='$occupied_rooms',available_rooms='$available_rooms',owner='$owner',remark='$remark' WHERE acc_code=$acc_code");
        $_SESSION['message'] = "Accomodation Info updated!"; 
        header('location: ../index.html');
    }

    if (isset($_GET['del'])) {
        $emp_code = $_GET['del'];
        mysqli_query($conn, "DELETE FROM accomodation WHERE acc_code=$acc_code");
        $_SESSION['message'] = "Accomodation deleted!"; 
        header('location: ../index.html');
    }
