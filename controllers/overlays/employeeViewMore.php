<?php require "../../controllers/includes/common.php";
// die();

if (isset($_REQUEST['employeecode'])) {

    $employeecode = $_REQUEST['employeecode'];
    $acc_name = "";
    $room_number = "";
    if ($employeecode != "") {
        $row12 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM employee JOIN employee_designation ON employee_designation.id = employee.designation JOIN employee_dept ON employee_dept.dept_id = employee.department AND employee.emp_code='$employeecode'"));

        if ($row12['room_id'] == "") {
            $acc_name = "N.A";
            $room_number = "N.A";
        } else {
            $room_id = $row12['room_id'];
            $room_det = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM rooms where id=$room_id"));
            $room_number = $room_det['room_no'];
            $acc_id = $room_det['acc_id'];
            $acc_det = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM accomodation where acc_id=$acc_id"));
            $acc_name = $acc_det['acc_name'];
        }
    }
}

?>

<head>
    <link rel="stylesheet" href="../../css/tracking.css?v=1.1.3">
</head>
<style>
    @media only screen and (max-width: 695px) {
        .overlay-content {
            overflow-y: auto;
            height: 475px;
        }

        .wrap {
            flex-direction: column;
        }

    }
</style>

<!-- overlay code start -->
<div class="overlay" id="overlay" style="z-index:9999;">
    <div class="overlay-window" style="width: 80vw;max-width:100vw;height:80vh; min-height:475px;min-width:350px;">
        <div class="overlay-window-titlebar">
            <span class="overlay-title">Employee Details</span>
            <button id="close" class="close material-icons" onclick="document.querySelectorAll('.overlay').forEach(a=>a.style.display = 'none');">close</button>
        </div>
        <div class="overlay-content" style="color:black;text-align:center;">
            <div class="wrap" style="display:flex;justify-content:space-around;">
                <div class="left" style="display:block;text-align: left;">
                    <p class="card-text">Employee Name : <b><?php echo $row12['fname'];
                                                            echo " ";
                                                            echo $row12['lname']; ?></b></p>
                    <p class="card-text">Employee code :<b><?php echo $row12['emp_code']; ?></b></p>
                    <p class="card-text">Designation : <b><?php echo $row12['designation']; ?></b></p>
                    <p class="card-text">Department : <b><?php echo $row12['dept_name']; ?></b></p>
                    <p class="card-text">Salary : <b><?php echo $row12['salary']; ?></b></p>
                    <p class="card-text">Joining Date : <b><?php echo date('d-m-Y', strtotime($row12['joining_date'])); ?></b></p>
                    <p class="card-text">Contact : <b><?php echo $row12['contact']; ?></b></p>
                    <p class="card-text">Email : <b><?php echo $row12['email']; ?></b></p>
                    <?php if ($row12['room_id'] != "") {
                        $result = mysqli_query($conn, "SELECT emp_code, history FROM change_tracking_living_history");
                        $flag=false;
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($row['emp_code'] == $row12['emp_code']) {
                                $historyobj = $row['history'];
                                $flag=true;
                                break;
                            }
                        }
                        if($flag){
                            $dataArray = json_decode($historyobj, true);
                            $numItems = count($dataArray);
                            if ($numItems > 1) { 
                                if ($numItems >= 3) {
                                    $dataArray = array_slice($dataArray, -3, 3, true);
                                }
                                $lastKey = array_key_last($dataArray);
                                $firstKey = array_key_first($dataArray);
                                ?>
                            <p>
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-10 hh-grayBox pt45 pb20">
                                        <div class="row justify-content-between">
                                            <?php foreach ($dataArray as $key => $item) { ?>
                                                <div class="order-tracking <?php if ($key !== $lastKey) {echo "completed";} ?>">
                                                <span class="is-complete"></span>
                                                    <p style="font-size:smaller;"><?php echo $item['accomodation'] ?><br><span><?php echo $item['room'] ?></span></p>
                                                </div>

                                            <?php

                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </p>
                    <?php }
                    } 
                }?>
                </div>

                <div class="right" style="display:block;text-align: left;">
                    <p class="card-text" style="white-space: pre-wrap;width:200px;">Address : <b><?php echo $row12['address']; ?></b></p>
                    <p class="card-text">State : <b><?php echo $row12['state']; ?></b></p>
                    <p class="card-text">Country : <b><?php echo $row12['country']; ?></b></p>
                    <p class="card-text">Pincode : <b><?php echo $row12['pincode']; ?></b></p>
                    <p class="card-text">Date of birth : <b><?php echo date('d-m-Y', strtotime($row12['dob'])); ?></b></p>
                    <p class="card-text">Blood group : <b><?php echo $row12['blood_group']; ?></b></p>
                    <p class="card-text">Aadhar number : <b><?php echo $row12['aadhaar_number']; ?></b></p>
                    <p class="card-text">Accomodation name : <b><?php echo $acc_name; ?></b></p>
                    <p class="card-text">Room number : <b><?php echo $room_number; ?></b></p>
                </div>
            </div>
            <div class="overlay-window-footer" style="display:flex;justify-content:center;margin-top:auto;margin-bottom:10px;">
                <Button class="btn btn-secondary btn2" onclick="document.querySelectorAll('.overlay').forEach(a=>a.style.display = 'none');">Back</Button>
            </div>
        </div>

    </div>
</div>
<!-- overlay end -->