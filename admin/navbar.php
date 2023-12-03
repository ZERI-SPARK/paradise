<?php

require_once '../component.php';

if (is_session_started() === FALSE) session_start();

?>

<nav>
    <div class="sidebar-button">
        <?php echo $nav_icon; ?>
        <span class="dashboard"><?php echo $nav_title; ?></span>
    </div>
    <div class="profile-details">
        <img src="../assets/images/Admin/<?php echo $_SESSION['admin_profile-img'] ?>" alt="">
        <span class="admin_name"><?php echo $_SESSION['admin_fname'] . " " . $_SESSION['admin_lname'] ?></span>
    </div>
</nav>