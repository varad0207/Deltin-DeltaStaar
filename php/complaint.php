<?php
require "includes/common.php";
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $emp_code = mysqli_real_escape_string($conn, $_POST['emp_code']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    echo "<script>console.log('1')</script>";
    $insert = "insert into complaints(emp_code, category, description) values ('$emp_code','$category','$description')";
    echo mysqli_error($conn);
    $submit = mysqli_query($conn, $insert) or die(mysqli_error($conn));
    
    header("location: index.php");
}


?>
<!doctype html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>DeltinConnect|Complaint</title>
    <meta name="description" content="Complaint submission portal for deltin employees">
    <link rel="stylesheet" href="../css/complaint.css">
</head>
<!--  -->

<body>
    <header>
        <?php
        // require "includes/header.php";
        ?>
    </header>

    <body class="container bg-light">
        <div class="text-center pt-5">
            <img src="../images/logo.jpeg" alt="network-logo" width="120" height="120" />
            <h2>Lodge A Complaint</h2>
        </div>

        <!-- Start Card -->
        <div class="card">
            <!-- Start Card Body -->
            <div class="card-body">
                <!-- Start Form -->
                <form method="post">
                    <!-- Start Input -->
                    <div class="form-group">
                        <label for="inputEmpCode">Employee Code</label>
                        <input type="text" class="form-control" id="inputEmpCode" name="emp_code" placeholder="eg.HV1234" required />
                        <small class="form-text text-muted">Please enter your Employee Code</small>
                    </div>

                    <div class="form-group">
                        <label for="inputCat">Category: </label>
                        <select id="inputCat" name="category">
                            <option value="" disabled selected>Select Category of complaint</option>
                            <option value="Electrical">Electrical</option>
                            <option value="Plumbing">Plumbing</option>
                            <option value="Carpentary">Carpentary</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inputDes">Complaint description</label>
                        <textarea id="inputDes" class="form-control" name="description" placeholder="Your complaint description" col="30" row="40" required></textarea>
                        <small class="form-text text-muted">Please provide complaint description</small>
                    </div>
                    <!-- Start Submit Button -->
                    <input type="submit" class="btn btn-primary btn-block col-lg-2" name="submit"></input>
                    <!-- End Submit Button -->
                </form>
                <?php
                // require "includes/footer.php";
                ?>
    </body>

</html>