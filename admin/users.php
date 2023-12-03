<?php

require_once '../config.php';
require_once '../component.php';

if (is_session_started() === FALSE) session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/dashboard.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/images/ParadiseLogo(Title).png" type="image/x-icon">
    <title>Paradise | Users</title>
</head>

<body>
    <?php require_once 'sidebar.php'; ?>
    <section class="home-section">
        <?php
        $nav_icon = '<i class="fas fa-address-book"></i>';
        $nav_title = 'Users';
        require_once 'navbar.php';
        ?>
        <div class="home-content">
            <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">Users</div>
                    <div class="sales-details">
                        <ul>
                            <li class="topic">
                                <div class="order-id">UID</div>
                                <div class="order-date">Name</div>
                                <div class="order-name">Email</div>
                                <div class="order-status">Created At</div>
                                <div class="order-amount">Total Orders</div>
                            </li>
                            <?php
                            $sql = "SELECT * FROM `users` ORDER BY `uid` ASC;";
                            $result = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $sql_order = "SELECT COUNT(*) as `user_order` FROM `orders` WHERE `user_email`='" . $row['email'] . "';";
                                $orders_exist = mysqli_query($conn, $sql_order);
                                if ($orders_exist) {
                                    $orders = mysqli_fetch_assoc($orders_exist)['user_order'];
                                } else {
                                    $orders = 0;
                                }
                                users_list_item($row['uid'], $row['fname'] . " " . $row['lname'], $row['email'], $row['created_at'], $orders);
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>