<?php
include('../../controllers/includes/common.php');
if (!isset($_SESSION["emp_id"]))header("location:../../views/login.php");

?>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
  <link rel="stylesheet" href="../../css/emp.css">
  <title>DeltinConnect | EMP-Outing</title>
</head>

<body class="container">

  <!-- Start Header form -->
  <div class="text-center">
    <img src="../../images/logo.png" alt="network-logo" width="200" height="200" />
    <h2>Employee Outing Form</h2>
  </div>
  <!-- End Header form -->

  <!-- Start Card -->
  <div class="card" id="card">
    <!-- Start Form -->
    <form id="form" method="post" action="../../controllers/employee_outing.php" class="needs-validation" novalidate
      autocomplete="off">
      <!-- Start Input Name -->

      <div class="form-group">
        <label for="inputId">Employee Code</label>
        <input type="text" class="form-control" id="inputid" name="emp_code" placeholder="Code" required />
        <small class="form-text text-muted">Please fill your employee code</small>

      </div>

      <div class="form-group">
        <label for="inputDate">Outing Start Date</label>
        <input type="date" class="form-control" id="inputDate" name="start_date" required />
        <small class="form-text text-muted">Please choose Outing Date</small>
      </div>

      <div class="form-group">
        <label for="inputDate">Arrival Date</label>
        <input type="date" class="form-control" id="inputDate" name="arrival_date" required />
        <small class="form-text text-muted">Please choose Arrival Date</small>
      </div>

      <div class="form-group">
        <label for="inputcate">Category:</label>
        <br>
        <select id="cate" name="category">
          <option selected disabled>Select Category</option>
          <option value="normal">One Day Outing</option>
          <option value="permanent">Permanently Leaving</option>
          <option value="home">Home Outing</option>
          <option value="others">Others</option>
        </select>
      </div>
      <!-- Start Submit Button -->
      <input class="btn btn-primary btn-block" type="submit" name="submit"></input>
      <!-- End Submit Button -->
    </form>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="../../js/emp.js"></script>
  <!-- Start Scritp for Form -->
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
      'use strict';
      window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
          form.addEventListener('submit', function (event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>
  <!-- End Scritp for Form -->
  <footer>
    <div class="my-4 text-muted text-center">
      <p>© deltaSTAAR</p>
    </div>
  </footer>
</body>
</html>