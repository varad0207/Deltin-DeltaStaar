<?php
include('../../controllers/includes/common.php');
include('../../controllers/complaint_controller.php');
if (!isset($_SESSION["emp_id"]))
    header("location:../../views/login.php");
// check rights
$isPrivilaged = 0;
$rights = unserialize($_SESSION['rights']);
if ($rights['rights_complaints'] > 0) {
    $isPrivilaged = $rights['rights_complaints'];
} else
    die('<script>alert("You dont have access to this page, Please contact admin");window.location = history.back();</script>');
$isWarden = 0;
$check = mysqli_query($conn, "select emp_id from employee where emp_id not in(select emp_id from technician) and emp_id not in (select emp_id from security) and emp_id='{$_SESSION['emp_id']}'");
if (mysqli_num_rows($check) > 0)
    $isWarden = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Favicon link-->
    <link rel="icon" type="image/x-icon" href="../../images/logo-no-name-circle.png">
    <title>DELTA@STAAR | Complaints</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- Tachyons -->
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.12.0/css/tachyons.min.css" />
    <!-- CSS files -->
    <link rel="stylesheet" href="../../css/table.css">
    <!-- Live Search -->
    <script type="text/javascript">
        function search() {
            // Declare variables
            var input, filter, listing, i, txtValue;
            input = document.getElementById("form1");
            filter = input.value.toUpperCase();
            listing = document.getElementsByClassName("live");
            // Loop through all 
            for (i = 0; i < listing.length; i++) {
                if (listing[i]) {
                    txtValue = listing[i].textContent || listing[i].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        listing[i].style.display = "";
                    } else {
                        listing[i].style.display = "none";
                        //   document.getElementById("demo").innerHTML = "No Results Found";
                    }
                }
            }
        }
    </script>
</head>

<body class="bg">
    <!-- Sidebar and Navbar-->
    <?php
    include '../../controllers/includes/sidebar.php';
    include '../../controllers/includes/navbar.php';
    ?>

    <h1 class="tc f1 lh-title spr">All Complaints</h1>
    <div class="pa1">
        <input type="search" id="form1" class="form-control" placeholder="Live Search" aria-label="Search" oninput="search()" />
    </div>
    <!-- FILTERING DATA -->
    <div class="pa1">
        <br>
        <form action="" method="GET" class="myForm">
            <label style="color:white;">Filter By</label>
            <button type="sumbit" class="btn btn-light">Go</button>
            <!-- <button type="reset" class="btn btn-light" onclick="resetForm()">Reset</button> -->
            <!-- <input type="button" value="Reset" onclick="resetForm()"> -->
            <br>
            <br>
            <table class="table">
                <thead>
                    <th>Complain Category : </th>
                    <th>Accommodation : </th>
                    <th>Sort By : </th>
                   
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php
                            $fetch_filter = "SELECT * FROM complaint_type";
                            $fetch_filter_run = mysqli_query($conn, $fetch_filter);
                            if (mysqli_num_rows($fetch_filter_run) > 0) {
                                foreach ($fetch_filter_run as $filter) {
                                    $checked1 = [];
                                    if (isset($_GET['type'])) {
                                        $checked1 = $_GET['type'];
                                    }
                            ?>
                                    <div>
                                        <input type="checkbox" name="type[]" value="<?= $filter['type']; ?>" <?php if (in_array($filter['type'], $checked1)) {
                                                                                                                        echo "checked";
                                                                                                                    }
                                                                                                                    ?>>
                                        <label><?= $filter['type']; ?></label>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "No Data available";
                            }
                            ?>
                        </td>
                        <td>
                        <?php
                            $fetch_filter = "SELECT * FROM accomodation";
                            $fetch_filter_run = mysqli_query($conn, $fetch_filter);
                            if (mysqli_num_rows($fetch_filter_run) > 0) {
                                foreach ($fetch_filter_run as $filter) {
                                    $checked1 = [];
                                    if (isset($_GET['acc_name'])) {
                                        $checked1 = $_GET['acc_name'];
                                    }
                            ?>
                                    <div>
                                        <input type="checkbox" name="acc_name[]" value="<?= $filter['acc_name']; ?>" <?php if (in_array($filter['acc_name'], $checked1)) {
                                                                                                                        echo "checked";
                                                                                                                    }
                                                                                                                    ?>>
                                        <label><?= $filter['acc_name']; ?></label>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "No Data available";
                            }
                            ?>
                        </td>
                        <td>
                        <!-- <form action="" method="post" class="myForm"> -->
                        <div class="input-group mb-3">
                            <select name="sort_alpha" class="form-control">
                                <option value="">--Select Option--</option>
                                <option value="a-z" <?php if (isset($_POST['sort_alpha']) && $_POST['sort_alpha'] == "a-z") echo "selected"; ?>>A-Z(Ascending Order)</option>
                                <option value="z-a" <?php if (isset($_POST['sort_alpha']) && $_POST['sort_alpha'] == "z-a") echo "selected"; ?>>Z-A(Descending Order)</option>
                            </select>
                        </div>
                    <!-- </form> -->
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </form>
    </div>

    <div class="table-header">
        <!-- Displaying Database Table -->
        <?php //Entries per-page
        $results_per_page = 5;

        //Number of results in the DB
        $sql = "select * from complaints";
        $result = mysqli_query($conn, $sql);
        $number_of_results = mysqli_num_rows($result);
        //number of pages
        $number_of_pages = ceil($number_of_results / $results_per_page);

        // on which is the user
        if (!isset($_GET['page']))
            $page = 1;
        else
            $page = $_GET['page'];
        //starting limit number for the results
        $this_page_first_result = ($page - 1) * $results_per_page;

        // retrieve the selected results
        // $sqli = "SELECT * FROM complaints LIMIT " . $this_page_first_result . ',' . $results_per_page;
        // $results = mysqli_query($conn, $sqli);

        ?>
        <?php if (!isset($_SESSION['emp_id'])) { ?>
            <form class="requires-validation f3 lh-copy tc" novalidate action="complaint_table.php" method="post">
                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="Id">
                    <option name="employee_code" selected>Choose...</option>

                    <?php
                    $emp_det = mysqli_query($conn, "SELECT * FROM employee");

                    foreach ($emp_det as $row) { ?>
                        <option name="employee_code" value="<?= $row["emp_code"] ?>"><?= $row["emp_code"]; ?></option>
                        <?php
                    }
                    ?>
                </select>
                <button class="btn btn-dark px-3" class="btnn" type="submit" name="save" value="save">Save</button>
            </form>
            <?php

        }


        ?>
    </div>

    <?php
    $sqli = "SELECT * FROM complaints t1 JOIN employee t2 USING(emp_code) JOIN rooms t3 ON t2.room_id=t3.id JOIN accomodation t4 USING(acc_id) JOIN complaint_type t5 ON t1.type=t5.id WHERE 1=1";
    $sort_condition = "";
    if (isset($_GET['sort_alpha'])) {
        if ($_GET['sort_alpha'] == "a-z") {
            $sort_condition = "ASC";
        } else if ($_GET['sort_alpha'] == "z-a") {
            $sort_condition = "DESC";
        }
    }
    if(isset($_GET['type'])){
        $filter_checked = [];
        $filter_checked = $_GET['type'];
        $sqli .= " AND ( ";
        foreach($filter_checked as $row_filter){
            $sqli .= " t5.type='$row_filter' OR"; 
        }
        $sqli =substr($sqli,0,strripos($sqli,"OR"));  
        $sqli .=" ) ";
        
    }
    if(isset($_GET['acc_name'])){
        $filter_checked = [];
        $filter_checked = $_GET['acc_name'];
        $sqli .= " AND ( ";
        foreach($filter_checked as $row_filter){
            $sqli .= " t4.acc_name='$row_filter' OR"; 
        }
        $sqli =substr($sqli,0,strripos($sqli,"OR"));  
        $sqli .=" ) ";
        
    }
    $sqli .=" ORDER BY t5.type $sort_condition";
    // echo $sqli;
    $complaint_qry=$sqli;
    $sqli .= " LIMIT " . $this_page_first_result . ',' . $results_per_page;
    $results = mysqli_query($conn, $sqli);
    ?>
    <div class="table-div">
        <?php if (isset($_SESSION['message'])): ?>
            <div class="msg">
                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>

            <?php
            if (isset($_POST['save']) || (isset($_SESSION['emp_id']) && $isPrivilaged)) {
            if (isset($_POST['Id']))
                $emp_code = $_POST['Id'];
            echo "<script>console.log('$emp_code')</script>";
            // $results = isset($_SESSION['emp_id']) ? mysqli_query($conn, "SELECT * FROM complaints") : mysqli_query($conn, "SELECT * FROM complaints where emp_code='$emp_code'");
            ?>

            <div class="pa1 table-responsive">
                <table class="table table-bordered tc">
                    <thead>
                        <tr>
                            <th>Complaint Id </th>
                            <th>Raised Time </th>
                            <th>Complaint Category </th>
                            <th>Description </th>
                            <th>Status </th>
                            <th>Closure Time<br>(Technician)</th>

                            <th>Closure Time<br>(Security) </th>
                            <th>Closure Time<br>(Warden) </th>
                            <th>Remarks </th>
                            <th>Employee Name </th>
                            <th>Employee Code </th>
                            <th>Accomodation Name</th>
                            <th>Room Number</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($results)) { ?>
                            <?php
                            $emp_code = $row['emp_code'];
                            $queryEmpName = mysqli_query($conn, "SELECT * FROM employee where emp_code='$emp_code'");
                            $EmpName_row = mysqli_fetch_assoc($queryEmpName);

                            $queryRoom = mysqli_query($conn, "SELECT * FROM rooms WHERE id = '{$EmpName_row['room_id']}'");
                            $EmployeeRoom_row = mysqli_fetch_assoc($queryRoom);

                            $queryAccName = mysqli_query($conn, "SELECT * FROM accomodation where acc_id='{$EmployeeRoom_row['acc_id']}'");
                            $AccName_row = mysqli_fetch_assoc($queryAccName);

                            ?>
                            <?php
                            $comp_type = $row['type'];
                            $queryCompType = mysqli_query($conn, "SELECT * FROM complaint_type WHERE id='$comp_type'");
                            $CompType_row = mysqli_fetch_assoc($queryCompType);
                            $query = mysqli_query($conn, "SELECT * FROM jobs WHERE complaint_id = '{$row['id']}'");

                            ?>
                            <tr class="live">
                                <td>
                                    <?php echo $row['id']; ?>
                                </td>
                                <td>
                                    <?php echo $row['raise_timestamp']; ?>
                                </td>
                                <!-- fetch complaint category -->
                                <td>
                                    <?php echo $row['type']; ?>
                                </td>
                                <td>
                                    <?php echo $row['description']; ?>
                                </td>
                                <td>
                                    <?php

                                    if (isset($row['tech_closure_timestamp']) && isset($row['sec_closure_timestamp']) && isset($row['warden_closure_timestamp'])) {
                                        echo "<p>Completed</p>";
                                    } else if (isset($row['tech_pending_timestamp']) && !isset($row['tech_closure_timestamp']) && !isset($row['sec_closure_timestamp']) && !isset($row['warden_closure_timestamp'])) {
                                        echo "<p>Waiting for material</p>";
                                    } else if (!isset($row['tech_closure_timestamp']) && !isset($row['sec_closure_timestamp']) && !isset($row['warden_closure_timestamp'])) {
                                        echo "<p>Not Started</p>";
                                    } else {
                                        echo "<p>In Progress</p>";
                                    }

                                    ?>
                                </td>
                                <td>
                                    <?php echo $row['tech_closure_timestamp']; ?>
                                </td>
                                <td>
                                    <?php echo $row['sec_closure_timestamp']; ?>
                                </td>
                                <td>
                                    <?php echo $row['warden_closure_timestamp']; ?>
                                </td>
                                <td>
                                    <?php echo $row['remarks']; ?>
                                </td>
                                <!-- fetch emp name -->
                                <td>
                                    <?php echo $row['fname']; ?>
                                </td>
                                <td>
                                    <?php echo $row['emp_code']; ?>
                                </td>
                                <!-- fetch acc name -->
                                <td>
                                    <?php echo $row['acc_name']; ?>
                                </td>
                                <td>
                                    <?php
                                    if (isset($row['room_no']) && !empty($row['room_no'])) {
                                        echo $row['room_no'];
                                    } else {
                                        echo $row['room_no'] = 'N/A';
                                    }
                                    ?>
                                </td>
                                <td>

                                    <?php
                                    if ($query) {
                                        if (mysqli_num_rows($query) > 0) {
                                            ?>
                                            <a href="jobs_table.php ?>" class="edit_btn"
                                                        style="color: green;">Job Raised</a>
                                            <!-- <b style="color: green;">Job Raised</b> -->
                                            <?php
                                        } else {
                                            if ($isWarden) {
                                                if ($rights['rights_jobs'] > 1 && $rights['rights_jobs'] != 5 && $rights['rights_jobs'] != 4) { ?>
                                                    <a href="jobs.php?raise=<?php echo $row['id']; ?>" class="edit_btn"
                                                        style="color: red;">Raise Job</a>
                                                    <?php
                                                }
                                            }
                                        }
                                    }
                                    ?>


                                </td>
                                <td>
                                    <?php if ($isPrivilaged >= 4) { ?>
                                        <a href="../../controllers/complaint_controller.php?del=<?php echo '%27' ?><?php echo $row['id']; ?><?php echo '%27' ?>"
                                            class="del_btn">Delete</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
            <?php

            //display the links to the pages
            for ($page = 1; $page <= $number_of_pages; $page++)
                echo '<a href="complaint_table.php?page=' . $page . '">' . $page . '</a>';
            ?>
        </div>
    </div>

    <div class="table-footer pa4">
        <div class="fl w-75 tl">
        <form action="../EXCEL_export.php" method="post">
                <button class="btn btn-warning" name="complaint_export" value="<?php echo $complaint_qry;?>"><h4><i class="bi bi-file-earmark-pdf"> Export</i></h4></button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="tc f3 lh-copy mt4">Copyright &copy; 2022 Delta@STAAR. All Rights Reserved</footer>
</body>

</html>