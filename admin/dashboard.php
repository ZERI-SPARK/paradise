<?php

require_once '../config.php';
require_once '../component.php';

session_start();

if (isset($_SESSION['admin_id'])) {
    $result = mysqli_query($conn, "SELECT COUNT(*) as total_orders FROM `orders`;");
    $total_orders = mysqli_fetch_assoc($result)['total_orders'];

    $result = mysqli_query($conn, "SELECT COUNT(*) as pending_orders FROM `orders` WHERE `order_status`='Placed';");
    $pending_orders = mysqli_fetch_assoc($result)['pending_orders'];

    $result = mysqli_query($conn, "SELECT SUM(`paid_amount`) as total_earning FROM `orders`");
    $total_earning = mysqli_fetch_assoc($result)['total_earning'];

    $result = mysqli_query($conn, "SELECT COUNT(*) as total_users FROM `users`;");
    $total_users = mysqli_fetch_assoc($result)['total_users'];
} 
else {
    echo "<script>
                window.location.href = '../admin/login.php';
            </script>";
}

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
    <title>Paradise | Admin Dashboard</title>
</head>

<body>
    <?php require_once 'sidebar.php'; ?>
    <section class="home-section">
        <?php
        $nav_icon = '<i class="fas fa-th-large"></i>';
        $nav_title = 'Dashboard';
        require_once 'navbar.php'
        ?>
        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Orders</div>
                        <div class="number"><?php echo $total_orders ?? "0"; ?></div>
                    </div>
                    <i class="fas fa-shopping-cart cart"></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Pending Orders</div>
                        <div class="number"><?php echo $pending_orders ?? "0"; ?></div>
                    </div>
                    <i class="fas fa-cart-arrow-down cart two"></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Earning</div>
                        <div class="number">&#8377;<?php echo getRepString($total_earning) ?? "0"; ?></div>
                    </div>
                    <i class="fas fa-rupee-sign cart three"></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Customers</div>
                        <div class="number"><?php echo $total_users ?? "0"; ?></div>
                    </div>
                    <i class="fas fa-user cart four"></i>
                </div>
            </div>

            <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">Recent Orders</div>
                    <div class="sales-details">
                        <ul>
                            <li class="topic">
                                <div class="order-id">Order Id</div>
                                <div class="order-date">Date</div>
                                <div class="order-name">Name</div>
                                <div class="order-status">Status</div>
                                <div class="order-amount">Total</div>
                            </li>
                            <?php
                            $sql = "SELECT * FROM `orders` ORDER BY `ordered_at` DESC LIMIT 6;";
                            $result = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $status_class_name = $row['order_status'] == "Delivered" ? 'delivered' : ($row['order_status'] == "Placed" ? 'placed' : ($row['order_status'] == "Cancelled" ? 'cancelled' : 'on-the-way'));
                                order_list_item($row['order_id'], $row['ordered_at'], $row['fname'] . " " . $row['lname'], $row['order_status'], $status_class_name, $row['paid_amount']);
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