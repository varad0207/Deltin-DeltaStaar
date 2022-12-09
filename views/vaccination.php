<?php
session_start();?>
<head>
  
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
  <!-- <link rel="stylesheet" href="../css/emp.css"> -->
  <title>Vaccination form</title>
</head> 
  
<body class="container bg-light">
 
  <div class="text-center pt-5">
    <img src="https://cdn-icons-png.flaticon.com/512/2138/2138347.png" alt="vaccination-logo" width="140" height="140" />
    <h2>Vaccination form</h2>
  </div>
  

  
  <div class="card">
    
    <div class="card-body">
      
      <form id="LoginForm" action="../controllers/vaccination_controller.php " method="POST" class="needs-validation" novalidate autocomplete="off">
        
        <div class="row">
          
          <!-- <div class="form-group col-md-4">
          <label for="inputId">Vaccination Id</label>
          <input type="text" class="form-control" id="inputid" name="Id" placeholder="Your Id" required />
          <small class="form-text text-muted">Please fill your Vaccination-Id</small>
          </div>  -->
        
          <div class="form-group col-md-4">
          <label for="inputId">Employee-Id</label>
          <input type="text" class="form-control" id="inputid" name="emp_id" placeholder="Your employee Id" required />
          <small class="form-text text-muted">Please fill your Employee-Id</small>
          </div>

          <div class="form-group col-md-4">
          <label for="inputId">Category-Id</label>
          <input type="text" class="form-control" id="inputid" name="cat_id" placeholder="Your category Id" required />
          <small class="form-text text-muted">Please fill your Category-Id</small>
          </div>
          
          <div class="form-group col-md-4">
          <label for="inputDate">Date of Administration</label>
          <input type="date" class="form-control" id="inputDatee" name="doa" placeholder="Date of vaccine taken" required />
          <small class="form-text text-muted">Please choose date of Administration</small>
          </div>  

          <div class="form-group col-md-4">
          <label for="inputDate">Date of Next Dose</label>
          <input type="date" class="form-control" id="inputDate" name="dond" placeholder="Date of next dose"required />
          <small class="form-text text-muted">Please choose date of Next dose</small>
          </div>

          <div class="form-group col-md-4">
          <label for="inputloc">Location</label>
          <input type="text" class="form-control" id="loc" name="loc" placeholder="Location" required />
          <small class="form-text text-muted">Please fill your Category-Id</small>
          </div>

        </div>
       <button class="btn btn-primary btn-block col-lg-2" type="submit" value="submit" name="submit">Submit</button>
      
      </form>
      </div>
      </div>
  
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="../js/emp.js"></script>
  
  <script>
    
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
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
        <p>© deltinconnect</p>
      </div>
    </footer>
</body> 