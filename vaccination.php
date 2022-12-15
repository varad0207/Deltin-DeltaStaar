<?php include('../controllers/includes/common.php'); ?>
<?php include('../controllers/vaccination_controller.php'); ?>
<?php
if (isset($_GET['edit'])) {
	$emp_code = $_GET['edit'];
	$update = true;
	$record = mysqli_query($conn, "SELECT * FROM vaccination WHERE emp_id=$emp_id");

	// if (count($record) == 1 ) {
	$n = mysqli_fetch_array($record);

	$emp_id = $n['emp_id'];
	$category = $n['cat_id'];
	$dateofadministration = date('Y-m-d', strtotime($n['doa']));
	$nextdose = date('Y-m-d', strtotime($n['dond']));
	$location = $n['loc'];

	// }
}
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Delta@STAAR | Vaccination</title>
	<meta name="description" content="Employee Addition portal for deltin employees">
	<link rel="stylesheet" href="../css/forms.css">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unpkg.com/tachyons@4.12.0/css/tachyons.min.css" />
</head>

<body>
	<div class="container">
		<h1 class="tc f1 lh-title">Vaccination Form</h1>
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

				<?php $results = mysqli_query($conn, "SELECT * FROM vaccination"); ?>

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
			<td><?php echo $row['emp_id']; ?></td>
			<td><?php echo $row['cat_id']; ?></td>
			<td><?php echo $row['doa']; ?></td>
			<td><?php echo $row['dond']; ?></td>
			<td><?php echo $row['loc']; ?></td>
			<td>
				<a href="vaccination.php?edit=<?php echo '%27' ?><?php echo $row['emp_id']; ?><?php echo '%27' ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="../controllers/vaccination_controller.php?del=<?php echo '%27' ?><?php echo $row['emp_id']; ?><?php echo '%27' ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table> -->

				<form method="post" class="w-100 rounded p-4 border bg-white"
					action="../controllers/vaccination_controller.php">
					<input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>">
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Employee-Id
								<?php if ($update == true): ?>
								<input class="form-control" disabled type="text" name="emp_id"
									value="<?php echo $emp_id; ?>">
								<?php else: ?>
								<input class="form-control" type="text" name="emp_id" value="<?php echo $emp_id; ?>">
								<?php endif ?>
					</div>
					</label>
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Category-Id<span></span>
								<input class="form-control" type="text" name="cat_id" value="<?php echo $cat_id; ?>">
					</div>
					</label>
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Date of Administration<span>
									<input class="form-control" type="date" name="doa" value="<?php echo $doa; ?>">
					</div>
					</label>
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Date of Next Dose<span>
									<input class="form-control" type="date" name="dond" value="<?php echo $dond; ?>">
					</div>
					</label>
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Location <span>
									<input class="form-control" type="text" name="loc" value="<?php echo $loc; ?>">
					</div>
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