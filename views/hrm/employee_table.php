<?php include('../../controllers/includes/common.php'); ?>
<?php include('../../controllers/employee_controller.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DELTA@STAAR | Employees</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="../../css/AccommodationView.css">
   
</head>

<body>
    <div style="color:white;">Add Navbar</div>
    <div class="" style="margin: 0% 5.1%;">
        <div class="row">
            <div class="col-1">
                <!--Link back page, remmove target and rel if you dont want it to open the link in a new tab-->
                <a role="button" href="#" target="_blank" rel="noopener noreferrer">
                    <i class="bi bi-arrow-left-circle" style="font-size: 2rem; color: white;"></i>
                </a>
            </div>
            <div class="col-9">
                <h1 class="text-center">All Employees</h1>
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

                <?php $results = mysqli_query($conn, "SELECT * FROM employee JOIN employee_designation ON employee_designation.id = employee.designation"); ?>

            <table class="table table-hover m-0">
                <thead style="border: 2px solid black;">
                    <tr>
                    <th>emp_code </th>
                            <th>fname </th>
                            <th>mname </th>
                            <th>lname </th>
                            <th>designation </th>
                            <th>dob </th>
                            <th>address </th>
                            <th>state </th>
                            <th>country </th>
                            <th>pincode </th>
                            <th>email </th>
                            <th>blood_group </th>
                            <th>department </th>
                            <th>joining_date </th>
                            <th>aadhaar_number </th>
                            <th>salary </th>
                            <th>acc_id </th>

                            <th colspan="2">Action</th>
                    <tr>
                </thead>
                <tbody>

                <?php while ($row = mysqli_fetch_array($results)) { ?>
                    <?php $desigid = $row['designation'];
                    $queryEmployeeDesig = mysqli_query($conn, "SELECT * FROM employee_designation where designation='$desigid'");
                    $EmployeeDesig_row = mysqli_fetch_assoc($queryEmployeeDesig);
					?>
                    <tr>
                        <td>
                            <?php echo $row['emp_code']; ?>
                        </td>
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
                            <?php echo date('d-m-Y', strtotime($row['dob'])); ?>
                        </td>
                        <td>
                            <?php echo $row['address']; ?>
                        </td>
                        <td>
                            <?php echo $row['state']; ?>
                        </td>
                        <td>
                            <?php echo $row['country']; ?>
                        </td>
                        <td>
                            <?php echo $row['pincode']; ?>
                        </td>
                        <td>
                            <?php echo $row['email']; ?>
                        </td>
                        <td>
                            <?php echo $row['blood_group']; ?>
                        </td>
                        <td>
                            <?php echo $row['department']; ?>
                        </td>
                        <td>
                            <?php echo date('d-m-Y', strtotime($row['joining_date'])); ?>
                        </td>
                        <td>
                            <?php echo $row['aadhaar_number']; ?>
                        </td>
                        <td>
                            <?php echo $row['salary']; ?>
                        </td>
                        <td>
                            <?php echo $row['acc_id']; ?>
                        </td>

                        <td>
                            <a href="./employee.php?edit=<?php echo '%27' ?><?php echo $row['emp_code']; ?><?php echo '%27' ?>"
                                class="edit_btn"> <i class="bi bi-pencil-square" style="font-size: 1.2rem; color: black;"></i></a>
                        &nbsp;
                            <a href="../../controllers/employee_controller.php?del=<?php echo '%27' ?><?php echo $row['emp_code']; ?><?php echo '%27' ?>"
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

                <a role="button" class="btn btn-light" href="employee.php">
                    Add Employee
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