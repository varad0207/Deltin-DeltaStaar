<?php include('../../controllers/includes/common.php'); ?>
<?php include('../../controllers/employee_controller.php'); ?>
<?php

if (!isset($_SESSION["emp_id"]))
    header("location:../../views/login.php");

if (isset($_GET['edit'])) {
    $emp_code = $_GET['edit'];
    $update = true;
    $record = mysqli_query($conn, "SELECT * FROM employee WHERE emp_code=$emp_code");

    // if (count($record) == 1 ) {
    $n = mysqli_fetch_array($record);

    $emp_code = $n['emp_code'];
    $fname = $n['fname'];
    $mname = $n['mname'];
    $lname = $n['lname'];
    $designation = $n['designation'];
    $dob = $n['dob'];
    $address = $n['address'];
    $state = $n['state'];
    $country = $n['country'];
    $pincode = $n['pincode'];
    $email = $n['email'];
    $blood_group = $n['blood_group'];
    $department = $n['department'];
    $joining_date = $n['joining_date'];
    $aadhaar_number = $n['aadhaar_number'];
    $salary = $n['salary'];
    $acc_id = $n['acc_id'];

    // }
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link href="../sidebar.css" rel="stylesheet">
    <script src="../../js/Sidebar/sidebar.js"></script>

    <link rel="stylesheet" href="../../css/style1.css">
    <link rel="stylesheet" href="../../css/form.css">

    <!-- Tachyons -->
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.12.0/css/tachyons.min.css" />

    <title>Sidebar Code</title>

</head>

<body class="bgcolor b ma2">
    <!--Start of Sidebar-->
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <a class="navbar-brand mb-2" href="#" style="padding: 8px;">
            <img src="../../images/logo-no-name-circle.png" height="120px" alt="Deltin Logo" class="">
        </a>

        <ul class="nav flex-column p-4" id="nav_accordion" style="--bs-nav-link-hover-color: #f8f9fa;">

            <li class="nav-item has-submenu">
                <a class="nav-link border-dark border-bottom" href="#">
                    <i class="bi bi-building"></i>
                    Accommodation
                    <i class="bi bi-chevron-down"></i>
                </a>
                <ul class="submenu collapse">
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../views/accomodation/accomodation.php">
                            Add Accommodation
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom"
                            href="../views/accomodation/accomodation_table.php">
                            Accommodation Table
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../views/accomodation/rooms.php">
                            Add Rooms
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../views/accomodation/room_table.php">
                            Rooms Table
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-submenu">
                <a class="nav-link border-dark border-bottom" href="#">
                    <i class="bi bi-file-text"></i> Complaints <i class="bi bi-chevron-down"></i>
                </a>
                <ul class="submenu collapse">
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../views/complaint/complaint.php">
                            Raise A Complaint
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../views/complaint/complaint_table.php">
                            Complaint Table
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../views/complaint/complaint_type.php">
                            Add Complaint Type
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom"
                            href="../views/complaint/complaint_type_table.php">
                            Complaint Type Table
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-submenu">
                <a class="nav-link border-dark border-bottom" href="#">
                    <i class="bi bi-person"></i> HRM <i class="bi bi-chevron-down"></i>
                </a>
                <ul class="submenu collapse">
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../views/hrm/emp_desig.php">
                            Add Designation Details
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../views/hrm/employee.php">
                            Add Employee Details
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../views/hrm/employee_table.php">
                            Employees Table
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../views/hrm/roles.php">
                            Add Role </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../views/hrm/roles_table.php">
                            Roles Table
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../views/hrm/security_table.php">
                            Security Table
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../views/hrm/technician_table.php">
                            Technician Table
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../views/hrm/vaccination.php">
                            Add Vacination Details
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../views/hrm/vaccination_table.php">
                            Vacination Table
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item has-submenu">
                <a class="nav-link border-dark border-bottom" href="#">
                    <i class="bi bi-shield"></i> Security <i class="bi bi-chevron-down"></i>
                </a>
                <ul class="submenu collapse">
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../views/security/employee_outing.php">
                            Add Employee Outing
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom"
                            href="../views/security/employee_outing_table.php">
                            Employee Outings Table
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../views/security/tanker.php">
                            Add Tanker Entry
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../views/security/tanker_table.php">
                            Tanker Table
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../views/security/visitor_log.php">
                            Visitor Log Form
                        </a>
                    </li>
                    <li>
                        <a class="nav-link border-dark border-bottom" href="../views/security/visitor_log_table.php">
                            Visitor Log Table
                        </a>
                    </li>
                </ul>
            </li>

            <!--
            <li class="nav-item">
                <a class="nav-link" href="#"> Other link </a>
            </li>
            -->
        </ul>

    </div>
    <!--End of Sidebar-->

    <!--Start of Main content-->

    <div id="main">


        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg navbar-dark f4 lh-copy pa3 fw4">
            <div class="container-fluid">
                <button class="openbtn" onclick="openNav()">&#9776; Menu</button>
                <a class="navbar-brand" href="#" style="padding-left: 2rem;">
                    <img src="../../images/logo-no-name.png" height="50px" alt="Deltin Logo"
                        class="d-inline-block align-text-top" style="border-radius: 50px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="color: #fff;">Delta@STAAR</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <!-- only superadmin will see the configure button -->
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a class="nav-link active " id="dropdownMenuButton" aria-haspopup="true"
                                        aria-expanded="false" aria-current="page" href="#" data-toggle="dropdown"
                                        data-placement="bottom" title="Configure">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            fill="currentColor" class="bi bi-gear" style="color: #FEBE10;"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                            <path
                                                d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="./config/vaccination_category.php">Add
                                            Vaccination
                                            category</a>
                                        <a class="dropdown-item" href="./config/emp_desig.php">Add Employee
                                            Designation</a>
                                        <a class="dropdown-item" href="./config/tanker_vendor.php">Add Tanker
                                            Vendors</a>
                                        <a class="dropdown-item" href="./config/security.php">Define Security</a>
                                        <a class="dropdown-item" href="./config/technician.php">Define/Add
                                            Technician</a>
                                        <a class="dropdown-item" href="./config/complaint_type.php">Complaint
                                            Type</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="./aboutus.html" target="_blank">About Us</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" href="#" target="_blank">Locations</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="complaint/complaint.php" target="_blank">Complain+</a>
                            </li>
                            <li class="nav-item">

                                <a class="nav-link active" id="adminlogin" onmouseover="this.style.cursor='pointer'"
                                    onclick=history.back()>Back</a>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="form-body">
            <div class="row">
                <div class="form-holder">
                    <div class="form-content">
                        <div class="form-items">
                            <h1 class="f2 lh-copy tc" style="color: white;">Enter Employee Details</h1>
                            <form class="requires-validation f3 lh-copy" novalidate
                                action="../../controllers/employee_controller.php" method="post">
                                <input type="hidden" name="emp_code" value="<?php echo $emp_code; ?>">

                                <div class="col-md-12 pa2">
                                    <label for="acc_code">Employee Code</label>

                                    <input class="form-control" type="text" name="emp_code" placeholder="Employee Code"
                                        value="<?php echo $emp_code; ?>" value="??php echo $emp_code; ??" required>
                                    <div class="valid-feedback">field is valid!</div>
                                    <div class="invalid-feedback">field cannot be blank!</div>
                                </div>

                                <div class="col-md-12 pa2">
                                    <label for="fname">First Name</label>
                                    <input class="form-control" type="text" name="fname" placeholder="First Name"
                                        value="<?php echo $fname; ?>" required>
                                    <div class="valid-feedback">field is valid!</div>
                                    <div class="invalid-feedback">field cannot be blank!</div>
                                </div>

                                <div class="col-md-12 pa2">
                                    <label for="mname">Middle Name</label>
                                    <input class="form-control" type="text" name="mname" placeholder="Middle Name"
                                        value="<?php echo $mname; ?>" required>
                                    <div class="valid-feedback">field is valid!</div>
                                    <div class="invalid-feedback">field cannot be blank!</div>
                                </div>

                                <div class="col-md-12 pa2">
                                    <label for="lname">Last Name</label>
                                    <input class="form-control" type="text" name="lname" placeholder="Last Name"
                                        value="<?php echo $lname; ?>" required>
                                    <div class="valid-feedback">field is valid!</div>
                                    <div class="invalid-feedback">field cannot be blank!</div>
                                </div>

                                <div class="col-md-12 pa2">
                                    <label for="designation">Designation</label>
                                    <select class="form-select mt-3" name="designation" required>
                                        <option name="employee_desig" selected disabled value="">Select Designation
                                        </option>
                                        <?php
                                        $emp_desig = mysqli_query($conn, "SELECT * FROM employee_designation");

                                        foreach ($emp_desig as $row) { ?>
                                            <option name="employee_desig" value="<?= $row[" id"] ?>">
                                                <?= $row["designation"]; ?>
                                            </option>
                                            <?php
                                        }

                                        ?>
                                    </select>
                                    <div class="invalid-feedback">Please select an option!</div>
                                </div>
                                <div class="col-md-12 pa2">
                                    <label for="dob">Date of Birth</label>
                                    <input class="form-control" type="date" name="dob" value="<?php echo $dob; ?>"
                                        required>
                                    <div class="valid-feedback">field is valid!</div>
                                    <div class="invalid-feedback">field cannot be blank!</div>
                                </div>

                                <div class="col-md-12 pa2">
                                    <label for="address">Address</label>
                                    <input class="form-control" type="text" name="address" placeholder="Address"
                                        value="<?php echo $address; ?>" required>
                                    <div class="valid-feedback">field is valid!</div>
                                    <div class="invalid-feedback">field cannot be blank!</div>
                                </div>

                                <div class="col-md-12 pa2">
                                    <label for="state">State</label>
                                    <input class="form-control" type="text" name="state" placeholder="State"
                                        value="<?php echo $state; ?>" required>
                                    <div class="valid-feedback">field is valid!</div>
                                    <div class="invalid-feedback">field cannot be blank!</div>
                                </div>

                                <div class="col-md-12 pa2">
                                    <label for="country">Country</label>
                                    <input class="form-control" type="text" name="country" placeholder="Country"
                                        value="<?php echo $country; ?>" required>
                                    <div class="valid-feedback">field is valid!</div>
                                    <div class="invalid-feedback">field cannot be blank!</div>
                                </div>

                                <div class="col-md-12 pa2">
                                    <label for="pincode">Pincode</label>
                                    <input class="form-control" type="number" name="pincode" placeholder="Pincode"
                                        value="<?php echo $pincode; ?>" required>
                                    <div class="valid-feedback">field is valid!</div>
                                    <div class="invalid-feedback">field cannot be blank!</div>
                                </div>

                                <div class="col-md-12 pa2">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email" name="email" placeholder="Email"
                                        value="<?php echo $email; ?>" required>
                                    <div class="valid-feedback">field is valid!</div>
                                    <div class="invalid-feedback">field cannot be blank!</div>
                                </div>

                                <div class="col-md-12 pa2">
                                    <label for="blood_group">Blood Group</label>
                                    <select class="form-select mt-3" name="blood_group"
                                        value="<?php echo $blood_group ?>" required>
                                        <option selected disabled value="">Select Blood Group</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                    <div class="invalid-feedback">Please select an option!</div>
                                </div>

                                <div class="col-md-12 pa2">
                                    <label for="dept">Department</label>
                                    <input class="form-control" type="text" name="department" placeholder="Department"
                                        value="<?php echo $department; ?>" value="??php echo $department; ??" required>
                                    <div class="valid-feedback">field is valid!</div>
                                    <div class="invalid-feedback">field cannot be blank!</div>
                                </div>

                                <div class="col-md-12 pa2">
                                    <label for="joiningdate">Joining Date</label>
                                    <input class="form-control" type="date" name="joining_date"
                                        value="<?php echo $joining_date; ?>" required>
                                    <div class="valid-feedback">field is valid!</div>
                                    <div class="invalid-feedback">field cannot be blank!</div>
                                </div>



                                <div class="col-md-12 pa2">
                                    <label for="aadhar_no">Aadhar Number</label>
                                    <input class="form-control" type="number" name="aadhaar_number"
                                        value="<?php echo $aadhaar_number; ?>" placeholder="Aadhar Number" required>
                                    <div class="valid-feedback">field is valid!</div>
                                    <div class="invalid-feedback">field cannot be blank!</div>
                                </div>

                                <div class="col-md-12 pa2">
                                    <label for="salary">Salary</label>
                                    <input class="form-control" type="number" name="salary" placeholder="Salary"
                                        value="<?php echo $salary; ?>" required>
                                    <div class="valid-feedback">field is valid!</div>
                                    <div class="invalid-feedback">field cannot be blank!</div>
                                </div>

                                <div class="col-md-12 pa2">
                                    <label for="acc_id">Accomodation</label>


                                    <select class="form-select mt-3" name="acc_id">
                                        <option name="employee_accomodation" selected disabled value="">Select
                                            Accomodattion
                                        </option>
                                        <?php
                                        $emp_acc = mysqli_query($conn, "SELECT * FROM accomodation");

                                        foreach ($emp_acc as $row) { ?>
                                            <option name="employee_accomodation" value="<?= $row[" acc_id"] ?>">
                                                <?= $row["acc_name"]; ?>
                                            </option>
                                            <?php
                                        }

                                        ?>
                                    </select>

                                    <div class="invalid-feedback">Please select an option!</div>
                                </div>

                                <!-- <div class="col-md-12 pa2">
                            <label for="desig_id">Designation ID</label>
                              <input class="form-control" type="number" name="desig_id" placeholder="Designation ID" required>
                              <div class="valid-feedback">field is valid!</div>
                              <div class="invalid-feedback">field cannot be blank!</div>
                          </div> -->

                                <div class="form-button mt-3 tc">
                                    <?php if ($update == true): ?>
                                        <button id="submit" name="update" value="update" type="submit"
                                            class="btn btn-warning f3 lh-copy" style="color: white;">Update</button>
                                        <?php else: ?>
                                        <button id="submit" name="submit" value="sumbit" type="submit"
                                            class="btn btn-warning f3 lh-copy" style="color: white;">Submit</button>
                                        <?php endif ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Footer -->
        <footer class="tc f3 lh-copy mt6">Copyright &copy; 2022 Delta@STAAR. All Rights Reserved</footer>


    </div>

    <!--End of Main content-->

    <!--Scripts for form (as in employee.php)-->
    <script src="../../js/form.js"></script>


    <!--Scripts for Navbar (as in dashboard.php)-->
    <script src="https://kit.fontawesome.com/319379cac6.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <!--Scripts required for Bootstrap and Sidebar-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
</body>

</html>