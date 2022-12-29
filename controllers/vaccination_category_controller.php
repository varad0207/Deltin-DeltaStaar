<?php if (isset($_POST['submit'])|| isset($_POST['update'])||isset($_GET['del'])) {
    include('includes/common.php');
}else{
    include('includes/common.php');
}
?>
<?php 
	
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

	$category_name = "";
    
	$update = false;

	if (isset($_POST['submit'])) {
	$category_name =  $_POST['category_name'];
    
		mysqli_query($conn, "INSERT INTO vaccination_category( category_name, category_id) values ( '$category_name', '')"); 
		$_SESSION['message'] = "Vaccination Category details saved"; 
		header('location: ../views/config/vaccination_category_table.php');
	}

    if (isset($_POST['update'])) {
        $category_name =  $_POST['category_name'];
        
    
        mysqli_query($conn, "UPDATE vaccination_category SET category_name='$category_name', WHERE category_id=$category_id");
        $_SESSION['message'] = "Vaccination Category Info updated!"; 
        header('location: ../views/config/vaccination_category_table.php');
    }

    if (isset($_GET['del'])) {
        $emp_code = $_GET['del'];
        mysqli_query($conn, "DELETE FROM vaccination_category WHERE category_id=$category_id");
        $_SESSION['message'] = "Vaccination Category deleted!"; 
        header('location: ../views/config/vaccination_category_table.php');
    }
