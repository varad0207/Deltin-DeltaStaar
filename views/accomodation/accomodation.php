<?php include('../../controllers/includes/common.php'); ?>
<?php include('../../controllers/accomodation_controller.php'); 
?>
<?php
    if (!isset($_SESSION["emp_id"]))header("location:../../views/login.php");
    $acc_code = $acc_name = $bldg_status = $location = $gender = $tot_capacity = $no_of_rooms = $occupied_rooms = $available_rooms = $owner = $remark = "";
    if (isset($_GET['edit'])) 
    {
        $acc_code = $_GET['edit'];
        $update = true;
        $record = mysqli_query($conn, "SELECT * FROM accomodation WHERE acc_code=$acc_code");

        $n = mysqli_fetch_array($record);

        $acc_code =  $n['acc_code'];
        $acc_name = $n['acc_name'];
        $bldg_status = $n['bldg_status'];
        $location =  $n['location'];
        $gender = $n['gender'];
        $tot_capacity = $n['tot_capacity'];
        $no_of_rooms = $n['no_of_rooms'];
        $occupied_rooms = $n['occupied_rooms'];
        $available_rooms = $n['available_rooms'];
        $owner = $n['owner'];
        $remark = $n['remark'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Favicon link-->
    <link rel="icon" type="image/x-icon" href="../../images/logo-no-name-circle.png">
    <title>Delta@STAAR | Add Accommodation</title>

    <meta name="description" content="Complaint submission portal for deltin employees">
    <link rel="stylesheet" href="../../css/form.css">
    <link rel="stylesheet" href="../../css/style1.css">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.12.0/css/tachyons.min.css"/>
</head>

<body class="b ma2">
<nav class="navbar  navbar-expand-lg navbar-dark f4 lh-copy pa3 fw4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../../images/logo-no-name.png" height="50px" alt="Deltin Logo" class="d-inline-block align-text-top"
                    style="border-radius: 50px;">
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
                            <a class="nav-link active1" id="adminlogin" onmouseover="this.style.cursor='pointer'" onclick=history.back()>Back</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
  <div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h1 class="f2 lh-copy tc" style="color: white;">Enter Accomodation Details</h1>
                    <form class="requires-validation f3 lh-copy" novalidate action="../../controllers/accomodation_controller.php" method="post">
                      
                        <div class="col-md-12 pa2">
                          <label for="acc_code">Accomodation Code</label>
                            <input class="form-control" type="text" name="code" value="<?php echo $acc_code ?>" placeholder="Accomodation Code" required>
                            <div class="valid-feedback">field is valid!</div>
                            <div class="invalid-feedback">field cannot be blank!</div>
                        </div>

                        <div class="col-md-12 pa2">
                            <label for="acc_name">Accomodation Name</label>
                              <input class="form-control" type="text" name="name" value="<?php echo $acc_name ?>"placeholder="Accomodation Name" required>
                              <div class="valid-feedback">field is valid!</div>
                              <div class="invalid-feedback">field cannot be blank!</div>
                          </div>

                       <div class="col-md-12 pa2">
                        <label for="bldg_status">Building Status</label>
                            <select class="form-select mt-3" name="bldg" value="<?php echo $bldg_status ?>" required>
                                <option selected disabled value="">Select status</option>
                                <option value="Active">Active</option>
								<option value="Permanently Closed">Permanently Closed</option>
								<option value="Temporarily Closed">Temporarily Closed</option>
                           </select>
                            <!-- <div class="valid-feedback">You selected a position!</div> -->
                            <div class="invalid-feedback">Please select an option!</div>
                       </div>

                       <div class="col-md-12 pa2">
                        <label for="location">Location</label>
                          <input class="form-control" type="text" name="loc" value="<?php echo $location ?>" placeholder="Location " required>
                          <div class="valid-feedback">field is valid!</div>
                          <div class="invalid-feedback">field cannot be blank!</div>
                      </div>

                       <div class="col-md-12 pa2">
                        <label for="gender">Gender</label>
                            <select class="form-select mt-3" name="gender" value="<?php echo $gender ?>" required>
                                  <option selected disabled value="">Select Gender</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Femlae</option>
                                  <option value="Unisex">Unisex</option>
                           </select>

                            <div class="invalid-feedback">Please select a gender!</div>
                       </div>

                       <div class="col-md-12 pa2">
                        <label for="tot_capacity">Total Capacity</label>
                          <input class="form-control" type="number" name="cap" value="<?php echo $tot_capacity ?>" placeholder="Total Capacity" required>
                          <div class="valid-feedback">field is valid!</div>
                          <div class="invalid-feedback">field cannot be blank!</div>
                      </div>

                      <div class="col-md-12 pa2">
                        <label for="no_of_rooms">Number of Rooms</label>
                          <input class="form-control" type="number" id="nor" name="rooms" value="<?php echo $no_of_rooms ?>" placeholder="Number of Rooms" required>
                          <div class="valid-feedback">field is valid!</div>
                          <div class="invalid-feedback">field cannot be blank!</div>
                      </div>

                      <div class="col-md-12 pa2">
                        <label for="occupied_rooms">Occupied Rooms</label>
                          <input class="form-control" type="number" id="occnor" name="orooms" value="<?php echo $occupied_rooms ?>" placeholder="Number of Rooms Occupied" required>
                          <div class="valid-feedback">field is valid!</div>
                          <div class="invalid-feedback">field cannot be blank!</div>
                      </div>

                      <div class="col-md-12 pa2">
                        <label for="available_rooms">Available Number of Rooms</label>
                          <input class="form-control" type="number" id="avr" name="arooms" value="<?php echo $available_rooms ?>" placeholder="Availabe number of Rooms" onclick="calc()" required>
                          <p id="avrp" style="display: none;color:red;">Invalid Input!</p>
                          
                      </div>

                       <div class="col-md-12 pa2">
                        <label for="owner">Owner</label>
                          <input class="form-control" type="text" name="owner" value="<?php echo $owner ?>" placeholder="Owner" required>
                          <div class="valid-feedback">field is valid!</div>
                          <div class="invalid-feedback">field cannot be blank!</div>
                      </div>

                       <div class="col-md-12 pa2">
                        <label for="description">Remark</label>
                        <textarea name="remark" value="<?php echo $remark ?>" placeholder="Enter remark if any" cols="30" rows="10"></textarea>
                       </div>
                       

                        <div class="form-button mt-3 tc">
                            <?php if ($update == true): ?>
                                <button id="submit" name="update" value="update" type="submit"
                                    class="btn btn-warning f3 lh-copy" style="color: white;">Update</button>
                                <?php else: ?>
                                <button id="submit" name="submit" value="sumbit" type="submit"
                                    class="btn btn-warning f3 lh-copy" style="color: white;">Submit</button>
						        <?php endif ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
  <footer class="tc f3 lh-copy mt4">Copyright &copy; 2022 Delta@STAAR. All Rights Reserved</footer>
    <script src="../../js/form.js"></script>
    <script>
		function calc(){
		var nor=document.getElementById("nor").value;
		var occnor=document.getElementById("occnor").value;
		var roomsum=parseInt(nor)-parseInt(occnor);
		 if(parseInt(roomsum)>0){
			document.getElementById("avr").value=roomsum;
			document.getElementById("avrp").style.display="none";
		 }else{
		 	document.getElementById("avrp").style.display="block";
		 }
		}
	</script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>