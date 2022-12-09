<?php
    // connection variable ->mysqli_connect(host,username,password,dbname)
    
$username="root";
$password="";
$server="localhost";
$db="deltinconnect1_1";
$conn= mysqli_connect($server,$username,$password,$db);
    mysqli_connect("localhost","root","","deltinconnect1_1")or die(mysqli_error($conn));
    if(isset($_SESSION['emp_id'])){
        session_start();
    }
?>