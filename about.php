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
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playball&display=swap" rel="stylesheet">

    <!-- Title Logo -->
    <link rel="shortcut icon" href="./assets/images/ParadiseLogo(Title).png" type="image/x-icon">
    <title>Paradise | About Us</title>
</head>

<style>
    .aboutContainer {
        display: flex;
        align-items: center;
        flex-direction: column;
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
            url("./assets/images/AboutPage.jpg") no-repeat center;
        background-size: cover;
        min-height: 100vh;
        width: 100%;
    }

    .aboutBody .h2-heading {
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

    .aboutBody .h2-heading .first-letter {
        font-size: 8.4rem;
        text-transform: uppercase;
    }

    .aboutBody .h1-heading {
        font-size: 5.4rem;
        font-weight: 550;
        font-family: "Monoton", cursive;
        color: white;

        letter-spacing: 1px;
        line-height: 3.3rem;
        text-transform: uppercase;

        margin-top: 7px;
        margin-bottom: 15px;

        animation: scale 0.5s forwards;
    }

    .aboutInfoContainer {
        display: grid;
        grid-template-columns: 50% 50%;
        grid-gap: 45px;
        margin: 0 10%;

    }

    .box {
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        color: #fff;
        padding: 20px;
        opacity: 0;
        border-radius: 10px;
        animation: fade 0.5s forwards;
        animation-delay: 0.5s;
    }

    /* .box.one {
        backdrop-filter: blur(10px);
    } */

    .box.two {
        border-radius: 80px;
        animation: fad 0.6s forwards;
        animation-delay: 0.5s;
    }

    .box.three {
        border-radius: 80px;
        animation: fa 0.6s forwards;
        animation-delay: 0.8s;
    }

    .box.four {
        /* backdrop-filter: blur(10px); */
        animation: f 0.5s forwards;
        animation-delay: 0.8s;
    }

    img {
        border-radius: 30px;
    }

    .aboutContainer p {
        color: antiquewhite;
        font-family: 'Libre Baskerville', serif;
        font-size: 20px;
        text-align: center;
    }

    .head-head {
        font-size: 40px;
        margin: 50px 0;
        font-family: 'Playball', serif;
        color: #fff;
        opacity: 0;
        text-align: center;
        animation: scale 0.6s forwards;
        animation-delay: 0.2s;
    }


    @keyframes fade {
        0% {
            transform: translateX(-15rem);
        }

        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fad {
        0% {
            transform: translateX(15rem);
        }

        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fa {
        0% {
            transform: translateX(-15rem);
        }

        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes f {
        0% {
            transform: translateX(15rem);
        }

        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }
</style>

<body>
    <header>
        <?php include('header.php') ?>
    </header>

    <section class="aboutContainer">
        <div class="aboutBody">
            <div class="aboutHeading">
                <h2 class="h2-heading"><span class="first-letter">O</span>ur</h2>
                <h1 class="h1-heading">Story</h1>
            </div>
        </div>
        <div class="head-head">Enjoy our dazzling dishes and <br>make the most of your eating background with us</div>
        <div class="aboutInfoContainer">
            <div class="box one">
                <p class="top-line">Here you will be provided with fresh, fast, and friendly food . Paradise isn’t just about authentic normal food, it specializes in high standard, fresh and healthy food with affordable prices. Our food is cooked fresh to the customer’s order and taste. You are guaranteed the freshness of your order.</p>
            </div>
            <div class="box two">
                <img src="assets/images/AboutPage1.jpg">
            </div>
            <div class="box three">
                <img src="assets/images/AboutPage2.jpg">
            </div>
            <div class="box four">
                <p>Our growth and success is a direct result of our team, which is as diverse as our product offerings. We take pride in the diversity of our team that is built without regard to race, religion, age and other beliefs. Our team's experiences vary greatly as well; our members have been former business owners, worked on Wall St, managed scientific glass laboratories, served in the military, and much more. The strength of our diversity is complimented by our shared commitment to always put the customer first.</p>
            </div>
        </div>
    </section>



    <?php include('footer.php') ?>
</body>

</html>