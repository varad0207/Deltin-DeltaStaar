<?php include('../../controllers/includes/common.php'); ?>
<?php include('../../controllers/employee_controller.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Delta@STAAR | Employees</title>
    <meta name="description" content="Employee Addition portal for deltin employees">
    <link rel="stylesheet" href="../../css/forms.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.12.0/css/tachyons.min.css" />
</head>

<body>
    <div class="container">
        <h1 class="tc f1 lh-title">All Employee</h1>
        <div class="row mx-0 justify-content-center">
            <div class="col-md-7 col-lg-5 px-lg-2 col-xl-4 px-xl-0 bg f4 lh-copy">
                <?php if (isset($_SESSION['message'])): ?>
                <div class="msg">
                    <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                </div>
                <?php endif ?>

                <?php $results = mysqli_query($conn, "SELECT * FROM employee"); ?>

                <table>
                    <thead>
                        <tr>
                            <th>emp_code </th>
                            <th>fname </th>
                            <th>mname </th>
                            <th>lname </th>
                            <th>designation </th>
                            <th>dob </th>
                            <th>address </th>
                            <th>state </th>
                            <th>country </th>
                            <th>pincode </th>
                            <th>email </th>
                            <th>blood_group </th>
                            <th>department </th>
                            <th>joining_date </th>
                            <th>aadhaar_number </th>
                            <th>salary </th>
                            <th>acc_id </th>

                            <th colspan="2">Action</th>
                        </tr>
                    </thead>

                    <?php while ($row = mysqli_fetch_array($results)) { ?>
                    <tr>
                        <td>
                            <?php echo $row['emp_code']; ?>
                        </td>
                        <td>
                            <?php echo $row['fname']; ?>
                        </td>
                        <td>
                            <?php echo $row['mname']; ?>
                        </td>
                        <td>
                            <?php echo $row['lname']; ?>
                        </td>
                        <td>
                            <?php echo $row['designation']; ?>
                        </td>
                        <td>
                            <?php echo date('d-m-Y', strtotime($row['dob'])); ?>
                        </td>
                        <td>
                            <?php echo $row['address']; ?>
                        </td>
                        <td>
                            <?php echo $row['state']; ?>
                        </td>
                        <td>
                            <?php echo $row['country']; ?>
                        </td>
                        <td>
                            <?php echo $row['pincode']; ?>
                        </td>
                        <td>
                            <?php echo $row['email']; ?>
                        </td>
                        <td>
                            <?php echo $row['blood_group']; ?>
                        </td>
                        <td>
                            <?php echo $row['department']; ?>
                        </td>
                        <td>
                            <?php echo date('d-m-Y', strtotime($row['joining_date'])); ?>
                        </td>
                        <td>
                            <?php echo $row['aadhaar_number']; ?>
                        </td>
                        <td>
                            <?php echo $row['salary']; ?>
                        </td>
                        <td>
                            <?php echo $row['acc_id']; ?>
                        </td>

                        <td>
                            <a href="hrm/employee.php?edit=<?php echo '%27' ?><?php echo $row['emp_code']; ?><?php echo '%27' ?>"
                                class="edit_btn">Edit</a>
                        </td>
                        <td>
                            <a href="../../controllers/employee_controller.php?del=<?php echo '%27' ?><?php echo $row['emp_code']; ?><?php echo '%27' ?>"
                                class="del_btn">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

</body>

</html>