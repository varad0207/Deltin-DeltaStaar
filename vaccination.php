<?php
    $conn=mysqli_connect("localhost","root","","deltin_connect");

if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $emp_id= $_POST['emp_id'];
    $category=$_POST['cat_id'];
    $dateofadministration=date('Y-m-d',strtotime($_POST['doa']));
    $nextdose=date('Y-m-d',strtotime($_POST['dond']));
    $location=$_POST['loc'];
    //echo $nextdose;
    echo $location;

    echo "<script>console.log('1')</script>";
    $insert = "insert into vaccination(emp_id,category_id,date_of_administration,location,date_of_next_dose) values ('$emp_id','$category','$dateofadministration','$location','$nextdose',)";
    $submit = mysqli_query($conn, $insert); //or die(mysqli_error($conn));

    if($submit){
        $_SESSION['status']="insertion succesful";
        header("location: ../index.html");
     }
     else{
        $_SESSION['status']="insertion not succesful";
        header("location:/Applications/XAMPP/xamppfiles/htdocs/frontend-main/index.html");
     }
    
}