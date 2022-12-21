<?php include('../../controllers/includes/common.php'); ?>
<?php include('../../controllers/accomodation_controller.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delta@STAAR | Accomodation</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="../../css/AccommodationView.css">
</head>
<body class="b ma2 bgcolor">
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
                            <a class="nav-link active1" href="../index.html">Back</a>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="" style="margin: 0% 5.1%;">
        <div class="row">
            <div class="col-1">
                <!--Link back page, remmove target and rel if you dont want it to open the link in a new tab-->
                <a role="button" href="#" target="_blank" rel="noopener noreferrer">
                    <i class="bi bi-arrow-left-circle" style="font-size: 2rem; color: white;"></i>
                </a>
            </div>
            <div class="col-8">
                <h1 class="text-center">All Accomodations</h1>
            </div>
            <div class="col ml-5 sort">
                <a class="button" role="button" href="#">
                    <i class="bi bi-sort-down-alt" style="font-size: 1.5rem; color: white;">Sort by</i>
                </a>

            </div>
        </div>
    </div>

    <div class="table-div">

        <div class="table-responsive bg-white">
        <?php if (isset($_SESSION['message'])): ?>
                <div class="msg">
                    <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                </div>
                <?php endif ?>

                <?php $results = mysqli_query($conn, "SELECT * FROM accomodation"); ?>

            <table class="table table-hover m-0">
                <thead style="border: 2px solid black;">
                    <tr>
                    <th>Accomodation Code</th>
                    <th>Accomodation Name</th>
                    <th>Building Status</th>
                    <th>Location</th>
                    <th>Gender</th>
                    <th>Total Capacity</th>
                    <th>Number of Rooms</th>
                    <th>Occupied Rooms</th>
                    <th>Availabe Rooms</th>
                    <th>Owner</th>
                    <th>Remark</th>
                    <th colspan="2">Action</th>
                    <tr>
                </thead>
                <tbody>

                <?php while ($row = mysqli_fetch_array($results)) { ?>
                    <tr>
                        <td>
                            <?php echo $row['acc_code']; ?>
                        </td> 
                        <td>
                            <?php echo $row['acc_name']; ?>
                        </td>
                        <td>
                            <?php echo $row['bldg_status']; ?>
                        </td>
                        <td>
                            <?php echo $row['location']; ?>
                        </td>
                        <td>
                            <?php echo $row['gender']; ?>
                        </td>
                        <td>
                            <?php echo $row['tot_capacity']; ?>
                        </td>
                        <td>
                            <?php echo $row['no_of_rooms']; ?>
                        </td>
                        <td>
                            <?php echo $row['occupied_rooms']; ?>
                        </td>
                        <td>
                            <?php echo $row['available_rooms']; ?>
                        </td>
                        <td>
                            <?php echo $row['owner']; ?>
                        </td>
                        <td>
                            <?php echo $row['remark']; ?>
                        </td>
                        <td>
                            <a href="accomodation.php?edit=<?php echo '%27' ?><?php echo $row['acc_id']; ?><?php echo '%27' ?>"
                                class="edit_btn"> <i class="bi bi-pencil-square" style="font-size: 1.2rem; color: black;"></i></a>
                        &nbsp;
                            <a href="../../controllers/accomodation_controller.php?del=<?php echo '%27' ?><?php echo $row['acc_id']; ?><?php echo '%27' ?>"
                                class="del_btn"><i class="bi bi-trash" style="font-size: 1.2rem; color: black;"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                </tbody>
            </table>
        </div>


    </div>
    <div class="" style="margin:2% 5%;">
        <div class="row">
            <div class="col-2">
                <!--Link back page, remmove target and rel if you dont want it to open the link in a new tab-->
                <a role="button" href="#" target="_blank" rel="noopener noreferrer">
                    <i class="bi bi-file-earmark-pdf" style="font-size: 1.5rem; color: white;">Export</i>
                </a>
            </div>
            <div class="col-8">

            </div>
            <div class="col-2">

                <a role="button" class="btn btn-light" href="accomodation.php">
                    Add Room
                </a>

            </div>
        </div>
    </div>

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