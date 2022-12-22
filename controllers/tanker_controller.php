<?php
if (isset($_POST['submit'])|| isset($_POST['update'])||isset($_GET['del'])) {
    include('includes/common.php');
}else{
    include('includes/common.php');
}
?>

<?php
    date_default_timezone_set('Asia/Calcutta');
    if(!isset($_SESSION))
    {
        session_start();
        $acc_id = $emp_sec_id = $ven_id = $quality = $qty = $bill_no = $timestamp = "";

    }

    if(isset($_POST['submit']))
    {
        $acc_id = $_POST['acc'];
        $emp_sec_id = $_POST['sec'];
        $ven_id = $_POST['ven'];
        $quality = $_POST['quality'];
        $qty = $_POST['qty'];
        $bill_no = $_POST['billno'];
        $timestamp = time();

        mysqli_query($conn, "INSERT INTO tankers (id, acc_id, security_emp_id, quality_check, qty, bill_no, vendor_id, timestamp) VALUES ('', '$acc_id', '$emp_sec_id', '$ven_id', '$quality', '$qty', '$bill_no', '$timestamp')");

        $_SESSION['message'] = "Tanker Info Added!";
        header("location: ../dashboard.php");
    }
?>