<?php include('../../controllers/includes/common.php'); ?>
<?php include('../../controllers/vaccination_controller.php'); ?>
<?php
if (isset($_GET['edit'])) {
    $vaccination_id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($conn, "SELECT * FROM visitor_log WHERE id=$id");
    // if (count($record) == 1 ) {
    $n = mysqli_fetch_array($record);
    $emp_id = $n['emp_id'];
    $category = $n['cat_id'];
    $dateofadministration = date('Y-m-d', strtotime($n['doa']));
    $location = $n['loc'];
    $nextdose = date('Y-m-d', strtotime($n['dond']));
    
    $cat_id=$n['cat_id'];
    $emp_id=$n['emp_id'];
    $security_emp_id=$n['security_emp_id'];
    $visitor_name=$n['visitor_name'];
    $vehicle_no=$n['vehicle_no'];
    $purpose=$n['purpose'];
    $phone_no=$n['phone_no'];
    $check_in="";
    $check_out="";

    // }
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Delta@STAAR | Visitor Log Entry</title>
    <meta name="description" content="Vaccination records of the employees">
    <link rel="stylesheet" href="../../css/forms.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.12.0/css/tachyons.min.css" />
</head>

<body>
<nav class="navbar  navbar-expand-lg navbar-dark f4 lh-copy pa3 fw4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="" alt="Deltin Logo" class="d-inline-block align-text-top">

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                
                <div class="offcanvas-body">
                    <div class="nb">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        
                        <li class="nav-item">
                            <a class="nav-link active" href="aboutus.html">About Us</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Locations</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link active" href="./views/complaint/complaint.php">Complaints+</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link active1" href="../index.html">Back</a>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1 class="tc f1 lh-title">Visitor Log</h1>
        <div class="row mx-0 justify-content-center">
            <div class="col-md-7 col-lg-5 px-lg-2 col-xl-4 px-xl-0 bg f4 lh-copy">
                <?php if (isset($_SESSION['message'])): ?>
                <div class="msg">
                    <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                </div>
                <?php endif ?>
                <?php $results = mysqli_query($conn, "SELECT * FROM visitor_log"); ?>
            </div>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Sr.No</th>
                        <th scope="col">Employee ID </th>
                        <th scope="col">Security ID </th>
                        <th scope="col">Visitor Name </th>
                        <th scope="col">Vehicle No </th>
                        <th scope="col">Type of visitor </th>
                        <th scope="col">Check-in </th>
                        <th scope="col">Check-out </th>
                        <th scope="col" colspan="2" align="center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($results)) { ?>
                    <?php $srno=$row['id'];
                        $employeeid = $row['emp_id'];
                    $queryEmployeeCode = mysqli_query($conn, "SELECT * FROM employee where emp_id=$employeeid");
                    $EmployeeCode_row = mysqli_fetch_assoc($queryEmployeeCode);

                    $categoryid = $row['category_id'];
                    $queryCategory_name = mysqli_query($conn, "SELECT * FROM vaccination_category where category_id=$categoryid");
                    $CategoryName_row = mysqli_fetch_assoc($queryCategory_name);
                    ?>
                    <tr>
                        <td>
                            <?php echo $EmployeeCode_row['emp_code']; ?>
                        </td>
                        <td>
                            <?php echo $CategoryName_row['category_name']; ?>
                        </td>
                        <td>
                            <?php echo $row['date_of_administration']; ?>
                        </td>
                        <td>
                            <?php echo $row['location']; ?>
                        </td>
                        <td>
                            <?php echo $row['date_of_next_dose']; ?>
                        </td>
                        <td><a href="./vaccination.php?edit=<?php echo '%27' ?><?php echo $row['vaccination_id']; ?><?php echo '%27' ?>"
                                class="edit_btn"><button type="button" class="btn btn-success">Edit</button></a></td>
                        <td><a href="../../controllers/vaccination_controller.php?del=<?php echo '%27' ?><?php echo $row['vaccination_id']; ?><?php echo '%27' ?>"
                                class="del_btn"><button type="button" class="btn btn-danger">Delete</button></a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</body>

</html>