<?php

require_once 'config.php';
require_once 'component.php';

if (is_session_started() === FALSE) session_start();

$cart = $_SESSION["cart"];

?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<style>
    @import url(https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic|Montserrat:400,700);

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    ul {
        list-style: none;
    }

    body {
        color: #111;
        font-family: "Droid Serif", serif;
    }

    .cf:before,
    .cf:after {
        content: " ";
        display: table;
    }

    .cf:after {
        clear: both;
    }

    .wrap {
        width: 75%;
        max-width: 960px;
        margin: 0 auto;
        padding: 5% 0;
        margin-bottom: 5em;
    }

    .projTitle {
        font-family: "Montserrat", sans-serif;
        font-weight: bold;
        text-align: center;
        font-size: 2em;
        padding: 1em 0;
        border-bottom: 1px solid #dadada;
        letter-spacing: 3px;
        text-transform: uppercase;
    }

    .projTitle span {
        font-family: "Droid Serif", serif;
        font-weight: normal;
        font-style: italic;
        text-transform: lowercase;
        color: #777;
    }

    .heading {
        padding: 1em 0;
        border-bottom: 1px solid #d0d0d0;
    }

    .heading h1 {
        font-family: "Droid Serif", serif;
        font-size: 2em;
        float: left;
    }

    .cart {
        padding: 1em 0;
    }

    .cart .items {
        display: block;
        width: 100%;
        padding: 20px;
        border-radius: 15px;
        margin: 10px;
        border-bottom: 1px solid #fafafa;
    }

    .cart .items.even {
        background: #fafafa;
    }

    .cart .items .infoWrap {
        display: table;
        width: 100%;
    }

    .cart .items .cartSection {
        display: table-cell;
        vertical-align: middle;
    }

    .cart .items .cartSection .itemNumber {
        font-size: 0.75em;
        color: #777;
        margin-bottom: 0.5em;
    }

    .cart .items .cartSection h3 {
        font-size: 1em;
        font-family: "Montserrat", sans-serif;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 0.025em;
    }

    .cart .items .cartSection p {
        display: inline-block;
        font-size: 0.85em;
        color: #777777;
        font-family: "Montserrat", sans-serif;
    }

    .cart .items .cartSection p .quantity {
        font-weight: bold;
        color: #333;
    }

    .cart .items .cartSection.prodTotal {
        text-align: center;
    }

    .cart .items .cartSection.prodTotal p {
        font-weight: bold;
        font-size: 1.25em;
    }

    .cart .items .cartSection input.qty {
        width: 32px;
        text-align: center;
        font-size: 1em;
        padding: 0.25em;
        margin: 1em 0 0 0;
    }

    .cart .items .cartSection button.qty-minus,
    .cart .items .cartSection button.qty-plus {
        border: none;
        font-size: 20px;
    }

    .cart .items .cartSection .itemImg {
        width: 140px;
        display: inline;
        margin-right: 1em;
        border-radius: 15px;
        overflow: hidden;
        height: 100px;
        float: left;
    }

    .cart .items .cartSection .itemImg img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    a.remove {
        text-decoration: none;
        font-family: "Montserrat", sans-serif;
        color: #ffffff;
        font-weight: bold;
        background: #e0e0e0;
        padding: 0.5em;
        font-size: 0.75em;
        display: inline-block;
        border-radius: 100%;
        line-height: 0.85;
        transition: all 0.25s linear;
    }

    a.remove:hover {
        background: #f30;
    }

    .btn:link,
    .btn:visited {
        text-decoration: none;
        font-family: "Montserrat", sans-serif;
        letter-spacing: -0.015em;
        font-size: 1em;
        padding: 1em 3em;
        color: #fff;
        background: #82ca9c;
        font-weight: bold;
        border-radius: 50px;
        float: right;
        text-align: right;
        transition: all 0.25s linear;
    }

    .btn:after {
        content: "\276f";
        padding: 0.5em;
        position: relative;
        right: 0;
        transition: all 0.15s linear;
    }

    .btn:hover,
    .btn:focus,
    .btn:active {
        background: #f69679;
    }

    .btn:hover:after,
    .btn:focus:after,
    .btn:active:after {
        right: -10px;
    }

    /* TOTAL AND CHECKOUT  */
    .subtotal {
        float: right;
        width: 35%;
    }

    .subtotal .totalRow {
        padding: 0.5em;
        text-align: right;
    }

    .subtotal .totalRow.final {
        font-size: 1.25em;
        font-weight: bold;
    }

    .subtotal .totalRow span {
        display: inline-block;
        padding: 0 0 0 1em;
        text-align: right;
    }

    .subtotal .totalRow .label {
        font-family: "Montserrat", sans-serif;
        font-size: 0.85em;
        text-transform: uppercase;
        color: #777;
    }

    .subtotal .totalRow .value {
        letter-spacing: -0.025em;
        width: 35%;
    }

    @media only screen and (max-width: 39.375em) {
        .wrap {
            width: 98%;
            padding: 2% 0;
        }

        .projTitle {
            font-size: 1.5em;
            padding: 10% 5%;
        }

        .heading {
            padding: 1em;
            font-size: 90%;
        }

        .cart .items .cartSection {
            width: 90%;
            display: block;
            float: left;
        }

        .cart .items .cartSection.qtyWrap {
            width: 10%;
            text-align: center;
            padding: 0.5em 0;
            float: right;
        }

        .cart .items .cartSection.qtyWrap:before {
            content: "QTY";
            display: block;
            font-family: "Montserrat", sans-serif;
            padding: 0.25em;
            font-size: 0.75em;
        }

        .cart .items .cartSection.prodTotal,
        .cart .items .cartSection.removeWrap {
            display: none;
        }

        .cart .items .cartSection .itemImg {
            width: 25%;
        }

        .promoCode,
        .subtotal {
            width: 100%;
        }

        a.btn.continue {
            width: 100%;
            text-align: center;
        }
    }
</style>




<div class="wrap cf">
    <h1 class="projTitle">Shopp<span>-ing</span> Cart</h1>
    <div class="heading cf">
        <h1>Food Items ( <?php echo count($_SESSION["cart"]) ?> )</h1>
    </div>
    <div class="cart">
        <!--     <ul class="tableHead">
      <li class="prodHeader">Product</li>
      <li>Quantity</li>
      <li>Total</li>
       <li>Remove</li>
    </ul> -->
        <ul class="cartWrap">
            <?php
            $total = 0;
            foreach ($cart as $p_id => $value) {
                $sql = "SELECT * FROM `producttb` WHERE `id`='$p_id'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                // cart_card($p_id, $row['product_name'], $row['product_image'], $row['product_price'], $value['qnty']);
                $total += $row['product_price'] * $value['qnty'];
            }
            ?>
        </ul>
    </div>

    <div class="subtotal cf">
        <ul>
            <li class="totalRow"><span class="label">Subtotal</span><span class="value">$35.00</span></li>

            <li class="totalRow"><span class="label">Shipping</span><span class="value">$5.00</span></li>

            <li class="totalRow"><span class="label">Tax</span><span class="value">$4.00</span></li>
            <li class="totalRow final"><span class="label">Total</span><span class="value">$44.00</span></li>
            <li class="totalRow"><a href="#" class="btn continue">Checkout</a></li>
        </ul>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>