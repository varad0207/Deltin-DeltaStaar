<?php 
    include('../../controllers/includes/common.php'); 
    include('../../controllers/accomodation_controller.php'); 
    if (!isset($_SESSION["emp_id"]))header("location:../../views/login.php");
    // check rights
    $isPrivilaged = 0;
    $rights = unserialize($_SESSION['rights']);
    if ($rights['rights_accomodation'] > 0) {
        $isPrivilaged = $rights['rights_accomodation'];
    }
else
die('<script>alert("You dont have access to this page, Please contact admin");window.location = history.back();</script>');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Favicon link-->
    <link rel="icon" type="image/x-icon" href="../../images/logo-no-name-circle.png">
    <title>DELTA@STAAR | Accommodation Details</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- Tachyons -->
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.12.0/css/tachyons.min.css"/>
    <!-- CSS files -->
    <link rel="stylesheet" href="../../css/sidebar.css">
    <link rel="stylesheet" href="../../css/table.css">
    <!-- Live Search -->
    <script type="text/javascript">
		function search() {
		    // Declare variables
		    var input, filter, listing, i, txtValue;
		    input = document.getElementById("form1");
		    filter = input.value.toUpperCase();
		    listing = document.getElementsByTagName("tr");
		    // Loop through all 
		    for (i = 0; i < listing.length; i++) {
		      if (listing[i]) {
		        txtValue = listing[i].textContent || listing[i].innerText;
		        if (txtValue.toUpperCase().indexOf(filter) > -1) {
		          listing[i].style.display = "";
		        } else {
		          listing[i].style.display = "none";
                //   document.getElementById("demo").innerHTML = "No Results Found";
		        }
		      }
		    }
		 }
	</script>
</head>
<body class="bg">
    <!-- Sidebar and Navbar-->
    <?php
    include '../../controllers/includes/sidebar.php';
    include '../../controllers/includes/navbar.php';
    ?>

<h1 class="tc f1 lh-title spr">Accommodation Details</h1>
    <div class="item fl w-60 pl4">
        <input type="search" id="form1" class="form-control" placeholder="Search" aria-label="Search" oninput="search()" />
    </div>
    <div class="fl w-40 tr pr5">
        <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
        <h5><i class="bi bi-filter-circle">Filter</i></h5>
        </button>

        <div class="offcanvas offcanvas-top text-bg-dark" data-bs-backdrop="static" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title f2 lh-copy" id="offcanvasTopLabel">DeltaSTAAR</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body offcanvas-size">
                <div>     
                    <!-- Sort and Filter -->
                    <div class="container">
                        <form action="" method="post">
                            <div class="item">
                                <form action="" method="post" class="myForm">
                                    <div class="input-group mb-3">
                                        <select name="sort_alpha" class="form-control">
                                            <option value="">--Select Option--</option>
                                            <option value="a-z" <?php if(isset($_POST['sort_alpha']) && $_POST['sort_alpha'] == "a-z") echo "selected"; ?> >A-Z(Ascending Order)</option>
                                            <option value="z-a" <?php if(isset($_POST['sort_alpha']) && $_POST['sort_alpha'] == "z-a") echo "selected"; ?> >Z-A(Descending Order)</option>
                                        </select>
                                        <button class="btn btn-dark">
                                        <i class="bi bi-filter-circle"> Sort By</i>
                                        </button>
                                    </div>
                                </form>
                                </div>   
                            </div>
                            <div class="parent tc">
                                <form action="" method="post" class="myForm">
                                    <h4>Filter By:</h4> 
                                            <div class="fl w-third pa2">
                                            Location 
                                            <?php
                                            $res1 = mysqli_query($conn, "SELECT * FROM acc_locations");
                                            if(mysqli_num_rows($res1) > 0){
                                                foreach($res1 as $r1){
                                                    $checked1 = [];
                                                    if(isset($_POST['locations'])){
                                                        $checked1 = $_POST['locations'];
                                                    }
                                                    ?>
                                                    
                                                    <div class="check">
                                                        <input type="checkbox" name="locations[]" value="<?= $r1['loc_id'] ?>"
                                                        <?php
                                                        if(in_array($r1['loc_id'],$checked1)) echo "checked";
                                                        ?>
                                                        >
                                                        <?= $r1['location'] ?>
                                                    </div>
                                                
                                                    <?php
                                                }
                                            }
                                            else{
                                                echo "No Record";
                                            }
                                            ?>
                                            <label>Click to Filter</label>
                                            <button type="submit" class="btn btn-dark">Filter</button>
                                            <!-- <button class="btn btn-dark" onclick="formReset()">Reset</button> -->
                                            </div>
                                </form>
                                <!-- <label>Click to Reset</label> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Displaying Database Table -->
    <?php  //Entries per-page
        $results_per_page = 5;

        //Number of results in the DB
        $sql = "select * from accomodation";
        $result = mysqli_query($conn, $sql);
        $number_of_results = mysqli_num_rows($result); 
        //number of pages
        $number_of_pages = ceil($number_of_results / $results_per_page);

        // on which is the user
        if (!isset($_GET['page']))
        $page = 1;
    else
        $page = $_GET['page'];
    //starting limit number for the results
    $this_page_first_result = ($page - 1) * $results_per_page;

   // retrieve the selected results
   $sqli = "SELECT * FROM accomodation LIMIT " . $this_page_first_result . ',' . $results_per_page;
   $results = mysqli_query($conn, $sqli);

        ?>
    <div class="table-div">
        <?php if (isset($_SESSION['message'])): ?>
                <div class="msg">
                    <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                </div>
        <?php endif ?>
        
        <?php 
        $results = mysqli_query($conn, "SELECT * FROM accomodation"); ?>
        <div class="pa1 table-responsive">
            <table class="table table-bordered tc">
                <thead>
                    <tr>
                    <th scope="col">Accomodation Code</th>
                    <th scope="col">Accomodation Name</th>
                    <th scope="col">Building Status</th>
                    <th scope="col">Location</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Total Capacity</th>
                    <th scope="col">Number of Rooms</th>
                    <th scope="col">Warden</th>
                    <!-- <th scope="col">Occupied Rooms</th>
                    <th scope="col">Availabe Rooms</th> -->
                    <th scope="col">Owner</th>
                    <th scope="col">Remark</th>
                    <th scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>

        <?php 
        $sort_condition = "";
        if(isset($_POST['sort_alpha']))
        {
            if($_POST['sort_alpha'] == "a-z"){
                $sort_condition = "ASC";
            }
            else if($_POST['sort_alpha'] == "z-a"){
                $sort_condition = "DESC";
            }
        }
        $results = mysqli_query($conn, "SELECT * FROM accomodation ORDER BY acc_name $sort_condition");
        ?>
        <?php
        if(isset($_POST['locations']))
        {
            $locChecked = [];
            $locChecked = $_POST['locations'];
            foreach($locChecked as $locRow)
            {
                $results = mysqli_query($conn, "SELECT * FROM accomodation WHERE location IN('$locRow')");
                if(mysqli_num_rows($results) > 0){
                    while($row = mysqli_fetch_array($results)){
                        ?>
                        <?php
                        $employeecode = $row['warden_emp_code'];
                        $queryEmployeeName = mysqli_query($conn, "SELECT * FROM employee WHERE emp_code='$employeecode'");
                        $EmployeeName_row = mysqli_fetch_assoc($queryEmployeeName);
                        ?>
                        <?php
                        $accLocation = $row['location'];
                        $queryAccLoc = mysqli_query($conn, "SELECT * FROM acc_locations WHERE loc_id = '$accLocation'");
                        $AccLoc_row = mysqli_fetch_assoc($queryAccLoc);
                        ?>
                        <tr>
                        <th scope="row"><?php echo $row['acc_code']; ?></th>
                        <td>
                                <?php echo $row['acc_name']; ?>
                            </td>
                            <td>
                                <?php echo $row['bldg_status']; ?>
                            </td>
                            <td>
                                <?php echo $AccLoc_row['location']; ?>
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
                                <?php echo $EmployeeName_row['fname']. " " . $EmployeeName_row['lname']; ?>
                            </td>
                            <!-- <td>
                                <?php echo $row['occupied_rooms']; ?>
                            </td>
                            <td>
                                <?php echo $row['available_rooms']; ?>
                            </td> -->
                            <td>
                                <?php echo $row['owner']; ?>
                            </td>
                            <td>
                                <?php echo $row['remark']; ?>
                            </td>
                            <td>
                                <?php if($isPrivilaged>1 && $isPrivilaged!=5 && $isPrivilaged!=4){ ?>
                                <a href="accomodation.php?edit=<?php echo '%27'; ?><?php echo $row['acc_code']; ?><?php echo '%27'; ?>"
                                    class="edit_btn"> <i class="bi bi-pencil-square" style="font-size: 1.2rem; color: black;"></i>
                                </a>
                                <?php } ?>
                                &nbsp;
                                <?php if($isPrivilaged>=4){ ?>
                                <a href="../../controllers/accomodation_controller.php?del=<?php echo '%27' ?><?php echo $row['acc_code']; ?><?php echo '%27' ?>"
                                    class="del_btn"><i class="bi bi-trash" style="font-size: 1.2rem; color: black;"></i>
                                </a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php
                    }
                }
            }
            ?>

                    <?php while ($row = mysqli_fetch_array($results)) { ?>
                        <?php
                        $employeecode = $row['warden_emp_code'];
                        $queryEmployeeName = mysqli_query($conn, "SELECT * FROM employee WHERE emp_code='$employeecode'");
                        $EmployeeName_row = mysqli_fetch_assoc($queryEmployeeName);
                        ?>
                        <?php
                        $accLocation = $row['location'];
                        $queryAccLoc = mysqli_query($conn, "SELECT * FROM acc_locations WHERE loc_id = '$accLocation'");
                        $AccLoc_row = mysqli_fetch_assoc($queryAccLoc);
                        ?>
                    <tr>
                    <th scope="row"><?php echo $row['acc_code']; ?></th>
                    <td>
                            <?php echo $row['acc_name']; ?>
                        </td>
                        <td>
                            <?php echo $row['bldg_status']; ?>
                        </td>
                        <td>
                            <?php echo $AccLoc_row['location']; ?>
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
                            <?php echo $EmployeeName_row['fname']. " " . $EmployeeName_row['lname']; ?>
                        </td>
                        <!-- <td>
                            <?php echo $row['occupied_rooms']; ?>
                        </td>
                        <td>
                            <?php echo $row['available_rooms']; ?>
                        </td> -->
                        <td>
                            <?php echo $row['owner']; ?>
                        </td>
                        <td>
                            <?php echo $row['remark']; ?>
                        </td>
                        <td>
                            <?php if($isPrivilaged>1 && $isPrivilaged!=5 && $isPrivilaged!=4){ ?>
                            <a href="accomodation.php?edit=<?php echo '%27'; ?><?php echo $row['acc_code']; ?><?php echo '%27'; ?>"
                                class="edit_btn"> <i class="bi bi-pencil-square" style="font-size: 1.2rem; color: black;"></i>
                            </a>
                            <?php } ?>
                            &nbsp;
                            <?php if($isPrivilaged>=4){ ?>
                            <a href="../../controllers/accomodation_controller.php?del=<?php echo '%27' ?><?php echo $row['acc_code']; ?><?php echo '%27' ?>"
                                class="del_btn"><i class="bi bi-trash" style="font-size: 1.2rem; color: black;"></i>
                            </a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php
            
            //display the links to the pages
            for($page=1;$page<=$number_of_pages;$page++)
                echo '<a href="accomodation_table.php?page=' .$page .'">' .$page .'</a>';
            ?>
        </div>
    </div>

    <div class="table-footer pa4">
        <div class="fl w-75 tl">
            <form action="excel.php" method="post">
                <button class="btn btn-warning" name="excel" value="excel"><h4><i class="bi bi-file-earmark-pdf"> Export</i></h4></button>
            </form>
        </div>
        <?php if($isPrivilaged>1 && $isPrivilaged!=5 && $isPrivilaged!=4){ ?>
        <div class="fl w-25 tr">
            <button class="btn btn-light">
                <h4><a href="accomodation.php">Add Accommodation</a></h4>
            </button>   
        </div>
        <?php } ?>
    </div>
    
    <!-- Footer -->
    <footer class="tc f3 lh-copy mt4">Copyright &copy; 2022 Delta@STAAR. All Rights Reserved</footer>

    <!-- Script Files -->
    <script src="../../js/form.js"></script>
    <script src="../../js/Sidebar/sidebar.js"></script>
    <script src="https://kit.fontawesome.com/319379cac6.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>