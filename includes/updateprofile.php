<?php

require_once '../config.php';
require_once '../component.php';

if (is_session_started() === FALSE) session_start();

$old_email = $_SESSION['email'];

if (isset($_POST['update-profile'])) {
    $new_fname = $_POST['fname'];
    $new_lname = $_POST['lname'];
    $new_email = $_POST['email'];
    $new_phno = $_POST['phno'];

    $sql = "UPDATE `users` SET `fname`='$new_fname',`lname`='$new_lname',`email`='$new_email',`phone_number`='$new_phno' WHERE `email`='$old_email'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['fname'] = $new_fname;
        $_SESSION['lname'] = $new_lname;
        $_SESSION['email'] = $new_email;
        $_SESSION['phno'] = $new_phno;
        echo "
            <script>
                alert('Your Information has been Updated!'); 
                window.location.href ='../my-account.php#my-profile';
            </script>
            ";
    } else {
        echo "<script>alert('Woops! Something went Wrong!')</script>";
    }
}
