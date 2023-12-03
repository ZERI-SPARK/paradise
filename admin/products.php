<?php

require_once '../config.php';
require_once '../component.php';

if (is_session_started() === FALSE) session_start();

$sql = "SELECT COUNT(*) as products FROM `producttb` WHERE `cat_id` IN (1, 2, 3, 4) GROUP BY cat_id;";
$result = mysqli_query($conn, $sql);
$product_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

// echo "<pre>";
// print_r($product_data);
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
    <title>Paradise | Products</title>
</head>

<body>
    <?php require_once 'sidebar.php'; ?>
    <section class="home-section">
        <?php
        $nav_icon = '<i class="fas fa-hamburger"></i>';
        $nav_title = 'Products';
        require_once 'navbar.php';
        ?>
        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Lunch</div>
                        <div class="number"><?php echo $product_data[0]['products'] ?? "0"; ?></div>
                    </div>
                    <i class="fas fa-seedling fa-lg cart"></i>
                </div>

                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Dinner</div>
                        <div class="number"><?php echo $product_data[1]['products'] ?? "0"; ?></div>
                    </div>
                    <i class="fas fa-drumstick-bite fa-lg cart two"></i>
                </div>

                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Snacks</div>
                        <div class="number"><?php echo $product_data[2]['products'] ?? "0"; ?></div>
                    </div>
                    <i class="fas fa-pizza-slice fa-lg cart three"></i>
                </div>

                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Drinks</div>
                        <div class="number"><?php echo $product_data[3]['products'] ?? "0"; ?></div>
                    </div>
                    <i class="fas fa-cocktail fa-lg cart four"></i>
                </div>
            </div>

            <!-- <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">Products</div>
                    <div class="sales-details">
                        <ul>

                        </ul>
                    </div>
                    <div class="update">
                        <a href="#">See All</a>
                    </div>
                </div>
            </div> -->
        </div>
    </section>

</body>

</html>