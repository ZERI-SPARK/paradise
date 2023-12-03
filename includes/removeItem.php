<?php

require_once '../component.php';

if (is_session_started() === FALSE) session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    unset($_SESSION['cart'][$id]);

    echo "<script>window.history.go(-1);</script>";
}
