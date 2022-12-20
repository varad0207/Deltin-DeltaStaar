<?php include('../../controllers/includes/common.php'); ?>
<?php include('../../controllers/complaint_controller.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../../css/AccommodationView.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Delta@STAAR | Complaints</title>
    <meta name="description" content="Employee Addition portal for deltin employees">
    <link rel="stylesheet" href="../../css/forms.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.12.0/css/tachyons.min.css" />
</head>

<body>
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
                            <th>Complainti Category </th>
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
                    <tr>
                        <td>
                            <?php $testid=$row['category']; echo $row['id']; 
                            echo "<script>console.log(' $testid')</script>";?>
                        </td>
                        <td>
                            <?php echo $row['category']; ?>
                        </td>
                        <td>
                            <?php echo $row['mname']; ?>
                        </td>
                        <td>
                            <?php echo $row['lname']; ?>
                        </td>
                        <td>
                            <?php echo $row['designation']; ?>
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
                                class="edit_btn">Raise Job</a>
                        </td>
                        <td>
                            <a href="../../controllers/employee_controller.php?del=<?php echo '%27' ?><?php echo $row['emp_code']; ?><?php echo '%27' ?>"
                                class="del_btn">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <?php } ?>

</body>

</html>