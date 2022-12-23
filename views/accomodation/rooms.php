<?php include('../../controllers/includes/common.php'); ?>
<?php include('../../controllers/rooms_controller.php'); ?>
<?php
if (!isset($_SESSION["emp_id"]))header("location:../../views/login.php");
    $update = "";

    if (isset($_GET['edit'])) 
    {
        $room_id = $_GET['edit'];
        $update = true;
        $record = mysqli_query($conn, "SELECT * FROM rooms WHERE id=$room_id");

        $n = mysqli_fetch_array($record);

        $acc_id = $n['acc_id'];
        $room_no = $n['room_no'];
        $room_cap = $n['room_capacity'];
        $status = $n['status'];
        $curr_room_cap = $n['current_room_occupancy'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delta@STAAR | Raise Complain</title>
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
                    <h1 class="f2 lh-copy tc" style="color: white;">Enter Room Details</h1>
                    <form class="requires-validation f3 lh-copy" novalidate action="../../controllers/rooms_controller.php" method="post">
                      
                        <div class="col-md-12 pa2">
                        <label for="accomodation">Accomodation</label>
                            <select class="form-select mt-3" name="acc" required>
                                <option selected disabled value="">Select Accomodation</option>
                                <?php
								$acc_code=mysqli_query($conn, "SELECT * FROM accomodation");
								
								foreach ($acc_code as $row){ ?>
								<option name="acc" value="<?= $row["acc_id"]?>"><?= $row["acc_name"];?></option>	
								<?php
								}								
							?>
                           </select>
                            
                            <div class="invalid-feedback">Please select an option!</div>
                        </div>

                        <div class="col-md-12 pa2">
                            <label for="room_no">Room Number</label>
                              <input class="form-control" type="number" name="room_no" value="<?php echo $room_no ?>" placeholder="Room Number" required>
                              <div class="valid-feedback">field is valid!</div>
                              <div class="invalid-feedback">field cannot be blank!</div>
                        </div>

                        <div class="col-md-12 pa2">
                            <label for="room_cap">Room Capacity</label>
                              <input class="form-control" type="number" name="room_cap" value="<?php echo $room_cap ?>" placeholder="Room Capacity" required>
                              <div class="valid-feedback">field is valid!</div>
                              <div class="invalid-feedback">field cannot be blank!</div>
                        </div>

                        <div class="col-md-12 pa2">
                            <label for="curr_room_cap">Current Room Occupancy</label>
                              <input class="form-control" type="number" name="curr_room_cap" value="<?php echo $curr_room_cap ?>" placeholder="Room Occupancy" required>
                              <div class="valid-feedback">field is valid!</div>
                              <div class="invalid-feedback">field cannot be blank!</div>
                        </div>

                       <div class="col-md-12 pa2">
                        <label for="room_status">Room Status</label>
                            <select class="form-select mt-3" name="room_stat" value="<?php echo $status ?>" required>
                                <option selected disabled value="">Select status</option>
                                <option value="Occupied">Occupied</option>
								<option value="Available">Available</option>
                           </select>
                            
                            <div class="invalid-feedback">Please select an option!</div>
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
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>