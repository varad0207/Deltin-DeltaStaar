<?php
    // connection variable ->mysqli_connect(host,username,password,dbname);
    $conn=mysqli_connect("localhost","root","","deltastaar-final")or die(mysqli_error($conn));

    //fail safe for change tracking
    $AllowTrackingChanges=true;
    
    if(!isset($_SESSION)){
        session_set_cookie_params(0);
        session_start();
    } 
?>  