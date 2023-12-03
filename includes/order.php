<?php

require_once '../config.php';
require_once '../component.php';

if (is_session_started() === FALSE) session_start();


if (isset($_POST['order'])) {
    $order_id = mt_rand();
    $user_email = $_SESSION['email'];
    $order_email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phno'];
    $order_address = array('addr1' => $_POST['addr1'], 'addr2' => $_POST['addr2'], 'city' => $_POST['city'], 'pincode' => $_POST['pincode']);
    $pymnt_mode = $_POST['pymnt-mode'];
    $cc_details = $pymnt_mode == 'cc' ? array('ccname' => $_POST['ccname'], 'ccnum' => $_POST['ccnum'], 'expno' => $_POST['expno']) : '';
    $food_orders = $_SESSION['cart'];
    $paid_amount = $_SESSION['cart_total'];

    $sql = "INSERT INTO `orders`(`order_id`, `user_email`, `order_email`, `fname`, `lname`, `phone`, `order_address`, `payment_mode`, `cc_details`, `food_orders`, `paid_amount`, `order_status`) VALUES ('$order_id','$user_email','$order_email','$fname','$lname','$phone','" . json_encode($order_address) . "','$pymnt_mode','" . json_encode($cc_details) . "','" . json_encode($food_orders) . "','$paid_amount', 'Placed')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        unset($_SESSION['cart']);
        $_SESSION['cart-total'] = 0;
        $_SESSION['order-id'] = $order_id;
        echo "<script>window.location.href = '../success.php';</script>";
        // echo "<script>alert('Done Order Placed with Reference Id #" . $order_id . "');
        // window.location.href ='../index.php';</script>";
    }

    // echo "<pre>";
    // print_r(json_encode($cc_details));
    // echo "</pre>";
}
