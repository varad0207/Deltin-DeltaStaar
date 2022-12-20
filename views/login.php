<?php
require '../controllers/includes/common.php';
if(isset($_SESSION["emp_id"]))
{
    session_unset();
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">


</head>

<body style="background: url(../images/bg-dark.png) center no-repeat;">

    <!-- <p><a href="register.php">Register</a> | <a href="login.php">Login</a> | <a href="index.html">Home</a> </p> -->


    <!--<form action="../controllers/login_controller.php" method="POST">
        Employee Code: <input type="text" name="user"><br><br>
        Password: <input type="password" name="pass"><br><br>
        <input type="submit" value="Login" name="submit"></input>
    </form>-->

    <section class="h-100 gradient-form">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">

                <div class="card rounded-3 gradient-custom-2 p-md-5" style="width: 35%;">

                    <div class="text-center">
                        <img src="../images/logo.png" style="width: 70%;" alt="logo">

                        <h4 class="mt-1 mb-5 pt-1">Login to your account</h4>
                    </div>

                    <form action="../controllers/login_controller.php" method="POST">

                        <div class="form-outline mb-4">
                            <i class="bi bi-person-circle" style="font-size: 1rem; color: #1b1c1e;"></i>
                            <label class="form-label" for="empcode">Employee Code:</label>


                            <input type="text" name="user" id="empcode" class="form-control"
                                placeholder="Enter Employee Code">
                            </input>


                        </div>

                        <div class="form-outline mb-4">
                            <i class="bi bi-key-fill" style="font-size: 1rem; color: #1b1c1e;"></i>
                            <label class="form-label" for="password">Password</label>
                            <input type="password" name="pass" id="password" class="form-control"
                                placeholder="Enter Password" />

                        </div>

                        <div class="text-center pt-1">
                            <button class="btn btn-dark btn-block fa-lg mb-3" type="submit" value="Login"
                                name="submit">Log in</button>

                        </div>
                    </form>

                </div>





            </div>
        </div>
    </section>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>