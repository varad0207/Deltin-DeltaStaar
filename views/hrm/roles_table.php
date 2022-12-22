<?php include('../../controllers/includes/common.php'); ?>
<?php include('../../controllers/role_controller.php');
if (!isset($_SESSION["emp_id"]))
    header("location:../../views/login.php");

//only superadmin can view and assign roles
if ($_SESSION['is_superadmin'] == 0)
    die('<script>alert("You dont have access to this page, Please contact admin");window.location = history.back();</script>');



// check rights

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DELTA@STAAR | Roles</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="../../css/AccommodationView.css">
    <link rel="stylesheet" href="../../css/style1.css">


</head>

<body>

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
                <!-- <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="color: #fff;">Delta@STAAR</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div> -->
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
    <div class="" style="margin: 0% 5.1%;">
        <div class="row">

            <div class="col-9">
                <h1 class="text-center">All Saved Roles</h1>
            </div>
            <div class="col ml-5 sort">
                <a class="button" role="button" href="#">
                    <i class="bi bi-sort-down-alt" style="font-size: 1.5rem; color: white;">Sort by</i>
                </a>

            </div>
        </div>
    </div>

    <div class="table-div">

        <div class="table-responsive bg-white">
            <?php if (isset($_SESSION['message'])): ?>
            <div class="msg">
                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
            <?php endif ?>

            <?php $results = mysqli_query($conn, "SELECT * FROM roles JOIN rights ON rights = id"); ?>

            <table class="table table-hover m-0">
                <thead style="border: 2px solid black;">
                    <tr>
                        <th align="center" rowspan="2">Role Name </th>
                        <th colspan="12">Rights</th>
                    <tr>
                </thead>
                <tbody>
                    <tr>
                        <th></th>
                        <th>accomodation</th>
                        <th>complaints </th>
                        <th>employee_details </th>
                        <th>employee_outing </th>
                        <th>roles </th>
                        <th>tankers </th>
                        <th>jobs </th>
                        <th>vaccination </th>
                        <th>vaccination_category </th>
                        <th>visitor_log </th>
                        <th colspan="2">Action</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_array($results)) { ?>
                    <tr>
                        <td>
                            <?php echo $row['role_name']; ?>
                        </td>
                        <td>
                            <?php echo $row['accomodation']; ?>
                        </td>
                        <td>
                            <?php echo $row['complaints']; ?>
                        </td>
                        <td>
                            <?php echo $row['employee_details']; ?>
                        </td>
                        <td>
                            <?php echo $row['employee_outing']; ?>
                        </td>
                        <td>
                            <?php echo $row['roles']; ?>
                        </td>
                        <td>
                            <?php echo $row['tankers']; ?>
                        </td>
                        <td>
                            <?php echo $row['jobs']; ?>
                        </td>
                        <td>
                            <?php echo $row['vaccination']; ?>
                        </td>
                        <td>
                            <?php echo $row['vaccination_category']; ?>
                        </td>
                        <td>
                        <?php echo $row['visitor_log']; ?>
                        </td>
                        
                        <td>
                            <a href="./roles.php?edit=<?php echo '%27' ?><?php echo $row['role_id']; ?><?php echo '%27' ?>"
                                class="edit_btn"> <i class="bi bi-pencil-square"
                                    style="font-size: 1.2rem; color: black;"></i></a>
                            &nbsp;
                            <a href="../../controllers/role_controller.php?del=<?php echo '%27' ?><?php echo $row['role_id']; ?><?php echo '%27' ?>"
                                class="del_btn"><i class="bi bi-trash" style="font-size: 1.2rem; color: black;"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
            </table>
            </tbody>
            </table>
        </div>


    </div>
    <div class="" style="margin:2% 5%;">
        <div class="row">
            <div class="col-2">
                <!--Link back page, remmove target and rel if you dont want it to open the link in a new tab-->
                <a role="button" href="#" target="_blank" rel="noopener noreferrer">
                    <i class="bi bi-file-earmark-pdf" style="font-size: 1.5rem; color: white;">Export</i>
                </a>
            </div>
            <div class="col-8">

            </div>
            <div class="col-2">

                <a role="button" class="btn btn-light" href="roles.php">
                    Add Role
                </a>

            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>