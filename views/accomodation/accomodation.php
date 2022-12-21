<?php include('../../controllers/includes/common.php'); ?>
<?php include('../../controllers/accomodation_controller.php'); 
if (!isset($_SESSION["emp_id"]))header("location:../../views/login.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delta@STAAR | Accomodation</title>
    <meta name="description" content="Complaint submission portal for deltin employees">
    <link rel="stylesheet" href="../../css/form.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.12.0/css/tachyons.min.css"/>
</head>
<body class="b ma2">
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
                            <a class="nav-link active1" onmouseover="this.style.cursor='pointer'" onclick=history.back()>Back</a>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
  <img src="" alt="logo" class="center">
  <div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h1 class="f2 lh-copy tc" style="color: white;">Enter Accomodation Details</h1>
                    <form class="requires-validation f3 lh-copy" novalidate action="../../controllers/accomodation_controller.php" method="post">
                      
                        <div class="col-md-12 pa2">
                          <label for="acc_code">Accomodation Code</label>
                            <input class="form-control" type="text" name="code" placeholder="Accomodation Code" required>
                            <div class="valid-feedback">field is valid!</div>
                            <div class="invalid-feedback">field cannot be blank!</div>
                        </div>

                        <div class="col-md-12 pa2">
                            <label for="acc_name">Accomodation Name</label>
                              <input class="form-control" type="text" name="name" placeholder="Accomodation Name" required>
                              <div class="valid-feedback">field is valid!</div>
                              <div class="invalid-feedback">field cannot be blank!</div>
                          </div>

                       <div class="col-md-12 pa2">
                        <label for="bldg_status">Building Status</label>
                            <select class="form-select mt-3" name="bldg" required>
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
                          <input class="form-control" type="text" name="loc" placeholder="Location " required>
                          <div class="valid-feedback">field is valid!</div>
                          <div class="invalid-feedback">field cannot be blank!</div>
                      </div>

                       <div class="col-md-12 pa2">
                        <label for="gender">Gender</label>
                            <select class="form-select mt-3" name="gender" required>
                                  <option selected disabled value="">Select Gender</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Femlae</option>
                                  <option value="Unisex">Unisex</option>
                           </select>
                            <!-- <div class="valid-feedback">You selected a position!</div> -->
                            <div class="invalid-feedback">Please select a gender!</div>
                       </div>

                       <div class="col-md-12 pa2">
                        <label for="tot_capacity">Total Capacity</label>
                          <input class="form-control" type="number" name="cap" placeholder="Total Capacity" required>
                          <div class="valid-feedback">field is valid!</div>
                          <div class="invalid-feedback">field cannot be blank!</div>
                      </div>

                      <div class="col-md-12 pa2">
                        <label for="no_of_rooms">Number of Rooms</label>
                          <input class="form-control" type="number" id="nor" name="rooms" placeholder="Number of Rooms" required>
                          <div class="valid-feedback">field is valid!</div>
                          <div class="invalid-feedback">field cannot be blank!</div>
                      </div>

                      <div class="col-md-12 pa2">
                        <label for="occupied_rooms">Occupied Rooms</label>
                          <input class="form-control" type="number" id="occnor" name="orooms" placeholder="Number of Rooms Occupied" required>
                          <div class="valid-feedback">field is valid!</div>
                          <div class="invalid-feedback">field cannot be blank!</div>
                      </div>

                      <div class="col-md-12 pa2">
                        <label for="available_rooms">Available Number of Rooms</label>
                          <input class="form-control" type="number" id="avr" name="arooms" placeholder="Availabe number of Rooms" onclick="calc()" required>
                          <p id="avrp" style="display: none;color:red;">Invalid Input!</p>
                          
                      </div>

                       <div class="col-md-12 pa2">
                        <label for="owner">Owner</label>
                          <input class="form-control" type="text" name="owner" placeholder="Owner" required>
                          <div class="valid-feedback">field is valid!</div>
                          <div class="invalid-feedback">field cannot be blank!</div>
                      </div>

                       <div class="col-md-12 pa2">
                        <label for="description">Remark</label>
                        <textarea name="remark" placeholder="Enter remark if any" cols="30" rows="10"></textarea>
                       </div>
                       

                        <div class="form-button mt-3 tc">
                            <button id="submit" name="submit" value="sumbit" type="submit" class="btn btn-warning f3 lh-copy" style="color: white;">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
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