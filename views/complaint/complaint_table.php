<?php include('../../controllers/includes/common.php'); ?>
<?php include('../../controllers/complaint_controller.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../../css/AccommodationView.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Delta@STAAR | Complaints</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <!-- <link rel="stylesheet" type="text/css" href="../../css/AccommodationView.css"> -->
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
        <h1 class="tc f1 lh-title">All Complaints</h1>
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

                <form class="requires-validation f3 lh-copy" novalidate action="complaint_table.php" method="post">
                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="Id">
    					<option name="employee_code" selected>Choose...</option>
    					
							<?php
								$emp_det=mysqli_query($conn, "SELECT * FROM employee");
								
								foreach ($emp_det as $row){ ?>
								<option name="employee_code" value="<?= $row["emp_id"]?>"><?= $row["emp_code"];?></option>	
								<?php
								}
								
							?>
						</select>
                        <button class="btn btn-dark px-3" class="btnn" type="submit" name="save" value="save">Save</button>
                </form>

                <?php 
                if (isset($_POST['save'])) {
                    $emp_id = $_POST['Id'];
                    echo "<script>console.log('$emp_code')</script>";
                $results = mysqli_query($conn, "SELECT * FROM complaints join employee where employee.emp_id='$emp_id'"); ?>

                <table>
                    <thead>
                        <tr>
                            <th>Complaint Id </th>
                            <th>Raised Time </th>
                            <th>Complaint Category </th>
                            <th>Description </th>
                            <th>Status </th>
                            <th>Closure Time<br>(Technician)</th> </th>
                            <th>Closure Time<br>(Security) </th>
                            <th>Closure Time<br>(Warden) </th>
                            <th>Remarks </th>
                            <th>Employee Name </th>
                            <th>Employee Code </th>
                            <th>accomodation Name </th>

                            <th colspan="2">Action</th>
                        </tr>
                    </thead>

                    <?php while ($row = mysqli_fetch_array($results)) { ?>
                        <?php
                        $emp_code = $row['emp_code'];
                        $queryEmpName = mysqli_query($conn, "SELECT * FROM employee where emp_code='$emp_code'");
                        $EmpName_row = mysqli_fetch_assoc($queryEmpName);
                        $acc_name = $EmpName_row['acc_id'];
                        $queryAccName = mysqli_query($conn, "SELECT * FROM accomodation where acc_id='$acc_name'");
                        $AccName_row = mysqli_fetch_assoc($queryAccName);
                        ?>
                        <?php
                        $comp_type = $row['type'];
                        $queryCompType = mysqli_query($conn, "SELECT * FROM complaint_type where id='$comp_type'");
                        $CompType_row = mysqli_fetch_assoc($queryCompType);
                        ?>
                        
                    <tr>
                        <td>
                            <?php echo $row['id']; ?>
                        </td>
                        <td>
                            <?php echo $row['raise_timestamp']; ?>
                        </td>
                        <!-- fetch complaint category -->
                        <td>
                            <?php echo $CompType_row['type']; ?> 
                        </td>
                        <td>
                            <?php echo $row['description']; ?>
                        </td>
                        <td>
                            <?php echo $row['status']; ?>
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
                            <?php echo $EmpName_row['fname']; ?>
                        </td>
                        <td>
                            <?php echo $row['emp_code']; ?>
                        </td>
                        <!-- fetch acc name -->
                        <td>
                            <?php echo $AccName_row['acc_name']; ?>
                        </td>
                        <td>
                            <a href="complaint.php?edit=<?php echo '%27' ?><?php echo $row['id']; ?><?php echo '%27' ?>"
                                class="edit_btn">Raise Job</a>
                        </td>
                        <td>
                            <a href="../../controllers/complaint_controller.php?del=<?php echo '%27' ?><?php echo $row['id']; ?><?php echo '%27' ?>"
                                class="del_btn">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <?php } ?>

</body>

</html>