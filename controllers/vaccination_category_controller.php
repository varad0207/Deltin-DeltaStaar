<?php  include('includes/common.php'); ?>
<?php 
	
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


	// initialize variables
	$category_name = "";
	$category_id = "";
    
	$update = false;

	if (isset($_POST['save'])) {
	$category_name =  $_POST['category_name'];
    $category_id = $_POST['category_id'];
    

		mysqli_query($conn, "INSERT INTO vaccination_category( category_name, category_id) values ( '$category_name', '$category_id')"); 
		$_SESSION['message'] = "Vaccination Category details saved"; 
		header('location: ../index.html');
	}

    if (isset($_POST['update'])) {
        $category_name =  $_POST['category_name'];
        $category_id = $_POST['category_id'];
    
        mysqli_query($conn, "UPDATE vaccination_category SET category_name='$category_name', category_id='$category_id' WHERE category_id=$category_id");
        $_SESSION['message'] = "Vaccination Category Info updated!"; 
        header('location: ../index.html');
    }

    if (isset($_GET['del'])) {
        $emp_code = $_GET['del'];
        mysqli_query($conn, "DELETE FROM vaccination_category WHERE category_id=$category_id");
        $_SESSION['message'] = "Vaccination Category deleted!"; 
        header('location: ../index.html');
    }
