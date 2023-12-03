<?php

require_once '../config.php';
require_once '../component.php';

if (is_session_started() === FALSE) session_start();

$email = $_SESSION['email'];
$address = array();

if (isset($_POST['update-addr'])) {
    $address1 = $_POST['addr1'];
    $address2 = $_POST['addr2'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];

    $sql = "UPDATE `users` SET `address1`='$address1',`address2`='$address2',`city`='$city',`pincode`='$pincode' WHERE `email`='$email'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $address['addr1'] = $address1;
        $address['addr2'] = $address2;
        $address['city'] = $city;
        $address['pincode'] = $pincode;

        $_SESSION['address'] = $address;
        echo "
            <script>
                alert('Your Address has been Updated!'); 
                window.location.href ='../my-account.php#my-profile';
            </script>
            ";
    } else {
        echo "<script>alert('Woops! Something went Wrong!')</script>";
    }
}
