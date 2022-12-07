<?php  include('../controllers/includes/common.php'); ?>
<?php  include('../controllers/employee_controller.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$emp_code = $_GET['edit'];
		$update = true;
		$record = mysqli_query($conn, "SELECT * FROM employee WHERE emp_code=$emp_code");

		// if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);

            $emp_code = $_n['emp_code'];
			$fname = $_n['fname'];
			$mname = $_n['mname'];
			$lname = $_n['lname'];
			$designation = $_n['designation'];
			$dob = $_n['dob'];
			$address = $_n['address'];
			$state = $_n['state'];
			$country = $_n['country'];
			$pincode = $_n['pincode'];
			$email = $_n['emial'];
			$blood_group = $_n['blood_group'];
			$department = $_n['department'];
			$joining_date = $_n['joining_date'];
			$aadhar_number = $_n['aadhar_number'];
			$salary = $_n['salary'];
			$acc_id = $_n['acc_id'];
			$role_id = $_n['role_id'];
		// }
	}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Delta@STAAR | Employees</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- gLightbox gallery-->
  <link rel="stylesheet" href="vendor/glightbox/css/glightbox.min.css">
  <!-- Range slider-->
  <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
  <!-- Choices CSS-->
  <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
  <!-- Swiper slider-->
  <link rel="stylesheet" href="vendor/swiper/swiper-bundle.min.css">
  <!-- Google fonts-->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="css/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/favicon.png">
</head>
<body>
<div class="page-holder">
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

<?php $results = mysqli_query($conn, "SELECT * FROM employee"); ?>

<table>
	<thead>
		<tr>
			<th>Client Id</th>
			<th>Company Name</th>
            <th>State</th>
            <th>Country</th>
            <th>Email Address</th>
            <th>Contact person</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['emp_code']; ?></td>
			<td><?php echo $row['company_name']; ?></td>
            <td><?php echo $row['state']; ?></td>
            <td><?php echo $row['country']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['contact_person']; ?></td>
			<td>
				<a href="client.php?edit=<?php echo $row['emp_code']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="client_php_code.php?del=<?php echo $row['emp_code']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

	<form method="post" action="../controllers/employee_controller.php" >
    <input type="hidden" name="emp_code" value="<?php echo $emp_code; ?>">
		<div class="input-group">
			<label>Client id</label>
            <?php if ($update == true): ?>
                <input disabled type="text" name="emp_code" value="<?php echo $emp_code; ?>">
<?php else: ?>
	<input type="text" name="emp_code" value="<?php echo $emp_code; ?>">
<?php endif ?>
		</div>
		<div class="input-group">
			<label>Company Name</label>
			<input type="text" name="company_name" value="<?php echo $company_name; ?>">
		</div>
        <div class="input-group">
			<label>State</label>
			<input type="text" name="state" value="<?php echo $state; ?>">
		</div>
        <div class="input-group">
			<label>Country</label>
			<input type="text" name="country" value="<?php echo $country; ?>">
		</div>
        <div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
        <div class="input-group">
			<label>Contact Person</label>
			<input type="text" name="contact_person" value="<?php echo $contact_person; ?>">
		</div>
		<div class="input-group">
        <?php if ($update == true): ?>
	<button class="btnn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
	<button class="btnn" type="submit" name="save" >Save</button>
<?php endif ?>
		</div>
	</form>
</div>
</body>
</html>