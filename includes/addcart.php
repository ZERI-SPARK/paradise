<?php

require_once '../component.php';

if (is_session_started() === FALSE) session_start();

if (isset($_SESSION['email'])) {
    if (isset($_GET['id'])) {
        $qnty = 0;

        if (isset($_GET['qnty'])) {
            $qnty = $_GET['qnty'];
        } else {
            $qnty = 1;
        }

        $id = $_GET['id'];

        if (!isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] = array('qnty' => $qnty);
        } else {
            $_SESSION['cart'][$id]['qnty'] += $qnty;
        }

        // echo "<pre>";
        // print_r($_SESSION['cart']);
        // echo "</pre>";

        echo "<script>window.history.go(-1);</script>";
    }
} else {
    echo "  <script>
                alert('Please Login to Order Online!');
                window.location.href = '../login.php';
            </script>";
}
