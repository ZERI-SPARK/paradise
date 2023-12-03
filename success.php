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
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins|Montserrat&display=swap">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Title Logo -->
    <link rel="shortcut icon" href="./assets/images/ParadiseLogo(Title).png" type="image/x-icon">
    <title>Paradise | Success</title>
</head>

<style>
    *,
    *::after,
    *::before {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        height: 100vh;
        width: 100%;
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
            url("./assets/images/CartPage.jpg") no-repeat center fixed;
        background-size: cover;
        backdrop-filter: blur(5px);
    }

    .success-wrapper {
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .success-popup {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 500px;
        background-color: #252525;
        padding: 20px;
        border-radius: 10px;
        animation: box 1.2s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .success-popup .success-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.3s linear;
        animation: text-Up 0.3s forwards;
        animation-delay: 1.2s;
    }

    .success-popup .success-icon i {
        font-size: 4.8rem;
        color: #39d639;
    }

    .success-popup .title {
        font-family: 'Montserrat';
        color: #c59d5f;
        margin: 10px 0px 20px;
        font-size: 2.1rem;
        text-align: center;
        line-height: 0.85;
        opacity: 0;
        transition: all 0.3s linear;
        animation: text-Up 0.3s forwards;
        animation-delay: 1.3s;
    }

    .success-popup .title span {
        font-size: 4.8rem;
    }

    .success-popup .description {
        display: flex;
        color: #fff;
        font-family: 'Poppins', sans-serif;
        padding-top: 15px;
        text-align: center;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: all 0.3s linear;
        animation: text-Up 0.3s forwards;
        animation-delay: 1.4s;
    }

    .success-popup .description h3 {
        font-size: 1.8rem;
        letter-spacing: 0.75px;
        margin-bottom: 5px;
    }

    .success-popup .description p {
        font-size: 1.2rem;
    }

    .success-popup .go-back-btn button {
        width: 250px;
        padding: 15px;
        background: #c59d5f;
        color: #fff;
        text-transform: uppercase;
        border: unset;
        font-size: 1.15rem;
        font-weight: 600;
        outline: none;
        border-radius: 10px;
        cursor: pointer;
        margin: 40px 0px 0px;
        opacity: 0;
        transition: all 0.3s linear;
        animation: text-Up 0.3s forwards;
        animation-delay: 1.5s;
    }

    .success-popup .go-back-btn button:hover {
        outline: none;
        background-color: #fff;
        color: black;
    }

    @keyframes text-Up {
        0% {
            transform: translateY(10px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes box {
        0% {
            transform: scale(0);
        }

        100% {
            opacity: 1;
            transform: scale(1);
        }
    }
</style>

<body>
    <div class="success-wrapper">
        <div class="success-popup">
            <div class="success-icon">
                <i class="far fa-check-circle"></i>
            </div>
            <div class="title">
                <h1><span>S</span>uccess!</h1>
            </div>
            <div class="description">
                <h3>Thank You</h3>
                <p>Your Order has been Successfully Placed with Reference ID #<?php echo $_SESSION['order-id'] ?? "" ?></p>
            </div>
            <div class="go-back-btn">
                <a href="./index.php"><button name="go-back-btn">Go Back</button></a>
            </div>
        </div>
    </div>
    <?php unset($_SESSION['order-id']); ?>
</body>

</html>