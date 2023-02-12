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
		        }
		      }
		    }
		 }

         function resetFrom() {
            document.getElementById("myForm").reset();
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
    <div class="item fl w-50 pa1">
        <input type="search" id="form1" class="form-control" placeholder="Search" aria-label="Search" oninput="search()" />
    </div>
    <div class="fl w-50 pa1">
        <form action="" method="post" class="myForm">
            <div class="input-group mb-3">
                <select name="sort_alpha" class="form-control">
                    <option value="">--Select Option--</option>
                    <option value="a-z" <?php if (isset($_POST['sort_alpha']) && $_POST['sort_alpha'] == "a-z") echo "selected"; ?>>A-Z(Ascending Order)</option>
                    <option value="z-a" <?php if (isset($_POST['sort_alpha']) && $_POST['sort_alpha'] == "z-a") echo "selected"; ?>>Z-A(Descending Order)</option>
                </select>
                <button class="btn btn-light btn-outline-dark">
                    <i class="bi bi-filter-circle">Sort By</i>
                </button>
            </div>
        </form>
    </div>
    <!-- FILTERING DATA -->
    <div class="pa1">
        <br>
        <form action="" method="GET" class="myForm">
            <label style="color:white;">Filter By</label>
            <button type="sumbit" class="btn btn-light">Go</button>
            <!-- <button type="reset" class="btn btn-light" onclick="resetForm()">Reset</button> -->
            <!-- <input type="button" value="Reset" onclick="resetForm()"> -->
            <br>
            <br>
            <table class="table">
                <thead>
                    <th>Location : </th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php
                            $fetch_loc = "SELECT * FROM acc_locations";
                            $fetch_loc_run = mysqli_query($conn, $fetch_loc);
                            if (mysqli_num_rows($fetch_loc_run) > 0) {
                                foreach ($fetch_loc_run as $loc) {
                                    $checked1 = [];
                                    if (isset($_GET['location'])) {
                                        $checked1 = $_GET['location'];
                                    }
                            ?>
                                    <div>
                                        <input type="checkbox" name="location[]" value="<?= $loc['loc_id']; ?>" <?php if (in_array($loc['loc_id'], $checked1)) {
                                                                                                                        echo "checked";
                                                                                                                    }
                                                                                                                    ?>>
                                        <label><?= $loc['location']; ?></label>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "No location available";
                            }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    

    <!-- Displaying Database Table -->
        <?php  //Entries per-page
        $results_per_page = 5;

        //Number of results in the DB
        $sql = "SELECT * FROM accomodation";
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

        ?>
        <?php 
        $sqli = "SELECT * FROM accomodation t1 JOIN acc_locations t2 ON t1.location=t2.loc_id JOIN employee t3 ON t1.warden_emp_code=t3.emp_code WHERE 1=1";
        $sort_condition = "";
        if (isset($_POST['sort_alpha'])) {
            if ($_POST['sort_alpha'] == "a-z") {
                $sort_condition = "ASC";
            } else if ($_POST['sort_alpha'] == "z-a") {
                $sort_condition = "DESC";
            }
        }
        if(isset($_GET['location'])){
            $location_checked = [];
            $location_checked = $_GET['location'];
            $sqli .= " AND ( ";
            foreach($location_checked as $row_loc){
                $sqli .= " accomodation.location=$row_loc OR"; 
            }
            $sqli =substr($sqli,0,strripos($sqli,"OR"));  
            $sqli .=" ) ";
            
        }
        $sqli .=" ORDER BY acc_name $sort_condition";
        echo $sqli;
        // retrieve the selected results
        $sqli .= " LIMIT " . $this_page_first_result . ',' . $results_per_page;
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
                    <tr>
                    <th scope="row"><?php echo $row['acc_code']; ?></th>
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
                            <?php echo $row['fname']. " " . $row['lname']; ?>
                        </td>
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
                    <?php } 
                    }
                    ?>
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