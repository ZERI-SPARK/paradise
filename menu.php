<?php

require_once 'component.php';

if (is_session_started() === FALSE) session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Title Logo -->
    <link rel="shortcut icon" href="./assets/images/ParadiseLogo(Title).png" type="image/x-icon">
    <title>Paradise | Menu</title>
</head>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Montserrat&display=swap");

    .menu {
        min-height: 100vh;
        width: 100%;
        background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),
            url("./assets/images/MenuPage.jpg") no-repeat center fixed;
        background-size: cover;
    }

    .menu .wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    .MenuHeading .h2-heading {
        font-size: 7.4rem;
        font-weight: 100;
        font-family: "Monoton", cursive;
        color: #c59d5f;

        line-height: 0.6;
        letter-spacing: 1px;

        margin: 0;
        padding-bottom: 14px;

        opacity: 0;
        animation: fadeUp 0.5s forwards;
        animation-delay: 0.5s;
    }

    .MenuHeading .h2-heading .first-letter {
        font-size: 8.4rem;
        text-transform: uppercase;
    }

    .MenuHeading .h1-heading {
        font-size: 5.4rem;
        font-weight: 550;
        font-family: "Monoton", cursive;
        color: white;

        letter-spacing: 1px;
        line-height: 3.3rem;
        text-transform: uppercase;

        margin-left: 70px;
        margin-top: 7px;
        margin-bottom: 15px;

        animation: scale 0.5s forwards;
    }

    .wrapper .menuContent ul {
        display: flex;
        flex-direction: row;
        padding-top: 50px;
    }

    .menuContent ul li {
        transition: all 1s ease-in-out;
    }

    .menuContent ul li:not(:last-child) {
        margin-right: 70px;
    }

    .menuContent ul li:nth-child(1) {
        animation: scaleDown 1s ease-in-out;
    }

    .menuContent ul li:nth-child(2) {
        animation: scaleDown 1s ease-in-out;

    }

    .menuContent ul li:nth-child(3) {
        animation: scaleDown 1s ease-in-out;
    }

    .menuContent ul li:nth-child(4) {
        animation: scaleDown 1s ease-in-out;
    }

    .menuContent ul li a {
        text-decoration: none;
        text-transform: uppercase;
        font-size: 2rem;
        color: #fff;
        transition: all 0.3s ease-in-out;
    }

    .menuContent ul li i {
        margin-right: 15px;
    }

    .menuContent ul li:hover a {
        color: #c59d5f;
    }

    .menuContent .a-menu-block.is-active {
        color: #c59d5f;
    }

    .menu-block {
        display: none;
        flex-direction: row;
        flex-wrap: wrap;
        margin: 60px auto;
        justify-content: center;
    }

    .menu-block.is-visible {
        display: flex;
    }

    .menu-card {
        position: relative;
        width: 310px;
        height: 250px;
        background: #171717;
        border-radius: 30px;
        overflow: hidden;
        border: 1px solid #171717;
        margin: 10px;
        /* box-shadow: 1px 1px 10px 2px #171717; */
        /* transition: all 0.2s ease-in-out; */
        animation: fadeIn 1.6s ease-in-out;
    }

    .menu-card:hover {
        transform: scale(1.05);
    }

    .menu-card .menu-card-img {
        position: relative;
        width: 100%;
        height: 70%;
    }

    .menu-card-img>img {
        width: 100%;
        border-bottom-right-radius: 40px;
        border-bottom-left-radius: 40px;
        position: absolute;
        opacity: 0.9;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .menu-card .menu-card-btn {
        width: 50px;
        height: 50px;
        border-radius: 25px;
        border: none;
        position: absolute;
        bottom: 32%;
        right: 5%;
        color: #000;
        font-size: 2rem;
        opacity: 0.9;
        background: #c59d5f;
        /* box-shadow: 0 3.4px 2.7px rgba(0, 0, 0, 0.022); */
        transition: all 0.3s ease-in-out;
        cursor: pointer;
    }

    .menu-card .menu-card-btn:hover {
        opacity: 1;
        transform: scale(1.08);
    }

    .menu-card-body {
        height: 30%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 30px;
        font-family: "Montserrat", sans-serif;
    }

    .menu-card-body .food-detail h4 {
        font-size: 1.8rem;
        font-weight: 600;
        color: #fff;
        margin: 10px 5px 5px 0;
    }

    .menu-card-body .food-detail p {
        font-size: 1.2rem;
        font-weight: 500;
        color: #999;
        margin: 0 auto 5px;
    }

    .menu-card-body .food-price p {
        font-size: 2rem;
        font-weight: bold;
        letter-spacing: 1px;
        color: #c59d5f;
        text-align: right;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }


    @keyframes scaleDown {
        0% {
            transform: scale(0);
        }

        100% {
            transform: scale(1);
        }
    }
</style>

<body>
    <header>
        <?php include('header.php') ?>
    </header>
    <section class="menu">
        <div class="wrapper">
            <div class="MenuHeading">
                <h2 class="h2-heading"><span class="first-letter">O</span>ur</h2>
                <h1 class="h1-heading">Menu</h1>
            </div>
            <div class="menuContent">
                <ul>
                    <li><a class="a-menu-block is-active" id="lunch-link" href="#lunch"><i class="fas fa-seedling fa-lg"></i>Lunch </a></li>
                    <li><a class="a-menu-block" id="dinner-link" href="#dinner"><i class="fas fa-drumstick-bite fa-lg"></i>Dinner</a></li>
                    <li><a class="a-menu-block" id="snacks-link" href="#snacks"><i class="fas fa-pizza-slice fa-lg"></i>Snacks</a></li>
                    <li><a class="a-menu-block" id="drinks-link" href="#drinks"><i class="fas fa-cocktail fa-lg"></i>Drinks</a></li>
                </ul>
            </div>
        </div>
        <div class="menu-blocks">
            <div class="menu-block is-visible" id="lunch">
                <?php
                $sql = "SELECT * FROM `producttb` WHERE `cat_id`='1'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    menu_card($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
                }
                ?>
            </div>
            <div class="menu-block" id="dinner">
                <?php
                $sql = "SELECT * FROM `producttb` WHERE `cat_id`='2'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    menu_card($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
                }
                ?>
            </div>
            <div class="menu-block" id="snacks">
                <?php
                $sql = "SELECT * FROM `producttb` WHERE `cat_id`='3'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    menu_card($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
                }
                ?>
            </div>
            <div class="menu-block" id="drinks">
                <?php
                $sql = "SELECT * FROM `producttb` WHERE `cat_id`='4'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    menu_card($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
                }
                ?>
            </div>
        </div>
    </section>
    <?php include('footer.php') ?>

    <script>
        const currentLocation = location.href;
        // console.log(location.href);
        const menuLinks = document.querySelectorAll(".a-menu-block");
        const menuBlocks = document.querySelectorAll(".menu-block");
        menuLinks.forEach((menuLink, i) => {
            if (menuLink.href === currentLocation) {
                menuLinks[0].classList.remove('is-active');
                menuBlocks[0].classList.remove('is-visible');
                menuLink.classList.add('is-active');
                menuBlocks[i].classList.add('is-visible');
            }
            menuLink.addEventListener('click', function() {
                setTimeout(function() {
                    window.scrollTo(0, window.pageYOffset);
                }, 2);
                menuBlocks.forEach(box => box.classList.remove('is-visible'));
                menuBlocks[i].classList.add('is-visible');
                menuLinks.forEach(link => link.classList.remove('is-active'));
                this.classList.add('is-active');
            });
        });
    </script>

</body>

</html>