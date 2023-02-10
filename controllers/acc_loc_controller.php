<?php 
if (isset($_POST['submit'])|| isset($_POST['update'])||isset($_GET['del'])) {
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

	$id = $loc = "";


	if (isset($_POST['submit'])) 
    {
	    $loc =  $_POST['loc'];
    
		mysqli_query($conn, "INSERT INTO acc_locations(loc_id, location) values ('','$loc')"); 
		$_SESSION['message'] = "Accommodation Location details saved"; 
		header('location: ../views/config/acc_loc_table.php');
	}

    if (isset($_POST['update'])) 
    {
        $id = $_POST['id'];
        $loc =  $_POST['loc'];
        
        mysqli_query($conn, "UPDATE acc_locations SET location = '$loc' WHERE loc_id = '$id'");
        $_SESSION['message'] = "Accommodation Location Info updated!"; 
        header('location: ../views/config/acc_loc_table.php');
    }

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($conn, "DELETE FROM acc_locations WHERE loc_id=$id");
        $_SESSION['message'] = "Accommodation Location deleted!"; 
        header('location: ../views/config/acc_loc_table.php');
    }
?>