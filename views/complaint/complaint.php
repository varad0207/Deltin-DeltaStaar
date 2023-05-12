<?php
require '../../controllers/includes/common.php';
require '../../controllers/complaint_controller.php';

if (isset($_SESSION['emp_id']) && isset($_GET['edit'])) {
    $acc = mysqli_fetch_array(
        mysqli_query(
            $conn,
            "SELECT acc_code 
        FROM employee 
        join rooms on rooms.id=employee.room_id
        join accomodation on accomodation.acc_id=rooms.acc_id
        WHERE emp_id='{$_SESSION['emp_id']}'"
        )
    );
    $acc_code = $acc['acc_code'];
}

$update = "";
$acc_code = '';
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($conn, "SELECT * FROM complaints WHERE id=$id");

    $n = mysqli_fetch_array($record);

    $raise_timestamp = $n['raise_timestamp'];
    $category = $n['category'];
    $description = $n['description'];
    $status = $n['status'];
    $tech_closure_timestamp = $n['tech_closure_timestamp'];
    $sec_closure_timestamp = $n['sec_closure_timestamp'];
    $warden_closure_timestamp = $n['warden_closure_timestamp'];
    $remarks = $n['remarks'];
    $emp_code = $n['emp_code'];
    $acc_code = $n['acc_code'];
    $acc_name = $n['acc_name'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Favicon link-->
    <link rel="icon" type="image/x-icon" href="../../images/logo-no-name-circle.png">
    <title>Delta@STAAR | Raise Complaint</title>
    <meta name="description" content="Complaint submission portal for deltin employees">
    <link rel="stylesheet" href="../../css/form.css">
    <link rel="stylesheet" href="../../css/style1.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.12.0/css/tachyons.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        /*the container must be positioned relative:*/
        .autocomplete {
            position: relative;
            display: inline-block;
        }





        .autocomplete-items {
            position: absolute;
            border: 1px solid #d4d4d4;
            border-bottom: none;
            border-top: none;
            z-index: 99;
            /*position the autocomplete items to be the same width as the container:*/
            top: 100%;
            left: 0;
            right: 0;
        }

        .autocomplete-items div {
            padding: 10px;
            cursor: pointer;
            background-color: #fff;
            border-bottom: 1px solid #d4d4d4;
        }

        /*when hovering an item:*/
        .autocomplete-items div:hover {
            background-color: #e9e9e9;
        }

        /*when navigating through the items using the arrow keys:*/
        .autocomplete-active {
            background-color: #e9e9e9 !important;
        }
    </style>
</head>

<body class="b ma2" onload="fetchList()">
    <!-- Sidebar and Navbar-->
    <?php
    if (isset($_SESSION['emp_id'])) {
        include '../../controllers/includes/sidebar.php';
        include '../../controllers/includes/navbar.php';
    }
    ?>
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h1 class="f2 lh-copy tc" style="color: white;">Raise a Complaint</h1>
                        <?php if (isset($_SESSION['message'])) : ?>
                            <div class="msg">
                                <?php
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                                ?>
                            </div>
                        <?php endif ?>
                        <form autocomplete="off" class="requires-validation f3 lh-copy" novalidate action="../../controllers/complaint_controller.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="acc_code" value="<?php echo $acc_code; ?>">

                            <div class="col-md-12 pa2">
                                <label for="empcode">Employee Name</label>
                                <?php
                                $empdet = "select emp_code,concat(fname,' ',lname,' - ',emp_code) as name from employee";
                                $detresult = mysqli_query($conn, $empdet);
                                $detdata = array();
                                while ($detrow = mysqli_fetch_assoc($detresult)) {
                                    $detdata[] = $detrow['name'];
                                }
                                ?>
                                <?php if (isset($_SESSION['emp_id']) && !$update) { ?>
                                    <input class="form-control" id="empcode" value="<?php echo $_SESSION['emp_code']; ?>" type="text" name="emp_code" style="pointer-events: auto;">
                                <?php } else { ?>
                                    <!-- <input class="form-control" id="empcode" value="" type="text" name="emp_code" placeholder="Start typing" required autocomplete="off" list="options_list" onkeyup="GetDetail(this.value)"> -->
                                    <div class="autocomplete form-control">
                                        <input id="empcode" type="text" name="emp_code" placeholder="Employee name" required>
                                    </div>
                                    <datalist id="options_list">
                                        <?php foreach ($detdata as $option) : ?>
                                            <option value="<?= $option; ?>">
                                            <?php endforeach; ?>
                                    </datalist>
                                    <div class="valid-feedback">field is valid!</div>
                                    <div class="invalid-feedback">field cannot be blank!</div>
                                <?php } ?>
                            </div>

                            <!-- <div class="col-md-12 pa2">
                                <label for="accCode">Accomodation Code</label>
                                <input class="form-control" value="<?php //echo $acc_code; 
                                                                    ?>" type="text" id="acccode" name="acc_code" placeholder="eg.ACC1234" required>
                                <div class="valid-feedback">field is valid!</div>
                                <div class="invalid-feedback">field cannot be blank!</div>
                            </div> -->
                            <!--Accomodation code not getting fetched properly-->
                            <div class="col-md-12 pa2">
                                <label for="type">Accomodation name</label>
                                <select class="form-select mt-3" name="acc_id" id="acc" required>
                                    <option selected disabled value="">Select accomodation</option>
                                    <?php
                                    $comp_type = mysqli_query($conn, "SELECT * FROM accomodation");

                                    foreach ($comp_type as $row) { ?>
                                        <option value="<?php echo $row["acc_id"]; ?>">
                                            <?= $row["acc_name"]; ?>
                                        </option>
                                    <?php
                                    }

                                    ?>
                                </select>
                                <div class="invalid-feedback">Please select an option!</div>
                            </div>
                            <!-- <div class="col-md-12 pa2">
                            <label for="category">Category</label>
                                <select class="form-select mt-3" name="category" value="<?php //echo $category; 
                                                                                        ?>" required>
                                    <option selected disabled value="">Select a category of complaint</option>
                                    <option value="1">Electrical</option>
                                    <option value="2">Plumbing</option>
                                    <option value="3">Carpentary</option>
                                    <option value="Others">Others</option>
                                </select>
                                <div class="valid-feedback">You selected an option!</div>
                                <div class="invalid-feedback">Please select an option!</div>
                        </div> -->

                            <div class="col-md-12 pa2">
                                <label for="type">Complaint Type</label>
                                <select class="form-select mt-3" name="category" required>
                                    <option selected disabled value="">Select a category of complaint</option>
                                    <?php
                                    $comp_type = mysqli_query($conn, "SELECT * FROM complaint_type");

                                    foreach ($comp_type as $row) { ?>
                                        <option name="category" value="<?= $row["type_id"] ?>">
                                            <?= $row["complaint_type"]; ?>
                                        </option>
                                    <?php
                                    }

                                    ?>
                                </select>
                                <div class="invalid-feedback">Please select an option!</div>
                            </div>



                            <div class="col-md-12 pa2">
                                <label for="description">Complaint Description</label>
                                <textarea name="description" placeholder="Please describe your problem" cols="30" rows="10" value="<?php echo $description; ?>"></textarea>
                            </div>


                            <div class="form-button mt-3 tc">

                                <?php if ($update == true) : ?>
                                    <button id="submit" class="btn btn-warning f3 lh-copy" style="color: white;" type="submit" name="update" value="update" style="background: #556B2F;">update</button>
                                <?php else : ?>
                                    <button id="submit" class="btn btn-warning f3 lh-copy" style="color: white;" type="submit" name="submit" value="submit">Submit</button>
                                <?php endif ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="tc f3 lh-copy mt4">Copyright &copy; 2022 Delta@STAAR. All Rights Reserved</footer>

    <script>
        // function GetDetail(str) {
        //     var empcode = str.split(' - ')[1];
        //     $('#empcode').val(empcode);
        //     if (str.length == 0) {
        //         document.getElementById("acccode").value = "";
        //         return;
        //     }
        //     else {
        //         var xmlhttp = new XMLHttpRequest();
        //         xmlhttp.onreadystatechange = function () {
        //             if (this.readyState == 4 && this.status == 200) {
        //                 var myObj = JSON.parse(this.responseText);
        //                 document.getElementById("acccode").value = myObj[0];

        //             }
        //         };
        //         xmlhttp.open("GET", "../../controllers/validation.php?emp_code=" + empcode, true);
        //         xmlhttp.send();
        //     }
        // }

        function GetDetail(str) {
            if (str.length != 0) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var myObj = JSON.parse(this.responseText);
                        $("#acc option[value='14']").prop('selected', true);
                    }
                };
                xmlhttp.open("GET", "../../controllers/validation.php?emp_code=" + str, true);
                xmlhttp.send();
            }
        }
    </script>



    <!-- Initialize the autocomplete plugin -->
    <script>
        $(document).ready(function() {
            $('#empcode').autocomplete({
                minChars: 1,
                source: function(term, response) {
                    term = term.toLowerCase();
                    var suggestions = [];
                    <?php foreach ($detdata as $option) : ?>
                        if (~<?php echo json_encode(strtolower($option)); ?>.indexOf(term)) {
                            suggestions.push('<?php echo addslashes($option); ?>');
                        }
                    <?php endforeach; ?>
                    response(suggestions);
                }
            });
        });
    </script>
    <script>
        function autocomplete(inp, arr) {
            /*the autocomplete function takes two arguments,
            the text field element and an array of possible autocompleted values:*/
            var currentFocus;
            /*execute a function when someone writes in the text field:*/
            inp.addEventListener("input", function(e) {
                var a, b, i, val = this.value;
                /*close any already open lists of autocompleted values*/
                closeAllLists();
                if (!val) {
                    return false;
                }
                currentFocus = -1;
                /*create a DIV element that will contain the items (values):*/
                a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                /*append the DIV element as a child of the autocomplete container:*/
                this.parentNode.appendChild(a);
                /*for each item in the array...*/
                for (i = 0; i < arr.length; i++) {
                    /*check if the item starts with the same letters as the text field value:*/
                    if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                        /*create a DIV element for each matching element:*/
                        b = document.createElement("DIV");
                        /*make the matching letters bold:*/
                        b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                        b.innerHTML += arr[i].substr(val.length);
                        /*insert a input field that will hold the current array item's value:*/
                        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                        /*execute a function when someone clicks on the item value (DIV element):*/
                        b.addEventListener("click", function(e) {
                            /*insert the value for the autocomplete text field:*/
                            inp.value = this.getElementsByTagName("input")[0].value;
                            /*close the list of autocompleted values,
                            (or any other open lists of autocompleted values:*/
                            closeAllLists();
                        });
                        a.appendChild(b);
                    }
                }
            });
            /*execute a function presses a key on the keyboard:*/
            inp.addEventListener("keydown", function(e) {
                var x = document.getElementById(this.id + "autocomplete-list");
                if (x) x = x.getElementsByTagName("div");
                if (e.keyCode == 40) {
                    /*If the arrow DOWN key is pressed,
                    increase the currentFocus variable:*/
                    currentFocus++;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 38) { //up
                    /*If the arrow UP key is pressed,
                    decrease the currentFocus variable:*/
                    currentFocus--;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 13) {
                    /*If the ENTER key is pressed, prevent the form from being submitted,*/
                    e.preventDefault();
                    if (currentFocus > -1) {
                        /*and simulate a click on the "active" item:*/
                        if (x) x[currentFocus].click();
                    }
                }
            });

            function addActive(x) {
                /*a function to classify an item as "active":*/
                if (!x) return false;
                /*start by removing the "active" class on all items:*/
                removeActive(x);
                if (currentFocus >= x.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = (x.length - 1);
                /*add class "autocomplete-active":*/
                x[currentFocus].classList.add("autocomplete-active");
            }

            function removeActive(x) {
                /*a function to remove the "active" class from all autocomplete items:*/
                for (var i = 0; i < x.length; i++) {
                    x[i].classList.remove("autocomplete-active");
                }
            }

            function closeAllLists(elmnt) {
                /*close all autocomplete lists in the document,
                except the one passed as an argument:*/
                var x = document.getElementsByClassName("autocomplete-items");
                for (var i = 0; i < x.length; i++) {
                    if (elmnt != x[i] && elmnt != inp) {
                        x[i].parentNode.removeChild(x[i]);
                    }
                }
            }
            /*execute a function when someone clicks in the document:*/
            document.addEventListener("click", function(e) {
                closeAllLists(e.target);
            });
        }

        /*initiate the autocomplete function on the "empcode" element, and pass along the employees array as possible autocomplete values:*/
        autocomplete(document.getElementById("empcode"), employees);
    </script>

    <script>
        function fetchList(){
            var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var myObj = JSON.parse(this.responseText);
                        var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];
                        console.log(myObj);
                        var employees = myObj;
                        return employees;
                    }
                };
                xmlhttp.open("GET", "../../controllers/validation.php?y=1", true);
                xmlhttp.send();
        }
    </script>
    <script src="../../js/form.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>