<?php include('../../controllers/includes/common.php'); ?>
<?php include('../../controllers/tanker_controller.php'); 
if (!isset($_SESSION["emp_id"]))header("location:../../views/login.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeltinConnect | Tankers</title>
    <meta name="description" content="">
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
                    <h1 class="f2 lh-copy tc" style="color: white;">Tanker Entry</h1>
                    <form class="requires-validation f3 lh-copy" novalidate action="../controllers/tanker_controller.php" method="post">

                        <div class="col-md-12 pa2">
                          <label for="accid">Accomodation ID</label>
                          <select class="form-select mt-3" name="acc" required>
                                <option selected disabled value="">Select Accomodation</option>
                                <?php
                                $acc_code=mysqli_query($conn, "SELECT * FROM accomodation");
                                
                                foreach ($acc_code as $row){ ?>
                                <option name="acc" value="<?= $row["acc_id"]?>"><?= $row["acc_code"];?></option>	
                                <?php
                                }
                              ?>
                           </select>
                        </div>

                        <div class="col-md-12 pa2">
                          <label for="empsecid">Employee Security ID</label>
                          <select class="form-select mt-3" name="sec" required>
                                <option selected disabled value="">Select Security</option>
                                <?php
                                  $sec_id = mysqli_query($conn, "SELECT * FROM security");
                                  
                                  foreach ($sec_id as $row){ ?>
                                  <option name="sec" value="<?= $row["emp_id"]?>"><?= $row["acc_id"];?></option>	
                                  <?php
                                  }
                                  
                                ?>
                           </select>
                        </div>

                        
                      
                       <div class="col-md-12 pa2">
                        <label for="quality">Quality</label>
                            <select class="form-select mt-3" name="quality" required>
                                  <option selected disabled value="">Select Quality</option>
                                  <option value="ok">Ok</option>
                                  <option value="not ok">Not Ok</option>
                           </select>
                            
                       </div>

                       <div class="col-md-12 pa2">
                        <label for="quantity">Quantity</label>
                          <input class="form-control" type="number" name="qty" placeholder="7000" required>
                          <div class="valid-feedback">field is valid!</div>
                          <div class="invalid-feedback">field cannot be blank!</div>
                      </div>

                      <div class="col-md-12 pa2">
                        <label for="billno">Bill Number</label>
                          <input class="form-control" type="number" name="billno" placeholder="Bill Number" required>
                          <div class="valid-feedback">field is valid!</div>
                          <div class="invalid-feedback">field cannot be blank!</div>
                      </div>
                       
                      <div class="col-md-12 pa2">
                          <label for="vid">Vendor ID</label>
                          <select class="form-select mt-3" name="vendor" required>
                                <option selected disabled value="">Select Vendor</option>
                                <?php
                                  $vendor = mysqli_query($conn, "SELECT * FROM vendor");
                                  
                                  foreach ($vendor as $row){ ?>
                                  <option name="vendor" value="<?= $row["id"]?>"><?= $row["vname"];?></option>	
                                  <?php
                                  }
                                ?>
                           </select>
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
