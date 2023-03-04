<?php require "../../controllers/includes/common.php";
 ?>

    <!-- overlay code start -->
    <div class="overlay" id="overlay"> 
        <div class="overlay-window">
            <div class="overlay-window-titlebar">
                <span class="overlay-title">Confirm <span class="name">Delete</span></span>
                <button class="close material-icons" onclick="document.getElementById('overlay').style.display='none'">close</button>
            </div>
            <div class="overlay-content" style="color:black;text-align:center">
                This action cannot be un-done<br><br>
                    <div class="btns">
                            <Button class="btn btn-warning btn1"  onclick="document.getElementById('del_response').submit();document.getElementById('overlay').style.display='none'">Yes,Delete</Button>
                            <Button class="btn btn-secondary btn2" onclick="document.getElementById('overlay').style.display='none'">No,Cancel</Button>
                    </div>
            </div>
        </div>
    </div>
    <!-- overlay end -->

    <!-- action="../../controllers/employee_controller.php?del= + <?php //echo $row['emp_code']; ?>" -->

