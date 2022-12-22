<?php include('../../controllers/includes/common.php'); ?>
<?php include('../../controllers/vaccination_controller.php'); ?>
<?php
if (!isset($_SESSION["emp_id"]))header("location:../../views/login.php");

if (isset($_GET['edit'])) {
	$vaccination_id = $_GET['edit'];
	$update =true;
	$record = mysqli_query($conn, "SELECT * FROM vaccination WHERE vaccination_id=$vaccination_id");
	// if (count($record) == 1 ) {
	$n=mysqli_fetch_array($record);
	$emp_id = $n['emp_id'];
	$category = $n['category_id'];
	$dateofadministration = date('Y-m-d', strtotime($n['date_of_administration']));
	$location = $n['location'];
	$nextdose = date('Y-m-d', strtotime($n['date_of_next_dose']));
	

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
	<link rel="stylesheet" href="../../css/form.css">
	<link rel="stylesheet" href="../../css/style1.css">

	<!-- <link rel="stylesheet" href="../css/style.css"> -->
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unpkg.com/tachyons@4.12.0/css/tachyons.min.css" />
</head>

<body class="b ma2">
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
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="color: #fff;">Delta@STAAR</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
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
                            <a class="nav-link active1" id="adminlogin" onmouseover="this.style.cursor='pointer'" onclick=history.back()>Back</a>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
	<div class="container">
		<h1 class="tc f1 lh-title" style="color: white;">Vaccination Form</h1>
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
				<form method="post" class="w-100 rounded p-4 border" style="color: white;" action="../../controllers/vaccination_controller.php">
					<input type="hidden" name="vaccination_id" value="<?php echo $vaccination_id; ?>">
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Employee Code :-



						<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="emp_id">
    					<option name="employee_code" selected>Choose...</option>
    					
							<?php
								$emp_det=mysqli_query($conn, "SELECT * FROM employee");
								
								foreach ($emp_det as $row){ ?>
								<option name="employee_code" value="<?= $row["emp_id"]?>"><?= $row["emp_code"];?></option>	
								<?php
								}
								
							?>
						</select>



								<!-- <?php if ($update == true): ?>
								<input class="form-control" disabled type="text" name="emp_id" value="<?php echo $emp_id; ?>"> 
								<?php else: ?>
								<input class="form-control" type="text" name="emp_id" value="<?php echo $emp_id; ?>">
								<?php endif ?> -->
					</div>
					</label>
					<div class="input-group">
						<label class="d-block mb-4" for="inlineFormCustomSelectPref"> <span class="d-block mb-2">Category :- <span></span>
						<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="cat_id">
    					<option name="category_name" selected>Choose...</option>
    					
							<?php
								$vac_cat=mysqli_query($conn, "SELECT * FROM vaccination_category");
								
								foreach ($vac_cat as $row1){ ?>
								<option name="category_name" value="<?= $row1["category_id"]?>"><?= $row1["category_name"];?></option>	
								<?php
								}
								
							?>
						</select>
					</div>
					</label>
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Date of Administration<span>
									<input class="form-control" type="date" name="doa" value="<?php echo $dateofadministration; ?>">
					</div>
					</label>
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Date of Next Dose<span>
									<input class="form-control" type="date" name="dond" value="<?php echo $nextdose; ?>">
					</div>
					</label>
					<div class="input-group">
						<label class="d-block mb-4"> <span class="d-block mb-2">Location <span>
									<input class="form-control" type="text" name="loc" value="<?php echo $location; ?>">
					</div>
					</label>

					<div class="mb-3 tc">
						<?php if ($update == true): ?>
						<button class="btnn" type="submit" name="update" value="update"
							style="background: #556B2F;">Update</button>
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>