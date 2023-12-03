<?php

require_once '../config.php';
require_once '../component.php';

if (is_session_started() === FALSE) session_start();

$sql = "SELECT COUNT(*) as orders FROM `orders` WHERE `order_status` IN ('Placed', 'Delivered', 'On the Way', 'Cancelled') GROUP BY `order_status`;";
$result = mysqli_query($conn, $sql);
$orders_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

// echo "<pre>";
// print_r($orders_data);
// echo "</pre>";

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
    <title>Paradise | Orders</title>
</head>

<body>
    <?php require_once 'sidebar.php'; ?>
    <section class="home-section">
        <?php
        $nav_icon = '<i class="fas fa-list"></i>';
        $nav_title = 'Orders';
        require_once 'navbar.php';
        ?>
        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Placed</div>
                        <div class="number"><?php echo $orders_data[3]['orders'] ?? "0"; ?></div>
                    </div>
                    <i class="fas fa-truck-loading cart"></i>
                </div>

                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Delivered</div>
                        <div class="number"><?php echo $orders_data[1]['orders'] ?? "0"; ?></div>
                    </div>
                    <i class="fas fa-receipt cart two"></i>
                </div>

                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">On the Way</div>
                        <div class="number"><?php echo $orders_data[2]['orders'] ?? "0"; ?></div>
                    </div>
                    <i class="fas fa-shipping-fast cart three"></i>
                </div>

                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Cancelled</div>
                        <div class="number"><?php echo $orders_data[0]['orders'] ?? "0"; ?></div>
                    </div>
                    <i class="fas fa-ban cart four"></i>
                </div>
            </div>

            <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">Orders</div>
                    <div class="sales-details">
                        <ul>
                            <?php
                            $sql = "SELECT * FROM `orders` ORDER BY `ordered_at` DESC;";
                            $result = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $status_class_name = $row['order_status'] == "Delivered" ? 'delivered' : ($row['order_status'] == "Placed" ? 'placed' : ($row['order_status'] == "Cancelled" ? 'cancelled' : 'on-the-way'));
                                admin_order_card($row['order_id'], $row['ordered_at'], $row['fname'] . " " . $row['lname'], $row['paid_amount'], $status_class_name);
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const orderStat = document.querySelectorAll('select.order-status');
        orderStat.forEach(orderStatus => {
            orderStatus.onchange = function() {
                class_active = this.options[this.selectedIndex].classList[1];
                this.classList.remove(this.classList[1]);
                this.classList.add(class_active);
            }
        })
    </script>

</body>

</html>