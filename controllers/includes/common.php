<?php
    // connection variable ->mysqli_connect(host,username,password,dbname);
    $conn=mysqli_connect("localhost","root","","deltastaar")or die(mysqli_error($conn));

    //fail safe for change tracking
    $AllowTrackingChanges=true;
    
    if(!isset($_SESSION)){
        session_start();
    } 
?>  