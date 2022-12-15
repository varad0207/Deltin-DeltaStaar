<?php
    // connection variable ->mysqli_connect(host,username,password,dbname)
    

    mysqli_connect("localhost","root","","deltinSTAAR")or die(mysqli_error($conn));
    if(isset($_SESSION['emp_id'])){
        session_start();
    }
?>