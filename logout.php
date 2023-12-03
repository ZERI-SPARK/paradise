<?php

session_start();
session_destroy();

// if (isset($_SERVER['HTTP_REFERER'])) {
//     header('Location: ' . $_SERVER['HTTP_REFERER']);
// } else {
if ($_SESSION['Is_Admin']) {
    header('Location: admin/login.php');
} else {
    header('Location: index.php');
}
// }
exit;
