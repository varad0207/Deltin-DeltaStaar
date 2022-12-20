<?php include('../../controllers/includes/common.php'); ?>
<?php include('../../controllers/rooms_controller.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delta@STAAR | Rooms</title>
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
                    <h1 class="f2 lh-copy tc" style="color: white;">Enter Room Details</h1>
                    <form class="requires-validation f3 lh-copy" novalidate action="../../controllers/rooms_controller.php" method="post">
                      
                        <div class="col-md-12 pa2">
                        <label for="accomodation">Accomodation</label>
                            <select class="form-select mt-3" name="acc" required>
                                <option selected disabled value="">Select Accomodation</option>
                                <option value="1">1</option>
								<option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                           </select>
                            
                            <div class="invalid-feedback">Please select an option!</div>
                        </div>

                        <div class="col-md-12 pa2">
                            <label for="room_no">Room Number</label>
                              <input class="form-control" type="number" name="room_no" placeholder="Room Number" required>
                              <div class="valid-feedback">field is valid!</div>
                              <div class="invalid-feedback">field cannot be blank!</div>
                        </div>

                        <div class="col-md-12 pa2">
                            <label for="room_cap">Room Capacity</label>
                              <input class="form-control" type="number" name="room_cap" placeholder="Room Capacity" required>
                              <div class="valid-feedback">field is valid!</div>
                              <div class="invalid-feedback">field cannot be blank!</div>
                        </div>

                        <div class="col-md-12 pa2">
                            <label for="curr_room_cap">Current Room Occupancy</label>
                              <input class="form-control" type="number" name="curr_room_cap" placeholder="Room Capacity" required>
                              <div class="valid-feedback">field is valid!</div>
                              <div class="invalid-feedback">field cannot be blank!</div>
                        </div>

                       <div class="col-md-12 pa2">
                        <label for="room_status">Room Status</label>
                            <select class="form-select mt-3" name="room_stat" required>
                                <option selected disabled value="">Select status</option>
                                <option value="Occupied">Occupied</option>
								<option value="Available">Available</option>
                           </select>
                            
                            <div class="invalid-feedback">Please select an option!</div>
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
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>