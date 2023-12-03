<?php

require_once '../config.php';
require_once '../component.php';

if (is_session_started() === FALSE) session_start();

$email = $_SESSION['email'];

$profileDir = '../assets/images/UserImage/';
$newImgName = $_SESSION['fname'] . '_' . time() . '_' . $_FILES['profile-image-upload']['name'];
$saveToImg = $profileDir . $newImgName;
$imageFileType = strtolower(pathinfo($saveToImg, PATHINFO_EXTENSION));

if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg") {
    if (move_uploaded_file($_FILES['profile-image-upload']['tmp_name'], $saveToImg)) {
        $sql = "UPDATE `users` SET `profile_img`='$newImgName' WHERE `email`='$email'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            if ($_SESSION['profile-img'] != 'default.png') {
                unlink($profileDir . $_SESSION['profile-img']);
            }

            $_SESSION['profile-img'] = $newImgName;

            echo "
                <script>
                    alert('Your Profile Pic has been Updated!');
                    window.location.href = '../my-account.php#my-profile';
                </script>
            ";
        }
    }
}

// echo "<pre>";
// print_r($_FILES);
// echo "</pre";
