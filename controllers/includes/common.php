<?php
    // connection variable ->mysqli_connect(host,username,password,dbname);
    $conn=mysqli_connect("localhost","root","","deltinstaar")or die(mysqli_error($conn));

<<<<<<< HEAD
   
=======
    $conn=mysqli_connect("localhost","root","","deltinstaar")or die(mysqli_error($conn));
>>>>>>> 730b03032d76189936f48d699b6cd9b90f12cabd
    if(isset($_SESSION['emp_id'])){
        session_start();
    } 
?>