<?php include('../controllers/includes/common.php'); ?>
<?php include('../controllers/technician_controller.php'); ?>
<?php
if (isset($_GET['edit'])) {
	$emp_id = $_GET['edit'];
	$update = true;
	$record = mysqli_query($conn, "SELECT * FROM technician WHERE emp_id=$emp_id");

	// if (count($record) == 1 ) {
	$n = mysqli_fetch_array($record);

	$emp_id = $n['emp_id'];
	$role = $n['role'];
	/*$mname = $n['mname'];
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
	$acc_id = $n['acc_id'];*/
	
	// }
}
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Delta@STAAR | Technician</title>
	<meta name="description" content="Employee Addition portal for deltin employees">
	<link rel="stylesheet" href="../css/form.css">
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
		<h1 class="tc f1 lh-title">Add/Define Technician</h1>
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

				<?php $results = mysqli_query($conn, "SELECT * FROM technician"); ?>

				<table>
	<thead>
		<tr>
 
		<th>Emp-id </th>
		<th>Role </th>
	

		<th>emp_code </th>
		<th>Role </th>
		
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<?php $employeeid = $row['emp_id'];
                    $queryEmployeeCode = mysqli_query($conn, "SELECT * FROM employee where emp_id=$employeeid");
                    $EmployeeCode_row = mysqli_fetch_assoc($queryEmployeeCode);
					?>
		<tr>
			<td><?php echo $EmployeeCode_row['emp_code']; ?></td>
			<td><?php echo $row['role']; ?></td>
			
			
			<td>
				<a href="../views/technician.php?edit=<?php echo '%27' ?><?php echo $row['id']; ?><?php echo '%27' ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="../controllers/technician_controller.php?del=<?php echo '%27' ?><?php echo $row['id']; ?><?php echo '%27' ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

				<form method="post" class="w-100 rounded p-4 border bg-white"
					action="../controllers/technician_controller.php">
					<input type="hidden" name="eId" value="<?php echo $emp_id; ?>">
					<!-- <div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Employee Code
						<?php if ($update == true): ?>
						<input class="form-control" disabled type="text" name="emp_code" value="<?php echo $emp_code; ?>">
						<?php else: ?>
						<input class="form-control" type="text" name="emp_code" value="<?php echo $emp_code; ?>">
						<?php endif ?>
					</div> -->
					</label>
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Employee Id <span></span>

						<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="eId">
    					<option name="employee_code" selected>Choose...</option>
    					
							<?php
								$emp_det=mysqli_query($conn, "SELECT * FROM employee");
								
								foreach ($emp_det as $row){ ?>
								<option name="employee_code" value="<?= $row["emp_id"]?>"><?= $row["emp_code"];?></option>	
								<?php
								}
								
							?>
						</select>
					</div>
						</label>
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Role: <span>
						<select id="role" name="role"> 
              <option>Select Role</option>
              <option value="Electrician">Electrician</option>
              <option value="Plumber">Plumber</option>
              <option value="Furniture">Furniture</option>
              <option value="Others">Others</option>  </select> </div>					</div>
						</label>

						</label>
					<div class="mb-3 tc">
						<?php if ($update == true): ?>
						<button class="btnn" type="submit" name="update" value="update"
							style="background: #556B2F;">update</button>
						<?php else: ?>
						<button class="btn btn-dark px-3" class="btnn" type="submit" name="save" value="save">Save</button>
						<?php endif ?>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
		crossorigin="anonymous"></script>
</body>

</html>