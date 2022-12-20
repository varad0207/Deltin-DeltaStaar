<?php
    // connection variable ->mysqli_connect(host,username,password,dbname);
    $conn=mysqli_connect("localhost","root","","deltaSTAAR1_1")or die(mysqli_error($conn));
    if(!isset($_SESSION['emp_id'])){
        session_start();
    } 
?>  