<?php
require "../controllers/includes/common.php";
if (!isset($_SESSION["emp_id"]))
    header("location:login.php");

$superadmin = 0;
$sql = "select rights.* from employee join roles on employee.role=roles.role_id join rights on roles.rights=rights.id";
$submit = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$rights_table = mysqli_fetch_array($submit);
if (
    $rights_table['accomodation'] == 7 &&
    $rights_table['complaints'] == 7 &&
    $rights_table['employee_details'] == 7 &&
    $rights_table['employee_outing'] == 7 &&
    $rights_table['roles'] == 7 &&
    $rights_table['rooms'] == 7 &&
    $rights_table['tankers'] == 7 &&
    $rights_table['jobs'] == 7 &&
    $rights_table['vaccination'] == 7 &&
    $rights_table['vaccination_category'] == 7 &&
    $rights_table['visitor_log'] == 7
) {
    $superadmin = 1;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../css/style1.css"> -->
    <link rel="stylesheet" href="../css/style1.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Tachyons -->
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.12.0/css/tachyons.min.css" />
    <title>Delta@STAAR | Admin Portal</title>
</head>

<body class="bgcolor">
    <!-- Navigation Bar -->
    <nav class="navbar  navbar-expand-lg navbar-dark f4 lh-copy pa3 fw4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
<<<<<<<< HEAD:views/dashboard.php
                <img src="" alt="Deltin Logo" class="d-inline-block align-text-top">
========
                 <img src="" alt="Deltin Logo" class="d-inline-block align-text-top">
>>>>>>>> upstream/main:views/superadmin.php
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
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
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link active " id="dropdownMenuButton" aria-haspopup="true"
                                    aria-expanded="false" aria-current="page" href="#" data-toggle="dropdown"
                                    data-placement="bottom" title="Configure"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="18" height="18" fill="currentColor" class="bi bi-gear"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                        <path
                                            d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                                    </svg></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="./vaccination_category.php">Add Vaccination
                                        category</a>
                                    <a class="dropdown-item" href="./hrm/emp_desig.php">Add Employee Designation</a>
                                    <a class="dropdown-item" href="#">Add Tanker Vendors</a>
                                    <a class="dropdown-item" href="./security.php">Define Security</a>
                                    <a class="dropdown-item" href="./technician.php">Define/Add Technician</a>
                                    <a class="dropdown-item" href="#">Complaint Type</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="./aboutus.html" target="_blank">About Us</a>
                        </li>
                        <!-- <li class="nav-item">
                        <a class="nav-link active" href="#" target="_blank">Rooms</a>
                    </li> -->
                        <li class="nav-item">
                            <a class="nav-link active" href="#" target="_blank">Locations</a>
                        </li>
                        <!-- <li class="nav-item">
						<a class="nav-link active" href="#" target="_blank">Tankers</a>
					</li> -->
                        <!-- <li class="nav-item pr5">
                            <a class="nav-link active" href="#" target="_blank">Contact Us</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link active1" id="adminlogin" href="../controllers/logout.php">Log Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- CARDS -->
    <div class="portal">
        <?php if ($superadmin) { ?>
        <h1 class="tc f-subheadline lh-title spr">Super Admin Portal</h1>
        <?php } else { ?>
        <h1 class="tc f-subheadline lh-title spr">Dashboard</h1>
        <?php } ?>
        <div class="containeer ma4">
            <!-- FIRST ELEMENT -->
            <div class="containeer-items tc">
                <a href="#">
                    <img class="rounded-circle" src="../images/emp.png" alt="EMPLOYEE">
                    <p class="f4 lh-copy txt"><a href="./hrm/employee.php">Employee</a></p>
                    <p class="f4 lh-copy txt"><a href="./hrm/vaccination.php">Vaccination</a></p>
                    <p class="f4 lh-copy txt"><a href="./hrm/roles.php">Roles</a></p>
                </a>
            </div>

            <!-- SECOND ELEMENT -->
            <div class="containeer-items tc">
                <a href="#">
                    <img class="rounded-circle" src="../images/acc.png" alt="ACCOMODATION">
                    <p class="f4 lh-copy txt"><a href="./accomodation/accomodation.php">Accommodation</a></p>
                    <p class="f4 lh-copy txt"><a href="./accomodation/rooms.php">Rooms</a></p>
                </a>
            </div>

            <!-- THIRD ELEMENT -->
            <div class="containeer-items tc">
                <a href="#">
                    <img class="rounded-circle" src="../images/complaint.png" alt="COMPLAINT">
                    <p class="f4 lh-copy txt"><a href="./complaint/complaint.php">Complaints</a></p>
                    <p class="f4 lh-copy txt"><a href="./complaint/jobs.php">Jobs</a></p>
                </a>
            </div>

            <!-- FOURTH ELEMENT -->
            <div class="containeer-items tc">
                <a href="#">
                    <img class="rounded-circle" src="../images/tanker.png" alt="SECURITY">
                    <p class="f4 lh-copy txt"><a href="./security/employee_outing.html">Outing</a></p>
                    <p class="f4 lh-copy txt"><a href="./security/tanker.php">Tankers</a></p>
                    <p class="f4 lh-copy txt"><a href="./security/employee.php">Visitors</a></p>
                </a>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="tc f3 lh-copy mt6">Copyright &copy; 2022 Delta@STAAR. All Rights Reserved</footer>
    <script src="https://kit.fontawesome.com/319379cac6.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>