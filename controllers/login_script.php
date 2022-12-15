<?php
require 'include/common.php';
if (isset($_POST["submit"])) {
    if (!empty($_POST['user']) && !empty($_POST['pass'])) {
        $user = $_POST['user'];
        $safe_pass = md5($_POST['pass']);

        if ($query = mysqli_query($conn, "SELECT * FROM login_credentials WHERE emp_id='" . $user . "'")) {
            $numrows = mysqli_num_rows($query);
        }

        if ($numrows != 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $dbusername = $row['emp_id'];
                $dbpassword = $row['pass'];
            }

            if ($user == $dbusername && $safe_pass == $dbpassword) {
                session_start();
                $_SESSION['emp_id'] = $user;

                /* Redirect browser */
                header("Location: index.html");
            }
        } else {
            echo "Invalid username or password!";
        }

    } else {
        echo "All fields are required!";
    }
}
?>