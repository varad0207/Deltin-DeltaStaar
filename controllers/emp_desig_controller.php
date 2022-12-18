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
        $designation = "";
    }

    if(isset($_POST['submit']) && !empty($_POST['submit']))
    {
        $designation = mysqli_real_escape_string($conn, $_POST['designation']);

        $insert = "insert into employee_designation (desig_id, designation) values ('', '$designation')";

        echo mysqli_error($conn);
        $submit = mysqli_query($conn, $insert) or die(mysqli_error($conn));
        $_SESSION['message'] = "Employee Designation Added!";
        header("location: ../index.html");
    }
?>