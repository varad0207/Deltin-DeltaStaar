<?php if (isset($_POST['save'])|| isset($_POST['update'])||isset($_GET['del'])) {
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
 $cat_id="";
 $emp_id="";
 $security_emp_id="";
 $visitor_name="";
 $vehicle_no="";
 $purpose="";
 $phone_no="";

$update = false;

if (isset($_POST['save'])) {
   
    $cat_id=$_POST['cat_id'];
    $emp_id=$_POST['emp_id'];
    $security_emp_id=$_POST['security_emp_id'];
    $visitor_name=$_POST['visitor_name'];
    $vehicle_no=$_POST['vehicle_no'];
    $purpose=$_POST['purpose'];
    $phone_no=$_POST['phone_no'];
    $check_in=time();
    $check_out="";


    mysqli_query($conn, "INSERT INTO visitor_log(emp_id,security_emp_id,visitor_name,vehicle_no,type,check_in,check_out,puspose,phone_no) VALUES ('$emp_id','$security_emp_id','$visitor_name','$vehicle_no','$cat_id','$purpose','$phone_no')");
    $_SESSION['message'] = "vaccination details saved";
    header('location: ../views/hrm/visitor_log.php');
}

if (isset($_POST['update'])) {

    $cat_id=$_POST['cat_id'];
    $emp_id=$_POST['emp_id'];
    $security_emp_id=$_POST['security_emp_id'];
    $visitor_name=$_POST['visitor_name'];
    $vehicle_no=$_POST['vehicle_no'];
    $purpose=$_POST['purpose'];
    $phone_no=$_POST['phone_no'];
    $check_in="";
    $check_out=time();

    mysqli_query($conn, "UPDATE visitor_log SET emp_id='$emp_id', emp_id='$emp_id',security_emp_id='$security_emp_id',visitor_name='$visitor_name',vehicle_no='$vehicle_no',type='$cat_id',check_out='$check_out',puspose='$purpose',phone_no='$phone_no'");
    $_SESSION['message'] = "Log Info updated!";
    header('location: ../views/hrm/visitor_log_table.php');
}

if (isset($_GET['del'])) {
    $vaccination_id = $_GET['del'];
    mysqli_query($conn, "DELETE FROM vaccination WHERE vaccination_id=$vaccination_id");
    $_SESSION['message'] = "Vaccination deleted!";
    header('location: ../views/hrm/visitor_log_table.php');
}