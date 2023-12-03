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
    <title>Paradise | Queries</title>
</head>

<body>
    <?php require_once 'sidebar.php'; ?>
    <section class="home-section">
        <?php
        $nav_icon = '<i class="fas fa-comment-alt"></i>';
        $nav_title = 'Queries';
        require_once 'navbar.php';
        ?>
        <div class="home-content">
            <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">All Queries</div>
                    <div class="sales-details">
                        <ul>
                            <?php
                            $sql = "SELECT * FROM `queries` ORDER BY `timestamp` DESC;";
                            $result = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                query_card($row['query_id'], $row['full_name'], $row['email'], $row['timestamp'], $row['message']);
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- <div class="button">
                        <a href="#">See All</a>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

</body>

</html>