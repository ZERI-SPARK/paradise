<?php

require_once '../config.php';
require_once '../component.php';

if (is_session_started() === FALSE) session_start();

$email = $_SESSION['email'];

if (isset($_POST['change'])) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $c_new_password = $_POST['c_new_password'];

    if ($new_password == $c_new_password) {
        $sql = "SELECT `password` FROM `users` WHERE `email`='$email'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if (password_verify($old_password, $row['password'])) {
            $new_hash_password = password_hash($new_password, PASSWORD_BCRYPT);
            $sql = "UPDATE `users` SET `password`='$new_hash_password' WHERE `email`='$email'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "
                    <script>
                        alert('Your Password has been Changed!'); 
                        window.location.href ='../my-account.php#my-profile';
                    </script>
                    ";
            } else {
                echo "<script>alert('Woops! Something went Wrong!')</script>";
            }
        } else {
            echo "
            <script>
                alert('Old Password is Wrong!'); 
                window.location.href ='../my-account.php#privacy';
            </script>
            ";
        }
    } else {
        echo "
            <script>
                alert('Password not Matched!'); 
                window.location.href ='../my-account.php#privacy';
            </script>
            ";
    }
}
