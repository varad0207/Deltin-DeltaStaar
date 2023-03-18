<?php require "../../controllers/includes/common.php";

if(isset($_REQUEST['employeecode'])){

    $employeecode = $_REQUEST['employeecode'];
    if ($employeecode != "") {
        $row12 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM employee JOIN employee_outing using(emp_code) where employee.emp_code='$employeecode'"));
        if(empty($row12)){
            die();
        }
    }
}

 ?>
<style>
    #outing-freq {
      position: fixed;
      width: 100%;
      display: none;
      transition: display 1s ease-in-out;
      margin-right: 70vw;
      margin-left: 0;
      margin-bottom: 70vh;
      justify-content: center;
    }
    .titlebar{
    height: 5px;
    background: transparent;
    display: flex;
    align-items: center;
    justify-content: right;
    }
    .close {
    width: 20px;
    height: 20px;
    outline: none;
    border: none;
    background: red;
    color: #eeeeee;
    cursor: pointer;
    border-radius: 50%;
    align-items: center;
    display: flex;
    justify-content: center;
}

.close:active {
    transform: scale(0.9);
}
    @media only screen and (max-width: 1130px) {
      #outing-freq {
        margin-right: 75vw;
      }
    }

    @media only screen and (max-width: 1066px) {
      #outing-freq {
        position: relative;
        margin: 5px auto auto auto;
      }
    }
  </style>
<!-- Frequency div -->
<div class="table-div" style="max-width:262px">
    <div class="titlebar">
        <button id="close" class="close material-icons" onclick="document.querySelectorAll('.table-div').forEach(a=>a.style.display = 'none');">close</button>
    </div>
    <div class="pa1 table-responsive">
        <table class="table table-bordered tc">
            <thead>
            <tr>
                <th scope="col">Employee Name</th>

                <th scope="col">Frequency</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?php echo $row12['fname']; ?></td>
                <td>5</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>