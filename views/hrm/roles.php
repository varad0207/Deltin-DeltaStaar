<?php include('../../controllers/includes/common.php'); ?>
<?php include('../../controllers/role_controller.php'); ?>
<?php

if (!isset($_SESSION["emp_id"]))
    header("location:../../views/login.php");

if (isset($_GET['edit'])) {
    $role_id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($conn, "SELECT * FROM roles WHERE role_id=$role_id");

    // if (count($record) == 1 ) {
    $n = mysqli_fetch_array($record);

    $role_id = $n['role_id'];
    $role_name = $n['role_name'];
    $rights = $n['rights'];
    // }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delta@STAAR | Add Role</title>
    <link rel="stylesheet" href="../../css/form.css">
    <link rel="stylesheet" href="../../css/style1.css">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.12.0/css/tachyons.min.css" />
</head>

<body class="b ma2">
    <img src="" alt="logo" class="center">
    <nav class="navbar  navbar-expand-lg navbar-dark f4 lh-copy pa3 fw4">
        <div class="container-fluid">
            <a class="navbar-brand" href="../dashboard.php">
                <img src="" alt="Deltin Logo" class="d-inline-block align-text-top">
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
                            <a class="nav-link active" aria-current="page" href="../dashboard.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="../aboutus.html" target="_blank">About Us</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="#" target="_blank">Locations</a>
                        </li>

                        <li class="nav-item">
                            <!-- <a class="nav-link active1" id="adminlogin" href="../dashboard.php">Back</a> -->
                            <a class="nav-link active1" id="adminlogin" onmouseover="this.style.cursor='pointer'"
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
                        <h1 class="f2 lh-copy tc" style="color: white;">Create Role</h1>
                        <form class=" f3 lh-copy" novalidate
                            action="../../controllers/role_controller.php" method="post">
                            <input type="hidden" name="role_id" value="<?php echo $role_id; ?>">
                            <input type="hidden" name="rights" value="<?php echo $rights; ?>">

                            <div class="col-md-12 pa2">
                                <label for="role_name">Role Name</label>

                                <input class="form-control" type="text" name="role_name" placeholder="Role Name"
                                    value="<?php echo $role_name; ?>" required>
                                <div class="valid-feedback">field is valid!</div>
                                <div class="invalid-feedback">field cannot be blank!</div>
                            </div>

                            <h4 class="f2 lh-copy tc" style="color: white;">Rights</h4>

                            <!-- <div class="col-md-12 pa2">
                                <label for="accomodation">Accomodation Module</label>
                                <input class="form-control" type="text" name="accomodation" placeholder=""
                                    value="" required>
                                <div class="valid-feedback">field is valid!</div>
                                <div class="invalid-feedback">field cannot be blank!</div>
                            </div> -->


                            <div class="col-md-12 pa2" >
                            <label style="display: block;text-align: center;" for="accomodation">Accomodation Module</label>
                                <fieldset style="color:white;">
                                    <legend>Accomodation details</legend>

                                    <div>
                                        <input type="radio" id="none" name="rights_acc" value="0" checked>
                                        <label for="none">none</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="read" name="rights_acc" value="1">
                                        <label for="read">read</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="write_update" name="rights_acc" value="2">
                                        <label for="write_update">write+update</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="delete" name="rights_acc" value="4">
                                        <label for="delete">delete</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="all" name="rights_acc" value="7">
                                        <label for="all">all</label>
                                    </div>
                                </fieldset>
                                <fieldset style="color:white;">
                                    <legend>Room details</legend>

                                    <div>
                                        <input type="radio" id="none" name="rights_room" value="0" checked>
                                        <label for="none">none</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="read" name="rights_room" value="1">
                                        <label for="read">read</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="write_update" name="rights_room" value="2">
                                        <label for="write_update">write+update</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="delete" name="rights_room" value="4">
                                        <label for="delete">delete</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="all" name="rights_room" value="7">
                                        <label for="all">all</label>
                                    </div>
                                </fieldset>
                            </div>

                            <!-- <div class="col-md-12 pa2">
                                <label for="hrm">HRM Module</label>
                                <input class="form-control" type="text" name="hrm" placeholder=""
                                    value="" required>
                                <div class="valid-feedback">field is valid!</div>
                                <div class="invalid-feedback">field cannot be blank!</div>
                            </div> -->
                            <div class="col-md-12 pa2" >
                            <label style="display: block;text-align: center;" for="hrm">HRM Module</label>

                                <fieldset style="color:white;">
                                    <legend>Employee data</legend>

                                    <div>
                                        <input type="radio" id="none" name="rights_employee_details" value="0" checked>
                                        <label for="none">none</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="read" name="rights_employee_details" value="1">
                                        <label for="read">read</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="write_update" name="rights_employee_details" value="2">
                                        <label for="write_update">write+update</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="delete" name="rights_employee_details" value="4">
                                        <label for="delete">delete</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="all" name="rights_employee_details" value="7">
                                        <label for="all">all</label>
                                    </div>
                                </fieldset>
                                <fieldset style="color:white;">
                                    <legend>Vaccination details</legend>

                                    <div>
                                        <input type="radio" id="none" name="rights_vaccination_details" value="0" checked>
                                        <label for="none">none</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="read" name="rights_vaccination_details" value="1">
                                        <label for="read">read</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="write_update" name="rights_vaccination_details" value="2">
                                        <label for="write_update">write+update</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="delete" name="rights_vaccination_details" value="4">
                                        <label for="delete">delete</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="all" name="rights_vaccination_details" value="7">
                                        <label for="all">all</label>
                                    </div>
                                </fieldset>
                            </div>

                            <!-- <div class="col-md-12 pa2">
                                <label for="security">Security Module</label>
                                <input class="form-control" type="text" name="security" placeholder=""
                                    value="" required>
                                <div class="valid-feedback">field is valid!</div>
                                <div class="invalid-feedback">field cannot be blank!</div>
                            </div> -->
                            <div class="col-md-12 pa2" >
                            <label style="display: block;text-align: center;" for="security">Security Module</label>
                                <fieldset style="color:white;">
                                    <legend>Tanker Entry and details</legend>

                                    <div>
                                        <input type="radio" id="none" name="rights_tankers" value="0" checked>
                                        <label for="none">none</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="read" name="rights_tankers" value="1">
                                        <label for="read">read</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="write_update" name="rights_tankers" value="2">
                                        <label for="write_update">write+update</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="delete" name="rights_tankers" value="4">
                                        <label for="delete">delete</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="all" name="rights_tankers" value="7">
                                        <label for="all">all</label>
                                    </div>
                                </fieldset>
                                <fieldset style="color:white;">
                                    <legend>Employee outing</legend>

                                    <div>
                                        <input type="radio" id="none" name="rights_employee_outing" value="0" checked>
                                        <label for="none">none</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="read" name="rights_employee_outing" value="1">
                                        <label for="read">read</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="write_update" name="rights_employee_outing" value="2">
                                        <label for="write_update">write+update</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="delete" name="rights_employee_outing" value="4">
                                        <label for="delete">delete</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="all" name="rights_employee_outing" value="7">
                                        <label for="all">all</label>
                                    </div>
                                </fieldset>
                                <fieldset style="color:white;">
                                    <legend>Visitor log</legend>

                                    <div>
                                        <input type="radio" id="none" name="rights_visitors" value="0" checked>
                                        <label for="none">none</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="read" name="rights_visitors" value="1">
                                        <label for="read">read</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="write_update" name="rights_visitors" value="2">
                                        <label for="write_update">write+update</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="delete" name="rights_visitors" value="4">
                                        <label for="delete">delete</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="all" name="rights_visitors" value="7">
                                        <label for="all">all</label>
                                    </div>
                                </fieldset>
                            </div>

                            <!-- <div class="col-md-12 pa2">
                                <label for="complaints">Complaints Module</label>
                                <input class="form-control" type="date" name="complaints" value="" required>
                                <div class="valid-feedback">field is valid!</div>
                                <div class="invalid-feedback">field cannot be blank!</div>
                            </div> -->

                            <div class="col-md-12 pa2" >
                            <label style="display: block;text-align: center;" for="security">Complaints Module</label>

                                <fieldset style="color:white;">
                                    <legend>Complaint Details</legend>

                                    <div>
                                        <input type="radio" id="none" name="rights_complaints" value="0" checked>
                                        <label for="none">none</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="read" name="rights_complaints" value="1">
                                        <label for="read">read</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="write_update" name="rights_complaints" value="2">
                                        <label for="write_update">write+update</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="delete" name="rights_complaints" value="4">
                                        <label for="delete">delete</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="all" name="rights_complaints" value="7">
                                        <label for="all">all</label>
                                    </div>
                                </fieldset>
                                <fieldset style="color:white;">
                                    <legend>Jobs</legend>

                                    <div>
                                        <input type="radio" id="none" name="rights_jobs" value="0" checked>
                                        <label for="none">none</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="read" name="rights_jobs" value="1">
                                        <label for="read">read</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="write_update" name="rights_jobs" value="2">
                                        <label for="write_update">write+update</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="delete" name="rights_jobs" value="4">
                                        <label for="delete">delete</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="all" name="rights_jobs" value="7">
                                        <label for="all">all</label>
                                    </div>
                                </fieldset>
                            </div>

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
    <script src="../../js/form.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>