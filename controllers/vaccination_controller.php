<?php if (isset($_POST['save'])|| isset($_POST['update'])||isset($_GET['del'])) {
    include('../controllers/includes/common.php');
}else{
    include('../../controllers/includes/common.php');
}
?>
<?php

if (!isset($_SESSION)) {
    session_start();
}
// initialize variables
$emp_id="";
$category="";
$dateofadministration="";
$nextdose="";
$location="";

$update = false;

if (isset($_POST['save'])) {
    $vaccination_id = $_POST['vaccination_id'];
    $emp_id= $_POST['emp_id'];
    $category=$_POST['cat_id'];
    $dateofadministration=date('Y-m-d',strtotime($_POST['doa']));
    $nextdose=date('Y-m-d',strtotime($_POST['dond']));
    $location=$_POST['loc'];


    mysqli_query($conn, "INSERT INTO vaccination(emp_id,category_id,date_of_administration,location,date_of_next_dose) VALUES ('$emp_id','$category','$dateofadministration','$location','$nextdose')");
    $_SESSION['message'] = "vaccination details saved";
    header('location: ../views/hrm/vaccination.php');
}

if (isset($_POST['update'])) {

    $vaccination_id = $_POST['vaccination_id'];
    $emp_id= $_POST['emp_id'];
    $category=$_POST['cat_id'];
    $dateofadministration=date('Y-m-d',strtotime($_POST['doa']));
    $nextdose=date('Y-m-d',strtotime($_POST['dond']));
    $location=$_POST['loc'];

    mysqli_query($conn, "UPDATE vaccination SET emp_id='$emp_id', category_id='$category',date_of_administration='$dateofadministration',location='$location',date_of_next_dose='$nextdose' WHERE vaccination_id='$vaccination_id'");
    $_SESSION['message'] = "Vaccnation Info updated!";
    header('location: ../views/hrm/vaccination_table.php');
}

if (isset($_GET['del'])) {
    $vaccination_id = $_GET['del'];
    mysqli_query($conn, "DELETE FROM vaccination WHERE vaccination_id=$vaccination_id");
    $_SESSION['message'] = "Vaccination deleted!";
    header('location: ../views/hrm/vaccination_table.php');
}