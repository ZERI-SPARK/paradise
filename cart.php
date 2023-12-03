<?php

require_once 'config.php';
require_once 'component.php';

if (is_session_started() === FALSE) session_start();

if (isset($_SESSION["cart"])) $cart = $_SESSION["cart"];

$total = 0;
$delivery = isset($_SESSION["cart"]) && count($_SESSION["cart"]) != 0 ? 50 : 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/images/ParadiseLogo(Title).png" type="image/x-icon">
    <title>Paradise | My Cart</title>
</head>

<style>
    @import url(https://fonts.googleapis.com/css?family=Droid+Serif:400|Montserrat);

    .my-cart {
        height: 100%;
        width: 100%;
        background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),
            url("./assets/images/CartPage.jpg") no-repeat center fixed;
        background-size: cover;
    }

    .CartHeading {
        position: relative;
        text-align: center;
        margin: 20px;
    }

    .CartHeading .h2-heading {
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

    .CartHeading .h2-heading .first-letter {
        font-size: 8.4rem;
        text-transform: uppercase;
    }

    .CartHeading .h1-heading {
        position: absolute;
        font-size: 5.4rem;
        font-weight: 550;
        font-family: "Monoton", cursive;
        color: white;

        letter-spacing: 1px;
        line-height: 3.3rem;
        text-transform: uppercase;

        right: 350px;
        margin-top: 7px;
        margin-bottom: 15px;

        animation: scale 0.5s forwards;
    }

    .wrapper {
        display: flex;
        justify-content: space-between;
        min-height: calc(100vh - 30vh);
        width: 100%;
        padding-top: 60px;
        font-family: "Montserrat", sans-serif;
        color: #fff;
    }

    .total-wrapper {
        height: 100%;
        width: 30%;
        display: flex;
        justify-content: center;
    }

    .total-container {
        height: 100%;
        width: 70%;
        background: #212121;
        border-radius: 15px;
        padding: 10px;
        animation: fadeIn 1.3s ease-in-out;
    }

    .cart-heading {
        border-bottom: 1px solid #444;
    }

    .cart-heading h1 {
        padding-bottom: 10px;
        font-size: 30px;
        margin-left: 10px;
        color: #c59d5f;
        letter-spacing: 2px;
        font-family: 'Droid Serif';
    }

    .total-container ul {
        margin: 10px;
    }

    .total-container ul .total-row {
        padding: 10px;
        display: flex;
        text-align: right;
        align-items: center;
        justify-content: space-between;
    }

    .total-container ul .total-row:last-child {
        justify-content: center;
    }

    .total-row.grand span.label {
        font-size: 2rem;
        font-weight: bold;
        color: #fff;
    }

    .total-row.grand span.value {
        font-size: 1.6rem;
        font-weight: bold;
    }

    .total-container .total-row span {
        display: inline-block;
        padding: 0 0 0 5px;
        text-align: right;
    }

    .total-container .total-row .label {
        font-size: 1.5rem;
        text-transform: uppercase;
        color: #999;
    }

    .total-container .total-row .value {
        letter-spacing: -0.25px;
        width: 60%;
        padding-right: 15px;
        font-size: 1.3rem;
    }

    .total-container .checkout-btn {
        font-size: 1.5rem;
        color: #fff;
        background-color: #c59d5f;
        font-weight: 600;
        width: 100%;
        align-self: center;
        border: unset;
        text-transform: uppercase;
        border-radius: 7px;
        margin: 0 auto;
        padding: 15px 40px;
        transition: all 0.3s ease-in-out;
        cursor: pointer;
    }

    .total-container .checkout-btn:hover {
        outline: none;
        background-color: #fff;
        color: #111;
    }

    .cart-wrapper {
        width: 70%;
        height: 100%;
    }

    .cart-wrapper .cartwrap-wrapper {
        width: 100%;
        height: 100%;
        border-radius: 15px;
        background: #212121;
        padding: 10px;
        animation: fadeIn 1.3s ease-in-out;
    }

    .cart-items {
        padding: 10px 0;
    }

    .cart-items .items {
        display: block;
        border-radius: 15px;
        margin: 15px;
        background: #252525;
    }

    .cart-items .items .infoWrap {
        display: table;
        width: 100%;
    }

    .cart-items .items .cartSection {
        display: table-cell;
        vertical-align: middle;
        padding: 7px;
    }

    .cart-items .items .cartSection .itemImg {
        width: 190px;
        display: inline;
        margin-right: 15px;
        border-radius: 15px;
        overflow: hidden;
        height: 120px;
        float: left;
    }

    .cart-items .items .cartSection .itemImg img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .cart-items .items .cartSection .itemNumber {
        font-size: 1.1rem;
        color: #999;
        margin: 10px 0;
    }

    .cart-items .items .cartSection h3 {
        font-size: 2rem;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 0.25px;
    }

    .cart-items .items .cartSection p {
        display: inline-block;
        font-size: 1.6rem;
        color: #fff;
        margin: 10px 0;
    }

    .cart-items .items .cartSection p .quantity {
        font-weight: bold;
        color: #333;
    }

    .cart-items .items .cartSection.prodTotal {
        text-align: center;
    }

    .cart-items .items .cartSection.prodTotal p {
        font-weight: bold;
        font-size: 1.8rem;
        letter-spacing: 0.5px;
        color: #c59d5f;
    }

    .cart-items .items .cartSection input.qty {
        width: 35px;
        text-align: center;
        font-size: 1em;
        background: #444;
        color: #fff;
        font-size: 1.5rem;
        padding: 10px;
        overflow: hidden;
        height: 35px;
        border-radius: 7px;
        border: none;
    }

    .cart-items .items .cartSection input:focus {
        outline: 0;
        color: #fff;
    }

    .cart-items .items .cartSection.delete {
        text-align: center;
    }

    .cart-items .items .cartSection.itemQnty {
        text-align: center;
    }

    .remove-btn {
        text-decoration: none;
        color: #111;
        font-weight: bold;
        background: #fff;
        padding: 10px;
        font-size: 1.4em;
        display: inline-block;
        border-radius: 50%;
        line-height: 0.85;
        transition: all 0.25s linear;
    }

    .remove-btn:hover {
        color: darkred;
    }

    .cart-heading .food-wrap {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 0 10px;
    }

    .food-wrap .clear-btn {
        font-size: 1rem;
        color: #fff;
        background-color: darkred;
        border: unset;
        text-transform: uppercase;
        border-radius: 7px;
        margin: 0 0 10px;
        padding: 10px 25px;
        transition: all 0.3s ease-in-out;
        cursor: pointer;
        letter-spacing: 0.75px;
    }

    .food-wrap .clear-btn:hover {
        outline: none;
        background-color: #fff;
        color: darkred;
        font-weight: 600;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }
</style>

<body>
    <header>
        <?php include_once 'header.php' ?>
    </header>

    <section class="my-cart">
        <div class="CartHeading">
            <h2 class="h2-heading"><span class="first-letter">S</span>hopping</h2>
            <h1 class="h1-heading">Cart</h1>
        </div>
        <div class="wrapper">
            <div class="cart-wrapper">
                <div class="cartwrap-wrapper">
                    <div class="cart-heading">
                        <div class="food-wrap">
                            <h1>Food Items (<?php echo isset($_SESSION["cart"]) ? count($_SESSION['cart']) : "0"; ?>)</h1>
                            <a href="includes/clearcart.php"><button class="clear-btn" name="clear">Clear</button></a>
                        </div>
                    </div>
                    <div class="cart-items">
                        <?php if (isset($_SESSION["cart"]) && count($_SESSION["cart"]) != 0) { ?>
                            <ul class="cartWrap">
                                <?php
                                foreach ($cart as $p_id => $value) {
                                    $sql = "SELECT * FROM `producttb` WHERE `id`='$p_id'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    new_cart_card($p_id, $row['product_name'], $row['product_image'], $row['product_price'], $value['qnty']);
                                    $total += $row['product_price'] * $value['qnty'];
                                }

                                // $cart = Array (id => Array(qnty=2))
                                ?>
                            </ul>
                        <?php } else { ?>
                            <div class="cart-empty">
                                <p>Cart is Empty</p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="total-wrapper">
                <div class="total-container">
                    <div class="cart-heading">
                        <h1>Total</h1>
                    </div>
                    <ul>
                        <li class="total-row"><span class="label">Subtotal</span><span class="value">&#8377; <?php echo $total ?? 0; ?></span></li>
                        <li class="total-row"><span class="label">Delivery</span><span class="value"><?php if ($total > 500) $delivery = 0;
                                                                                                        echo $delivery == 0 ? "FREE" : "&#8377;" . $delivery; ?></span></li>
                        <li class="total-row"><span class="label">Tax</span><span class="value">&#8377; <?php echo $tax = round($total * 0.12, 2) ?? 0; ?></span></li>
                        <li class="total-row grand"><span class="label">Total</span><span class="value">&#8377; <?php echo $gtotal = $total + $delivery + $tax ?? 0; ?></span></li>
                        <li class="total-row"><a href="./checkout.php"><button class="checkout-btn" name="checkout">Checkout</button></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <?php $_SESSION['cart_total'] = $gtotal; ?>
    <?php include_once 'footer.php' ?>
</body>

</html>