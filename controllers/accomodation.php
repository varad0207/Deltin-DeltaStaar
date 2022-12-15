<?php
require "includes/common.php";
$acode = $aname = $bldg = $loc = $gender = $tot_capacity = $rooms = $arooms = $orooms = $owner = $remark = "";

if (isset($_POST['submit']) && !empty($_POST['submit']))
{
    $acode = mysqli_real_escape_string($conn, $_POST['code']);
    $aname = mysqli_real_escape_string($conn, $_POST['name']);
    $bldg = mysqli_real_escape_string($conn, $_POST['bldg']);
    $loc = mysqli_real_escape_string($conn, $_POST['loc']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $tot_capacity = mysqli_real_escape_string($conn, $_POST['cap']);
    $rooms = mysqli_real_escape_string($conn, $_POST['rooms']);
    $arooms = mysqli_real_escape_string($conn, $_POST['arooms']);
    $orooms = mysqli_real_escape_string($conn, $_POST['orooms']);
    $owner = mysqli_real_escape_string($conn, $_POST['owner']);
    $remark = mysqli_real_escape_string($conn, $_POST['remark']);

    echo "<script>console.log('1')</script>";

    $insert = "insert into accomodation (acc_id, acc_code, acc_name, bldg_status, location, gender, tot_capacity, no_of_rooms, occupied_rooms, available_rooms, owner, remark) values ('', '$acode', '$aname', '$bldg', '$loc', '$gender', '$tot_capacity', '$rooms', '$arooms', '$orooms', '$owner', '$remark')";

    echo mysqli_error($conn);
    $submit = mysqli_query($conn, $insert) or die(mysqli_error($conn));
    header("location: ../index.html");
}
?>