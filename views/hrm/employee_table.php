<?php
include('../../controllers/includes/common.php');
include('../../controllers/employee_controller.php');

if (!isset($_SESSION["emp_id"]))
    header("location:../../views/login.php");
// check rights
$isPrivilaged = 0;
$rights = unserialize($_SESSION['rights']);
if ($rights['rights_employee_details'] > 0) {
    $isPrivilaged = $rights['rights_employee_details'];
} else
    die('<script>alert("You dont have access to this page, Please contact admin");window.location = history.back();</script>');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Favicon link-->
    <link rel="icon" type="image/x-icon" href="../../images/logo-no-name-circle.png">
    <title>DELTA@STAAR | Employee Details</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- Tachyons -->
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.12.0/css/tachyons.min.css" />
    <!-- CSS files -->
    <link rel="stylesheet" href="../../css/sidebar.css">
    <link rel="stylesheet" href="../../css/table.css">
    <link rel="stylesheet" href="../../css/form.css">
    <!-- Live Search -->
    <script type="text/javascript">
        function search() {
            // Declare variables
            var input, filter, listing, i, txtValue;
            input = document.getElementById("form1");
            filter = input.value.toUpperCase();
            listing = document.getElementsByTagName("tr");
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
        function formReset() {
            document.getElementsByClassName("myForm").reset();
        }
    </script>
</head>

<body class="bg">
    <!-- Sidebar and Navbar-->
    <?php
   include '../../controllers/includes/sidebar.php';
   include '../../controllers/includes/navbar.php';
   ?>

    <h1 class="tc f1 lh-title spr">Employee Details</h1>
    <div class="item fl w-60 pl4">
        <input type="search" id="form1" class="form-control" placeholder="Search" aria-label="Search" oninput="search()" />
    </div>
    <div class="fl w-40 tr pr5">
        <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
        <h5><i class="bi bi-filter-circle">Filter</i></h5>
        </button>

        <div class="offcanvas offcanvas-top text-bg-dark" data-bs-backdrop="static" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title f2 lh-copy" id="offcanvasTopLabel">DeltaSTAAR</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body offcanvas-size">
                <div>     
                    <!-- Sort and Filter -->
                    <div class="container">
                        <form action="" method="post">
                            <div class="item">
                                <form action="" method="post" class="myForm">
                                    <div class="input-group mb-3">
                                        <select name="sort_alpha" class="form-control">
                                            <option value="">--Select Option--</option>
                                            <option value="a-z" <?php if(isset($_POST['sort_alpha']) && $_POST['sort_alpha'] == "a-z") echo "selected"; ?> >A-Z(Ascending Order)</option>
                                            <option value="z-a" <?php if(isset($_POST['sort_alpha']) && $_POST['sort_alpha'] == "z-a") echo "selected"; ?> >Z-A(Descending Order)</option>
                                        </select>
                                        <button class="btn btn-dark">
                                        <i class="bi bi-filter-circle"> Sort By</i>
                                        </button>
                                    </div>
                                </form>
                                </div>   
                            </div>
                            <div class="parent tc">
                                <form action="" method="post" class="myForm">
                                    <h4>Filter By:</h4> 
                                            <div class="fl w-third pa2">
                                            Designation 
                                            <?php
                                            $res1 = mysqli_query($conn, "SELECT * FROM employee_designation");
                                            if(mysqli_num_rows($res1) > 0){
                                                foreach($res1 as $r1){
                                                    $checked1 = [];
                                                    if(isset($_POST['designations'])){
                                                        $checked1 = $_POST['designations'];
                                                    }
                                                    ?>
                                                    
                                                    <div class="check">
                                                        <input type="checkbox" name="designations[]" value="<?= $r1['id'] ?>"
                                                        <?php
                                                        if(in_array($r1['id'],$checked1)) echo "checked";
                                                        ?>
                                                        >
                                                        <?= $r1['designation'] ?>
                                                    </div>
                                                
                                                    <?php
                                                }
                                            }
                                            else{
                                                echo "No Record";
                                            }
                                            ?>
                                            <label>Click to Filter</label>
                                            <button type="submit" class="btn btn-dark">Filter</button>
                                            <!-- <button class="btn btn-dark" onclick="formReset()">Reset</button> -->
                                            </div>
                                            <div class="fl w-third pa2">
                                            Department 
                                                <?php
                                                $res2 = mysqli_query($conn, "SELECT * FROM employee_dept");
                                                if(mysqli_num_rows($res2) > 0){
                                                    foreach($res2 as $r2){
                                                        $checked2 = [];
                                                        if(isset($_POST['departments'])){
                                                            $checked2 = $_POST['departments'];
                                                        }
                                                        ?>
                                                        
                                                        <div class="check">
                                                            <input type="checkbox" name="departments[]" value="<?= $r2['dept_id'] ?>"
                                                            <?php
                                                            if(in_array($r2['dept_id'],$checked2)) echo "checked";
                                                            ?>
                                                            >
                                                            <?= $r2['dept_name'] ?>
                                                        </div>
                                                    
                                                        <?php
                                                    }
                                                }
                                                else{
                                                    echo "No Record";
                                                }
                                                ?>
                                                <label>Click to Filter</label>
                                                <button type="submit" class="btn btn-dark">Filter</button>
                                                <!-- <button class="btn btn-dark" onclick="formReset()">Reset</button> -->
                                            </div>
                                            <div class="fl w-third pa2">
                                            Joining Date
                                            <form action="" method="post" class="myForm">
                                                <div class="form-group md-2">
                                                    <label>From Date</label>
                                                    <input type="date" name="start_date" class="form-control" value="<?php if(isset($_POST['start_date'])) echo $_POST['start_date']; ?>">
                                                </div>
                                                <div class="form-group md-2">
                                                    <label>To Date</label>
                                                    <input type="date" name="to_date" class="form-control" value="<?php if(isset($_POST['to_date'])) echo $_POST['to_date']; ?>">
                                                </div>
                                                <div class="form-group md-2">
                                                    <label>Click to Filter</label>
                                                    <button type="submit" class="btn btn-dark">Filter</button>
                                                    <!-- <button class="btn btn-dark" onclick="formReset()">Reset</button> -->
                                                </div>
                                            </form>
                                            </div>
                                </form>
                                <!-- <label>Click to Reset</label> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Displaying Database Table -->

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
        //Entries per-page
        $results_per_page = 5;

        //Number of results in the DB
        $sql = "select * from employee";
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
        $sqli = "SELECT * FROM employee LIMIT " . $this_page_first_result . ',' . $results_per_page;
        $results = mysqli_query($conn, $sqli);

        ?>

        <div class="pa1 table-responsive">
            <table class="table table-bordered tc">
                <thead>
                    <tr>
                        <th scope="col">Employee Code</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Department</th>
                        <th scope="col">Joining Date</th>
                        <th scope="col">State</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    
        <!-- Sort -->
        <?php 
        $sort_condition = "";
        if(isset($_POST['sort_alpha']))
        {
            if($_POST['sort_alpha'] == "a-z"){
                $sort_condition = "ASC";
            }
            else if($_POST['sort_alpha'] == "z-a"){
                $sort_condition = "DESC";
            }
        }
        // $results = mysqli_query($conn, "SELECT * FROM employee JOIN employee_designation ON employee_designation.id = employee.designation LIMIT " . $this_page_first_result . ',' . $results_per_page); 
        $results = mysqli_query($conn, "SELECT * FROM employee JOIN employee_designation ON employee_designation.id = employee.designation ORDER BY fname $sort_condition");
        ?>
        <!-- Filter according to date -->
        <?php
        if(isset($_POST['start_date']) && isset($_POST['to_date']))
        {
            $start_date = $_POST['start_date'];
            $to_date = $_POST['to_date'];

            $results = mysqli_query($conn, "SELECT * FROM employee WHERE joining_date BETWEEN '$start_date' AND '$to_date' ORDER BY fname $sort_condition");
        }
        ?>
        <!-- Filter -->
        <?php
        if(isset($_POST['designations']))
        {
            $desigChecked = [];
            $desigChecked = $_POST['designations'];
            foreach($desigChecked as $desigRow)
            {
                $results = mysqli_query($conn, "SELECT * FROM employee WHERE designation IN('$desigRow')");
                if(mysqli_num_rows($results) > 0){
                    while($row = mysqli_fetch_array($results)){
                        ?>
                        <?php
                        $desigid = $row['designation'];
                        $queryEmployeeDesig = mysqli_query($conn, "SELECT * FROM employee_designation WHERE id='$desigid' OR designation = '$desigid'");
                        $EmployeeDesig_row = mysqli_fetch_assoc($queryEmployeeDesig);
                    ?>
                    <?php
                        $deptid = $row['department'];
                        $queryEmpDept = mysqli_query($conn, "SELECT * FROM employee_dept WHERE dept_id='$deptid'");
                        $EmployeeDept_row = mysqli_fetch_assoc($queryEmpDept);
                    ?>
                    <?php
                        $roomid = $row['room_id'];
                        $queryRoom = mysqli_query($conn, "SELECT * FROM rooms WHERE id = '$roomid'");
                        $EmployeeRoom_row = mysqli_fetch_assoc($queryRoom);
                    ?>
                    <?php
                        // $accid = $EmployeeRoom_row['acc_id'];

                        if (isset($EmployeeRoom_row['acc_id']) && !empty($EmployeeRoom_row['acc_id'])) {
                            $queryAcc = mysqli_query($conn, "SELECT * FROM accomodation where acc_id='{$EmployeeRoom_row['acc_id']}'");
                            $Acc_row = mysqli_fetch_assoc($queryAcc);
                            $accName = $Acc_row['acc_name'];
                          } else {
                            $accName = 'N/A';
                          }

                    ?>
                    <tr>
                        <th scope="row"><?php echo $row['emp_code']; ?></th>
                        <td>
                            <?php echo $row['fname']; ?>
                        </td>
                        <td>
                            <?php echo $row['mname']; ?>
                        </td>
                        <td>
                            <?php echo $row['lname']; ?>
                        </td>
                        <td>
                            <?php echo $EmployeeDesig_row['designation']; ?>
                        </td>
                        <td>
                            <?php echo $EmployeeDept_row['dept_name']; ?>
                        </td>
                        <td>
                            <?php echo date('d-m-Y', strtotime($row['joining_date'])); ?>
                        </td>
                        <td>
                            <?php echo $row['state']; ?>
                        </td>
                        
                        <td>
                            <?php echo $row['contact']; ?>
                        </td>
                        <td style="text-align: center;">
                        <a href="./emp_viewmore.php?id=<?php echo $row['emp_code']?> " class="btn btn-primary">View More</a>
                            <a href="./employee.php?edit=<?php echo '%27' ?><?php echo $row['emp_code']; ?><?php echo '%27' ?>"
                                class="edit_btn"> <i class="bi bi-pencil-square"
                                    style="font-size: 1rem; color: black;"></i></a>
                            &nbsp;
                            <a href="../../controllers/employee_controller.php?del=<?php echo '%27' ?><?php echo $row['emp_code']; ?><?php echo '%27' ?>"
                                class="del_btn"><i class="bi bi-trash" style="font-size: 1rem; color: black;"></i></a>
                        </td>
                    </tr>
                    <?php }
                    } 
                    ?>
                    <?php
                    }
                }
        if(isset($_POST['departments']))
        {
            $deptChecked = [];
            $deptChecked = $_POST['departments'];
            
            foreach($deptChecked as $deptRow)
            {
                $results = mysqli_query($conn, "SELECT * FROM employee WHERE department IN('$deptRow')");
                if(mysqli_num_rows($results) > 0){
                    while($row = mysqli_fetch_array($results)){
                        ?>
                        <?php
                        $desigid = $row['designation'];
                        $queryEmployeeDesig = mysqli_query($conn, "SELECT * FROM employee_designation WHERE id='$desigid' OR designation = '$desigid'");
                        $EmployeeDesig_row = mysqli_fetch_assoc($queryEmployeeDesig);
                    ?>
                    <?php
                        $deptid = $row['department'];
                        $queryEmpDept = mysqli_query($conn, "SELECT * FROM employee_dept WHERE dept_id='$deptid'");
                        $EmployeeDept_row = mysqli_fetch_assoc($queryEmpDept);
                    ?>
                    <?php
                        $roomid = $row['room_id'];
                        $queryRoom = mysqli_query($conn, "SELECT * FROM rooms WHERE id = '$roomid'");
                        $EmployeeRoom_row = mysqli_fetch_assoc($queryRoom);
                    ?>
                    <?php
                        // $accid = $EmployeeRoom_row['acc_id'];

                        if (isset($EmployeeRoom_row['acc_id']) && !empty($EmployeeRoom_row['acc_id'])) {
                            $queryAcc = mysqli_query($conn, "SELECT * FROM accomodation where acc_id='{$EmployeeRoom_row['acc_id']}'");
                            $Acc_row = mysqli_fetch_assoc($queryAcc);
                            $accName = $Acc_row['acc_name'];
                          } else {
                            $accName = 'N/A';
                          }

                    ?>
                    <tr>
                        <th scope="row"><?php echo $row['emp_code']; ?></th>
                        <td>
                            <?php echo $row['fname']; ?>
                        </td>
                        <td>
                            <?php echo $row['mname']; ?>
                        </td>
                        <td>
                            <?php echo $row['lname']; ?>
                        </td>
                        <td>
                            <?php echo $EmployeeDesig_row['designation']; ?>
                        </td>
                        <td>
                            <?php echo $EmployeeDept_row['dept_name']; ?>
                        </td>
                        <td>
                            <?php echo date('d-m-Y', strtotime($row['joining_date'])); ?>
                        </td>
                        <td>
                            <?php echo $row['state']; ?>
                        </td>
                        
                        <td>
                            <?php echo $row['contact']; ?>
                        </td>
                        <td style="text-align: center;">
                        <a href="./emp_viewmore.php?id=<?php echo $row['emp_code']?> " class="btn btn-primary">View More</a>
                            <a href="./employee.php?edit=<?php echo '%27' ?><?php echo $row['emp_code']; ?><?php echo '%27' ?>"
                                class="edit_btn"> <i class="bi bi-pencil-square"
                                    style="font-size: 1rem; color: black;"></i></a>
                            &nbsp;
                            <a href="../../controllers/employee_controller.php?del=<?php echo '%27' ?><?php echo $row['emp_code']; ?><?php echo '%27' ?>"
                                class="del_btn"><i class="bi bi-trash" style="font-size: 1rem; color: black;"></i></a>
                        </td>
                    </tr>
                    <?php }
                    } 
                    ?>
                    <?php
            }
        }
        ?>
            <?php 
            if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_array($results)) 
            { ?>
            <?php
                        $desigid = $row['designation'];
                        $queryEmployeeDesig = mysqli_query($conn, "SELECT * FROM employee_designation WHERE id='$desigid' OR designation = '$desigid'");
                        $EmployeeDesig_row = mysqli_fetch_assoc($queryEmployeeDesig);
                    ?>
                    <?php
                        $deptid = $row['department'];
                        $queryEmpDept = mysqli_query($conn, "SELECT * FROM employee_dept WHERE dept_id='$deptid'");
                        $EmployeeDept_row = mysqli_fetch_assoc($queryEmpDept);
                    ?>
                    <?php
                        $roomid = $row['room_id'];
                        $queryRoom = mysqli_query($conn, "SELECT * FROM rooms WHERE id = '$roomid'");
                        $EmployeeRoom_row = mysqli_fetch_assoc($queryRoom);
                    ?>
                    <?php
                        // $accid = $EmployeeRoom_row['acc_id'];

                        if (isset($EmployeeRoom_row['acc_id']) && !empty($EmployeeRoom_row['acc_id'])) {
                            $queryAcc = mysqli_query($conn, "SELECT * FROM accomodation where acc_id='{$EmployeeRoom_row['acc_id']}'");
                            $Acc_row = mysqli_fetch_assoc($queryAcc);
                            $accName = $Acc_row['acc_name'];
                          } else {
                            $accName = 'N/A';
                          }

                    ?>

                    <tr>
                        <th scope="row"><?php echo $row['emp_code']; ?></th>
                        <td>
                            <?php echo $row['fname']; ?>
                        </td>
                        <td>
                            <?php echo $row['mname']; ?>
                        </td>
                        <td>
                            <?php echo $row['lname']; ?>
                        </td>
                        <td>
                            <?php echo $EmployeeDesig_row['designation']; ?>
                        </td>
                        <td>
                            <?php echo $EmployeeDept_row['dept_name']; ?>
                        </td>
                        <td>
                            <?php echo date('d-m-Y', strtotime($row['joining_date'])); ?>
                        </td>
                        <td>
                            <?php echo $row['state']; ?>
                        </td>
                        
                        <td>
                            <?php echo $row['contact']; ?>
                        </td>
                        <td style="text-align: center;">
                        <a href="./emp_viewmore.php?id=<?php echo $row['emp_code']?> " class="btn btn-primary">View More</a>
                            <a href="./employee.php?edit=<?php echo '%27' ?><?php echo $row['emp_code']; ?><?php echo '%27' ?>"
                                class="edit_btn"> <i class="bi bi-pencil-square"
                                    style="font-size: 1rem; color: black;"></i></a>
                            &nbsp;
                            <a href="../../controllers/employee_controller.php?del=<?php echo '%27' ?><?php echo $row['emp_code']; ?><?php echo '%27' ?>"
                                class="del_btn"><i class="bi bi-trash" style="font-size: 1rem; color: black;"></i></a>
                        </td>
                    </tr>
                    <?php }
                    } 
                    ?>
                </tbody>
            </table>

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php for ($page = 1; $page <= $number_of_pages; $page++): ?>
                    <li class="page-item <?php if ($page == $current_page)
            echo 'active'; ?>">
                        <a class="page-link" href="employee_table.php?page=<?php echo $page; ?>">
                            <?php echo $page; ?>
                        </a>
                    </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>
    </div>

    <div class="table-footer pa4">
        <div class="fl w-75 tl">
            <button class="btn btn-warning">
                <h4><i class="bi bi-file-earmark-pdf"> Export</i></h4>
            </button>
        </div>
        <div class="fl w-25 tr">
            <button class="btn btn-light">
                <h4><a href="employee.php">Add Employee</a></h4>
            </button>
        </div>
    </div>

    <!-- Footer -->
    <footer class="tc f3 lh-copy mt4">Copyright &copy; 2022 Delta@STAAR. All Rights Reserved</footer>

    <!-- Script Files -->
    <script src="../../js/form.js"></script>
    <script src="../../js/Sidebar/sidebar.js"></script>
    <script src="https://kit.fontawesome.com/319379cac6.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>