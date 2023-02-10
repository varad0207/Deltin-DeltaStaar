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

	$id = $dept = "";


	if (isset($_POST['submit'])) 
    {
	    $dept =  $_POST['dept'];
    
		mysqli_query($conn, "INSERT INTO employee_dept(dept_id, dept_name) values ('','$dept')"); 
		$_SESSION['message'] = "Employee Department details saved"; 
		header('location: ../views/config/emp_dept_table.php');
	}

    if (isset($_POST['update'])) 
    {
        $id = $_POST['id'];
        $dept =  $_POST['dept'];
        
        mysqli_query($conn, "UPDATE employee_dept SET designation = '$dept' WHERE dept_id = '$id'");
        $_SESSION['message'] = "Employee Department Info updated!"; 
        header('location: ../views/config/emp_dept_table.php');
    }

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($conn, "DELETE FROM employee_dept WHERE dept_id=$id");
        $_SESSION['message'] = "Employee Department deleted!"; 
        header('location: ../views/config/emp_dept_table.php');
    }
?>