<?php include('../../controllers/includes/common.php'); ?>
<?php include('../../controllers/accomodation_controller.php'); ?>
<?php
if (isset($_POST['submit']) && !empty($_POST['submit']))
{
    $acode = mysqli_real_escape_string($conn, $_POST['code']);
    $aname = mysqli_real_escape_string($conn, $_POST['name']);
    $bldg = mysqli_real_escape_string($conn, $_POST['bldg']);
    $loc = mysqli_real_escape_string($conn, $_POST['loc']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $tot_capacity = mysqli_real_escape_string($conn, $_POST['cap']);
    $rooms = mysqli_real_escape_string($conn, $_POST['rooms']);
    $arooms = mysqli_real_escape_string($conn, $_POST['arooms']);
    $orooms = mysqli_real_escape_string($conn, $_POST['orooms']);
    $owner = mysqli_real_escape_string($conn, $_POST['owner']);
    $remark = mysqli_real_escape_string($conn, $_POST['remark']);

    echo "<script>console.log('1')</script>";

    $insert = "insert into accomodation (acc_id, acc_code, acc_name, bldg_status, location, gender, tot_capacity, no_of_rooms, occupied_rooms, available_rooms, owner, remark) values ('', '$acode', '$aname', '$bldg', '$loc', '$gender', '$tot_capacity', '$rooms', '$arooms', '$orooms', '$owner', '$remark')";

    echo mysqli_error($conn);
    $submit = mysqli_query($conn, $insert) or die(mysqli_error($conn));
    header("location: ../index.html");
}
?>
<?php
if (isset($_GET['edit'])) {
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
    <title>DeltinConnect | Accomodation</title>
    <meta name="description" content="Complaint submission portal for deltin employees">
    <link rel="stylesheet" href="../../css/form.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.12.0/css/tachyons.min.css"/>
</head>
<body class="b ma2">
  <img src="" alt="logo" class="center">
  <div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h1 class="f2 lh-copy tc" style="color: white;">Enter Accomodation Details</h1>
                    <form class="requires-validation f3 lh-copy" novalidate action="../controllers/accomodation.php" method="post">
                      
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
                                  <option value="Full">Full</option>
                                  <option value="Not Full">Not Full</option>
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
                                  <option value="Other">Other</option>
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
                          <input class="form-control" type="number" name="rooms" placeholder="Number of Rooms" required>
                          <div class="valid-feedback">field is valid!</div>
                          <div class="invalid-feedback">field cannot be blank!</div>
                      </div>

                      <div class="col-md-12 pa2">
                        <label for="occupied_rooms">Occupied Rooms</label>
                          <input class="form-control" type="number" name="orooms" placeholder="Number of Rooms Occupied" required>
                          <div class="valid-feedback">field is valid!</div>
                          <div class="invalid-feedback">field cannot be blank!</div>
                      </div>

                      <div class="col-md-12 pa2">
                        <label for="available_rooms">Available Number of Rooms</label>
                          <input class="form-control" type="number" name="arooms" placeholder="Availabe number of Rooms" required>
                          <div class="valid-feedback">field is valid!</div>
                          <div class="invalid-feedback">field cannot be blank!</div>
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
    <script src="../js/form.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>