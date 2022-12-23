<?php 
    include('../../controllers/includes/common.php'); 
    include('../../controllers/employee_controller.php'); 

    if (!isset($_SESSION["emp_id"]))header("location:../../views/login.php");
    // check rights

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELTA@STAAR | Employees</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- Tachyons -->
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.12.0/css/tachyons.min.css"/>
    <!-- CSS files -->
    <link rel="stylesheet" href="../../css/table.css">
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
	</script>
</head>
<body class="bg">
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark f3 lh-copy fw5">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="" alt="Deltin Logo" class="d-inline-block align-text-top">
            </a>
            <ul class="navbar-nav justify-content-end">    
                <li class="nav-item">
                    <a class="nav-link active" id="adminlogin" onmouseover="this.style.cursor='pointer'" onclick = "history.back()" >Back</a>
                </li>
            </ul>    
        </div>
    </nav>

    
    <div class="table-header">
    <h1 class="tc f1 lh-title spr">Employee Details</h1>
    <div class="fl w-75 form-outline srch">
        <input type="search" id="form1" class="form-control" placeholder="Search" aria-label="Search" oninput="search()" />
        <h4 id="demo"></h4>
    </div>
    <div class="fl w-25 tr">
        <button class="btn btn-dark">
            <h5><i class="bi bi-filter-circle"> Sort By</i></h5>
        </button>
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
        
        <?php $results = mysqli_query($conn, "SELECT * FROM employee JOIN employee_designation ON employee_designation.id = employee.designation"); ?>
        <div class="pa1 table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">Employee Code</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Address</th>
                    <th scope="col">State</th>
                    <th scope="col">Country</th>
                    <th scope="col">Pincode</th>
                    <th scope="col">Email</th>
                    <th scope="col">Blood Group</th>
                    <th scope="col">Department</th>
                    <th scope="col">Joining Date</th>
                    <th scope="col">Aadhar Number</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Accommodation</th>
                    <th scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($results)) { ?>
                    <?php 
                    $desigid = $row['designation'];
                    $queryEmployeeDesig = mysqli_query($conn, "SELECT * FROM employee_designation where designation='$desigid'");
                    $EmployeeDesig_row = mysqli_fetch_assoc($queryEmployeeDesig);
					?>
                    <?php
                    $accid = $row['acc_id'];
                    $queryAcc = mysqli_query($conn, "SELECT * FROM accomodation where acc_id='$accid'");
                    $Acc_row = mysqli_fetch_assoc($queryAcc);
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
                            <?php echo $Acc_row['acc_name']; ?>
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
                </tbody>
            </table>
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
</body>
</html>