<?php

require_once 'config.php';
require_once 'component.php';

if (is_session_started() === FALSE) session_start();

?>

<link rel="stylesheet" href="assets/css/index.css">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin|Rye|Poppins|Montserrat|Monoton&display=swap">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


<style>
    .container {
        position: relative;
    }

    .user {
        display: flex;
        flex-direction: row;
    }

    .user-profile-dropdown .profile {
        position: relative;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        overflow: hidden;
        cursor: pointer;
    }

    .user-profile-dropdown .profile img {
        position: absolute;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .user-profile-dropdown .profile-menu {
        top: 120px;
        right: 15px;
        position: absolute;
        padding: 10px;
        background: #212121;
        width: 150px;
        box-sizing: border-box;
        border-radius: 15px;
        transition: 0.5s;
        visibility: hidden;
        opacity: 0;
    }

    .user-profile-dropdown .profile-menu.active {
        top: 68px;
        visibility: visible;
        opacity: 1;
    }

    .user-profile-dropdown .profile-menu::before {
        content: '';
        position: absolute;
        left: 113px;
        top: -6px;
        height: 20px;
        background-color: #212121;
        width: 10px;
        transform: rotate(45deg);
    }

    .user-profile-dropdown .profile-menu h3 {
        width: 100%;
        text-align: center;
        font-size: 18px;
        padding: 15px 0;
        font-weight: 500;
        color: #fff;
        line-height: 1.2em;
    }

    .user-profile-dropdown .profile-menu ul li {
        padding: 10px 0;
        border-top: 1px solid #333;
        display: flex;
        align-items: center;
        transition: all 0.2s ease-in-out;
    }

    .user-profile-dropdown .profile-menu ul li i {
        opacity: 0.5;
        transition: 0.5s;
        font-size: 16px;
        margin-right: 10px;
        color: #c59d5f;
        transition: all 0.2s ease-in-out;
    }

    .user-profile-dropdown .profile-menu ul li:hover i {
        opacity: 1;
    }

    .user-profile-dropdown .profile-menu ul li a {
        display: inline-block;
        text-decoration: none;
        color: #ffffff;
        font-size: 14px;
        transition: all 0.2s ease-in-out;
    }

    .user-profile-dropdown .profile-menu ul li:hover a {
        color: #c59d5f;
    }

    .user .user-cart {
        position: relative;
        margin-right: 30px;
        margin-top: 5px;
    }

    .user-cart i {
        font-size: 2.8rem;
        color: #fff;
    }

    .user-cart .cart-amount {
        position: relative;
        left: 30px;
        top: -35px;
        width: 17px;
        height: 17px;
        border-radius: 50%;
        overflow: hidden;
        cursor: pointer;
        background-color: #c59d5f;
        text-align: center;
        color: #111;
        font-weight: 900;
        line-height: 17px;
        font-size: 12px;
    }

    .cart-empty p {
        text-align: center;
        margin: 30px;
    }
</style>


<div class="container">
    <nav class="nav">
        <div class="menu-toggle">
            <i class="fas fa-bars"></i>
            <i class="fas fa-times"></i>
        </div>
        <a href="index.php" class="logo"><img src="./assets/images/ParadiseLogo.png" alt="Paradise" height="70"></a>
        <ul class="nav-list">
            <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="menu.php" class="nav-link">Menu</a></li>
            <!-- <li class="nav-item"><a href="#" class="nav-link">Booking</a></li> -->
            <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
            <li class="nav-item"><a href="contact-us.php" class="nav-link">Contact</a></li>
        </ul>

        <?php if (isset($_SESSION['email'])) { ?>
            <div class="user">
                <div class="user-cart">
                    <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                    <?php
                    if (isset($_SESSION['cart'])) {
                        $count = count($_SESSION['cart']);
                        echo "<div class=\"cart-amount\" id=\"cart-qnty\">$count</div>";
                    } else {
                        echo "<div class=\"cart-amount\" id=\"cart-qnty\">0</div>";
                    }
                    ?>
                </div>
                <div class="user-profile-dropdown">
                    <div class="profile" onclick="menuToggle();">
                        <img src="assets/images/UserImage/<?php echo $_SESSION['profile-img'] ?? "default.png" ?>" alt="UserPic">
                    </div>
                    <div class="profile-menu">
                        <h3><?php echo $_SESSION['fname'] . " " . $_SESSION['lname'] ?></h3>
                        <ul>
                            <li><a href="my-account.php#my-profile"><i class="fas fa-user"></i>My Profile</a></li>
                            <li><a href="my-account.php#my-orders"><i class="fas fa-hamburger"></i>My Orders</a></li>
                            <li><a href="my-account.php#privacy"><i class="fas fa-key"></i>Privacy</a></li>
                            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        <?php } else { ?>
            <a href="login.php" class="btn cta-btn">Login</a>
        <?php } ?>
    </nav>
</div>

<script>
    function menuToggle() {
        const toggleMenu = document.querySelector('.profile-menu');
        toggleMenu.classList.toggle('active')
    }
</script>