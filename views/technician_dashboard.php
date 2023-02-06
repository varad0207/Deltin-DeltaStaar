<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link href="../css/sidebar.css" rel="stylesheet">
    <script src="../js/Sidebar/sidebar.js"></script>

    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="../css/technician.css">
    <!-- Tachyons -->
    <link rel="stylesheet" href="https://unpkg.com/tachyons@4.12.0/css/tachyons.min.css" />

    <!--Favicon link-->
    <link rel="icon" type="image/x-icon" href="../../images/logo-no-name-circle.png">

    <title>Technician Dashboard</title>

</head>

<body class="bgcolor">
    <!-- Sidebar-->
    <?php
    include '../controllers/includes/sidebar.html';
    ?>


    <!--Start of Main content-->

    <div id="main">

        <!-- Navigation Bar -->
        <?php
        include '../controllers/includes/navbar.html';
        ?>


        <div class="container">
            <div class="left-side">
                <div class="welcome-message">Welcome back, <span style="color:#ceaa6d">Technician</span></div>
                <div class="parent-con">
                    <div class="user-icon">

                        <img src="../images/technician.png" alt="technician_logo">
                    </div>
                    <div class="complaint-statistics">

                        <div class="statistics-item">Solved Complaints: 100</div>
                        <div class="statistics-item">Pending Complaints: 10</div>
                        <div class="statistics-item">Assigned to you: 5</div>
                    </div>
                </div>

                <div class="button-con">
                    <button class="button-56" role="button">View Jobs</button>
                </div>

            </div>
            <div class="right-side">



                <canvas id="myDoughnutChart" class="pt-8" style="margin-top: 12%;"></canvas>
                <h4 class="text-center p-2 pt-4 ">Complaints Information</h4>


            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script> //Doughnut Chart

            //Setup Block
            const dataDoughnut = {
                labels: [
                    'Completed',
                    'Assigned',
                    'Pending'
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [300, 50, 100],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(38,166,254)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            };

            //Config Block
            const configDoughnut = {
                type: 'doughnut',
                data: dataDoughnut,
                options: {
                    aspectRatio: 1.2,

                }

            };

            //Render Block
            const myDoughnutChart = new Chart(
                document.getElementById('myDoughnutChart'), configDoughnut
            );
        </script>

        <!-- Footer -->
        <footer class="tc f3 lh-copy mt6">Copyright &copy; 2022 Delta@STAAR. All Rights Reserved</footer>


    </div>

    <!--End of Main content-->



    <!--Scripts for Navbar (as in dashboard.php)-->
    <script src="https://kit.fontawesome.com/319379cac6.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <!--Scripts required for Bootstrap and Sidebar-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
</body>

</html>