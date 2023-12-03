<?php

require_once '../config.php';
require_once '../component.php';

if (is_session_started() === FALSE) session_start();

// echo "<pre>";
// print_r($_GET['orderId']);
// print_r($_POST['status']);
// echo "</pre>";

if (isset($_GET['orderId']) && isset($_POST['status'])) {
    $order_id = $_GET['orderId'];
    $new_status = $_POST['status'];
    $new_status = $new_status == 'placed' ? 'Placed' : ($new_status == 'on-the-way' ? 'On the Way' : ($new_status == 'delivered' ? 'Delivered' : 'Cancelled'));
    $sql = "UPDATE `orders` SET `order_status`='$new_status' WHERE `order_id`='$order_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "
                <script>
                    alert('Order #" . $order_id . " Status is updated to " . $new_status . "');
                    window.history.go(-1);
                </script>
        ";
    }
}
