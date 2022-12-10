<?php include('../controllers/includes/common.php'); ?>
<?php include('../controllers/employee_controller.php'); ?>
<?php
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
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Delta@STAAR | Add Employees</title>
	<meta name="description" content="Employee Addition portal for deltin employees">
	<link rel="stylesheet" href="../css/forms.css">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unpkg.com/tachyons@4.12.0/css/tachyons.min.css" />
</head>

<body>
	<div class="container">
		<h1 class="tc f1 lh-title">Add New Employee</h1>
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

				<?php $results = mysqli_query($conn, "SELECT * FROM employee"); ?>

				<!-- <table>
	<thead>
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
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['emp_code']; ?></td>
			<td><?php echo $row['fname']; ?></td>
			<td><?php echo $row['mname']; ?></td>
			<td><?php echo $row['lname']; ?></td>
			<td><?php echo $row['designation']; ?></td>
			<td><?php echo date('d-m-Y',strtotime($row['dob'])); ?></td>
			<td><?php echo $row['address']; ?></td>
			<td><?php echo $row['state']; ?></td>
			<td><?php echo $row['country']; ?></td>
			<td><?php echo $row['pincode']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['blood_group']; ?></td>
			<td><?php echo $row['department']; ?></td>
			<td><?php echo date('d-m-Y',strtotime($row['joining_date'])); ?></td>
			<td><?php echo $row['aadhaar_number']; ?></td>
			<td><?php echo $row['salary']; ?></td>
			<td><?php echo $row['acc_id']; ?></td>
			
			<td>
				<a href="employee.php?edit=<?php echo '%27' ?><?php echo $row['emp_code']; ?><?php echo '%27' ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="../controllers/employee_controller.php?del=<?php echo '%27' ?><?php echo $row['emp_code']; ?><?php echo '%27' ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table> -->

				<form method="post" class="w-100 rounded p-4 border bg-white"
					action="../controllers/employee_controller.php">
					<input type="hidden" name="emp_code" value="<?php echo $emp_code; ?>">
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Employee Code
								<?php if ($update == true): ?>
								<input class="form-control" disabled type="text" name="emp_code"
									value="<?php echo $emp_code; ?>">
								<?php else: ?>
								<input class="form-control" type="text" name="emp_code"
									value="<?php echo $emp_code; ?>">
								<?php endif ?>
					</div>
					</label>
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">First Name <span></span>
								<input class="form-control" type="text" required name="fname" value="<?php echo $fname; ?>">
					</div>
					</label>
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Middle Name <span>
									<input class="form-control" type="text" required name="mname" value="<?php echo $mname; ?>">
					</div>
					</label>
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Last Name <span>
									<input class="form-control" type="text" required name="lname" value="<?php echo $lname; ?>">
					</div>
					</label>
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Designation <span>
									<input class="form-control" type="text" required name="designation"
										value="<?php echo $designation; ?>">
					</div>
					</label>
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Date of Birth <span>
									<input class="form-control" type="date" required name="dob" value="<?php echo $dob; ?>">
					</div>
					</label>
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Address <span>
									<input class="form-control" type="text" required name="address"
										value="<?php echo $address; ?>">
					</div>
					</label>
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">State <span>
									<input class="form-control" type="text" required name="state" value="<?php echo $state; ?>">
					</div>
					</label>
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Country <span>
									<input class="form-control" type="text" required name="country"
										value="<?php echo $country; ?>">
					</div>
					</label>
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Pincode <span>
									<input class="form-control" type="number" required name="pincode"
										value="<?php echo $pincode; ?>">
					</div>
					</label>
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Email <span>
									<input class="form-control" type="email" name="email" value="<?php echo $email; ?>">
					</div>
					</label>
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Blood Group <span>
									<input class="form-control" type="text" name="blood_group"
										value="<?php echo $blood_group; ?>">
					</div>
					</label>
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Department <span>
									<input class="form-control" type="text" name="department"
										value="<?php echo $department; ?>">
					</div>
					</label>
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Joining Date <span>
									<input class="form-control" type="date" name="joining_date"
										value="<?php echo $joining_date; ?>">
					</div>
					</label>
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Aadhaar Number <span>
									<input class="form-control" type="text" required name="aadhaar_number"
										value="<?php echo $aadhaar_number; ?>">
					</div>
					</label>
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Salary <span>
									<input class="form-control" type="text" name="salary"
										value="<?php echo $salary; ?>">
					</div>
					</label>
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Accomodation Id <span>
									<input class="form-control" type="text" name="acc_id"
										value="<?php echo $acc_id; ?>">
					</div>
					</label>

					</label>
					<div class="mb-3 tc">
						<?php if ($update == true): ?>
						<button class="btnn" type="submit" name="update" value="update"
							style="background: #556B2F;">update</button>
						<?php else: ?>
						<button class="btn btn-dark px-3" class="btnn" type="submit" name="save"
							value="save">Save</button>
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