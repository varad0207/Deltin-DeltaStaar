<?php include('../../controllers/includes/common.php'); ?>
<?php include('../../controllers/security_controller.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Delta@STAAR | Security</title>
    <meta name="description" content="Employee Addition portal for deltin employees">
    <link rel="stylesheet" href="../../css/forms.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.12.0/css/tachyons.min.css" />
</head>

<body>
    <div class="container">
        <h1 class="tc f1 lh-title">All Security Employees</h1>
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
                            <th>Emp-Id </th>
                            <th>Acc-Id</th>
                            

                            <th colspan="2">Action</th>
                        </tr>
                    </thead>

                    <?php while ($row = mysqli_fetch_array($results)) { ?>
                    <tr>
                        <td>
                            <?php echo $row['emp_id']; ?>
                        </td>
                        <td>
                            <?php echo $row['acc_id']; ?>
                        </td>
                        
                        <td>
                            <a href="../views/security.php?edit=<?php echo '%27' ?><?php echo $row['emp_id']; ?><?php echo '%27' ?>"
                                class="edit_btn">Edit</a>
                        </td>
                        <td>
                            <a href="../../controllers/security_controller.php?del=<?php echo '%27' ?><?php echo $row['emp_id']; ?><?php echo '%27' ?>"
                                class="del_btn">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

</body>

</html>