<?php

require_once '../config.php';
require_once '../component.php';

if (is_session_started() === FALSE) session_start();

if (isset($_SESSION['email'])) {
    if (isset($_GET['id'])) {
        $order_id = $_GET['id'];
        $sql = "UPDATE `orders` SET `order_status`='Cancelled' WHERE `order_id`='$order_id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "
                    <script>
                        alert('Your Order #" . $order_id . " has been Cancelled.');
                        window.history.go(-1);
                    </script>
            ";
        }
        echo "
                <script>
                    alert('Something went Wrong!');
                </script>
            ";
    }
}
