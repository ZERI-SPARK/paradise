<?php

require_once 'config.php';
require_once 'component.php';

if (is_session_started() === FALSE) session_start();

$cart = $_SESSION["cart"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paradise | Checkout</title>
</head>

<style>
    .make-payment {
        min-height: 100vh;
        width: 100%;
        background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),
            url("./assets/images/CartPage.jpg") no-repeat center fixed;
        background-size: cover;
    }

    .checkout-head {
        position: relative;
        text-align: center;
        margin: 20px;
    }

    .checkout-head .h2-heading {
        font-size: 7.4rem;
        font-weight: 100;
        font-family: "Monoton", cursive;
        color: #c59d5f;

        line-height: 0.6;
        letter-spacing: 1px;

        margin: 0;
        padding-bottom: 14px;

        opacity: 0;
        animation: scaleUp 0.5s forwards;
        animation-delay: 0.5s;
    }

    .checkout-head .h2-heading .first-letter {
        font-size: 8.4rem;
        text-transform: uppercase;
    }

    .checkout-head .h1-heading {
        color: #fff;
    }

    .wrapper {
        display: flex;
        justify-content: space-between;
        min-height: calc(100vh - 30vh);
        width: 100%;
        padding-top: 20px;
        font-family: "Montserrat", sans-serif;
        color: #fff;
    }

    .order-info-wrapper {
        height: 100%;
        width: 35%;
        display: flex;
        justify-content: center;
        animation: fadeIn 1.3s ease-in-out;
    }

    .user-info-wrapper {
        height: 100%;
        width: 65%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .user-info-wrapper .user-order-area {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        height: 100%;
        width: 85%;
        margin-bottom: 10px;
        background: #252525;
        padding: 15px;
        border-radius: 10px;
        animation: fadeIn 1.3s ease-in-out;
    }

    .user-order-area h1 {
        font-size: 2.4rem;
        border-bottom: 1px solid #333;
        padding-bottom: 5px;
        color: #c59d5f;
        letter-spacing: 1.25px;
    }

    .user-order-area .input-grp {
        display: flex;
        flex-direction: column;
        width: 100%;
        max-width: 320px;

        margin-top: 20px;
    }

    .user-order-area .input-grp label {
        color: #86939e;
        font-size: 1.4rem;
        letter-spacing: 0.75px;

        margin-left: 11px;
        margin-bottom: 5px;
    }

    .user-order-area .input-grp input {
        font-size: 1.3rem;
        color: #999;

        background-color: #1f1f1f;
        border-radius: 7px;
        border: 1px solid #1f1f1f;

        padding: 10px;
        letter-spacing: 0.65px;
    }

    .user-order-area .input-grp input:focus {
        color: white;
        outline: 0;
    }

    .input-row {
        display: flex;
        flex-wrap: nowrap;
        justify-content: space-between;
        max-width: 98%;
    }

    .input-row .input-grp {
        max-width: 50%;
        margin-right: 10px;
    }

    .input-grp.addr-text {
        max-width: 97%;
    }

    .pymnt-wrapper .pymnt-item {
        position: relative;
        max-width: 97%;
        margin-top: 20px;
    }

    .pymnt-wrapper .pymnt-label {
        display: flex;
        margin-bottom: 0;
        padding: 15px;
        cursor: pointer;
        border-radius: 10px;
        background-color: #1e1e1e;
        justify-content: space-between;
        transition: all 0.3s ease-in-out;
    }

    .pymnt-wrapper .pymnt-text {
        padding-left: 30px;
        position: relative;
        max-width: 80%;
    }

    .pymnt-wrapper .circle-checkmark {
        content: " ";
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 15px;
        height: 15px;
        background: #fff;
        position: absolute;
        left: 0;
        top: 0;
        margin: 2px;
        border-radius: 50%;
    }

    .pymnt-wrapper .pymnt-text h5 {
        font-size: 1.6rem;
        margin-bottom: 7px;
    }

    .pymnt-wrapper .pymnt-text p {
        color: #95a5b3;
        font-size: 1.4rem;
    }

    .pymnt-wrapper .pymnt-card-img {
        display: flex;
        align-items: center;
        justify-content: center;
        max-width: 20%;
        flex-wrap: wrap;
    }

    .pymnt-wrapper .pymnt-card-img>img {
        margin: 3px;
    }

    .pymnt-wrapper input[type=radio] {
        display: none;
    }

    .pymnt-label:hover {
        background-color: #333;
    }

    .pymnt-wrapper input[type=radio]:checked+.pymnt-label .circle-checkmark {
        background-color: #c59d5f;
    }

    .pymnt-wrapper input[type=radio]:checked+.pymnt-label {
        background: #333;
    }

    .pymnt-label .circle-checkmark:after {
        display: block;
        content: " ";
        position: absolute;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: white;
    }

    #ccpymnt-form {
        display: none;
        margin-top: 20px;
        border-radius: 10px;
        width: 97%;
        background: #333;
        transition: all 0.3s ease-in-out;
        animation: cc-load 1s ease-in-out;
    }

    #ccpymnt-form h1 {
        font-size: 2rem;
        border-bottom: 1px solid #555;
        color: #fff;
    }

    #ccpymnt-form .input-grp label {
        color: #95a5b3;
    }

    #ccpymnt-form .input-row {
        max-width: 48%;
    }

    #ccpymnt-form .input-row .input-grp {
        max-width: 96%;
    }

    .ccform-wrapper {
        display: flex;
        flex-direction: column;
        max-width: 50%;
    }

    .wrap-the-wrapper {
        display: flex;
    }

    .cccard-img {
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .cccard-img>img {
        object-fit: contain;
        object-position: center;
        margin-top: 25px;
    }

    .order-info-wrapper .order-sum {
        display: flex;
        flex-direction: column;
        height: 100%;
        width: 90%;
        background-color: #252525;
        padding: 15px;
        border-radius: 10px;
        overflow: hidden;
    }

    .order-sum h1 {
        font-size: 2.4rem;
        border-bottom: 1px solid #333;
        padding-bottom: 5px;
        color: #c59d5f;
        letter-spacing: 1.25px;
    }

    .order-sum .order-sum-details {
        margin-top: 10px;
        max-height: 400px;
        overflow-y: scroll;
    }

    .order-sum .order-sum-details::-webkit-scrollbar {
        display: none;
    }

    @keyframes cc-load {
        0% {
            transform: translateY(-50%);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    li.order-item {
        margin-top: 10px;
        border-radius: 10px;
        background: #1e1e1e;
        padding: 5px;
    }

    .item-wrap {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .item-info {
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }

    .item-info-text {
        display: flex;
        flex-direction: column;
    }

    .item-img {
        height: 65px;
        width: 90px;
        margin-right: 10px;
        overflow: hidden;
        border-radius: 10px;
    }

    .item-img img {
        height: 100%;
        width: 100%;
        object-fit: cover;
        object-position: center;
    }

    p.item-number {
        font-size: 1.05rem;
        margin: 5px 0;
        color: #999;
    }

    h3.item-name {
        font-size: 1.6rem;
    }

    p.item-qnty-price {
        font-size: 1.4rem;
        margin: 5px 0;
        color: #86939e;
    }

    .item-subprice p {
        font-size: 1.5rem;
        color: #c59d5f;
        margin: 0 10px;
        font-weight: bold;
    }

    .order-total {
        display: flex;
        justify-content: space-between;
        padding: 20px 0;
        align-items: center;
        font-size: 2.4rem;
        font-family: 'Montserrat';
    }

    .order-btn {
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

    .order-btn:hover {
        outline: none;
        background-color: #fff;
        color: #111;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    @keyframes scaleUp {
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
    <header>
        <?php include_once 'header.php' ?>
    </header>

    <section class="make-payment">
        <div class="checkout-head">
            <h2 class="h2-heading"><span class="first-letter">C</span>heck<span class="h1-heading">out</span></h2>
        </div>
        <form action="includes/order.php" method="POST" class="order-form">
            <div class="wrapper">
                <div class="user-info-wrapper">
                    <div class="user-order-area" id="basic-info-area">
                        <h1>Contact Details</h1>
                        <div class="input-row">
                            <div class="input-grp">
                                <label>First Name</label>
                                <input type="text" placeholder="Fist Name" value="<?php echo $_SESSION['fname'] ?? ""; ?>" name="fname">
                            </div>
                            <div class="input-grp">
                                <label>Last Name</label>
                                <input type="text" placeholder="Last Name" value="<?php echo $_SESSION['lname'] ?? ""; ?>" name="lname">
                            </div>
                        </div>
                        <div class="input-row">
                            <div class="input-grp">
                                <label>Email</label>
                                <input type="text" placeholder="Email" value="<?php echo $_SESSION['email'] ?? ""; ?>" name="email">
                            </div>
                            <div class="input-grp">
                                <label>Phone Number</label>
                                <input type="text" placeholder="Phone Number" value="<?php echo $_SESSION['phno'] ?? ""; ?>" name="phno">
                            </div>
                        </div>
                    </div>
                    <div class="user-order-area" id="addr-info-area">
                        <h1>Delivery Address</h1>
                        <div class="input-grp addr-text">
                            <label>Address Line 1</label>
                            <input type="text" placeholder="Address Line 1" value="<?php echo $_SESSION['address']['addr1'] ?? ""; ?>" name="addr1" required>
                        </div>
                        <div class="input-grp addr-text">
                            <label>Address Line 2</label>
                            <input type="text" placeholder="Address Line 2" value="<?php echo $_SESSION['address']['addr2'] ?? ""; ?>" name="addr2">
                        </div>
                        <div class="input-row">
                            <div class="input-grp">
                                <label>City</label>
                                <input type="text" placeholder="City" value="<?php echo $_SESSION['address']['city'] ?? ""; ?>" name="city" required>
                            </div>
                            <div class="input-grp">
                                <label>Pincode</label>
                                <input type="text" placeholder="Pincode" value="<?php echo $_SESSION['address']['pincode'] ?? ""; ?>" name="pincode" required>
                            </div>
                        </div>
                    </div>
                    <div class="user-order-area" id="pymnt-info-area">
                        <h1>Payment Details</h1>
                        <div class="pymnt-wrapper">
                            <div class="pymnt-item">
                                <input id="cod" type="radio" name="pymnt-mode" value="cod" checked />
                                <label class="pymnt-label" for="cod">
                                    <div class="pymnt-text">
                                        <span class="circle-checkmark"></span>
                                        <h5>Cash on Delivery</h5>
                                        <p>Safe payment online. Credit card needed. Paypal account is not necessary.</p>
                                    </div>
                                    <div class="pymnt-card-img">
                                        <img src="data:image/png;base64,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" />
                                    </div>
                                </label>
                            </div>
                            <div class="pymnt-item">
                                <input id="cc" type="radio" name="pymnt-mode" value="cc" />
                                <label class="pymnt-label" for="cc">
                                    <div class="pymnt-text">
                                        <span class="circle-checkmark"></span>
                                        <h5>Credit Card</h5>
                                        <p>Safe payment online. Credit card needed. Visa, Mastercard or RuPay</p>
                                    </div>
                                    <div class="pymnt-card-img">
                                        <img src="data:image/png;base64,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" />
                                        <img src="data:image/png;base64,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" />
                                        <img src="data:image/png;base64,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" />
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="user-order-area" id="ccpymnt-form">
                            <h1>Credit Card Details</h1>
                            <div class="wrap-the-wrapper">
                                <div class="ccform-wrapper">
                                    <div class="input-grp">
                                        <label>Name on Card</label>
                                        <input type="text" placeholder="Name on Card" value="" name="ccname">
                                    </div>
                                    <div class="input-grp">
                                        <label>Card Number</label>
                                        <input type="text" placeholder="xxxx-xxxx-xxxx-xxxx" value="" name="ccnum">
                                    </div>
                                    <div class="input-row">
                                        <div class="input-grp">
                                            <label>Expiry Date</label>
                                            <input type="month" placeholder="" value="" name="expno">
                                        </div>
                                        <div class="input-grp">
                                            <label>CVV</label>
                                            <input type="num" placeholder="xxxx" maxlength="4" value="" name="cvv">
                                        </div>
                                    </div>
                                </div>
                                <div class="cccard-img"><img src="./assets/images/Credit_Card.png" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-info-wrapper">
                    <div class="order-sum">
                        <h1>Order Summary</h1>
                        <div class="order-sum-details">
                            <ul>
                                <?php
                                if ($cart != NULL) {
                                    foreach ($cart as $p_id => $value) {
                                        $sql = "SELECT * FROM `producttb` WHERE `id`='$p_id'";
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_assoc($result);
                                        order_card($p_id, $row['product_name'], $row['product_image'], $row['product_price'], $value['qnty']);
                                    }
                                } else {
                                    echo "<p>No Item in Cart</p>";
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="order-total">
                            <h3>Grand Total</h3>
                            <h5>&#8377; <?php echo $_SESSION['cart_total'] ?></h5>
                        </div>
                        <button type="submit" class="order-btn" name="order">Pay Now</button>
                    </div>

                </div>
            </div>
        </form>

    </section>

    <script>
        var pymntmode = document.getElementsByName("pymnt-mode");
        pymntmode[1].onclick = function() {
            document.getElementById('ccpymnt-form').style.display = 'flex';
            document.getElementsByName('ccname')[0].required = true;
            document.getElementsByName('ccnum')[0].required = true;
            document.getElementsByName('expno')[0].required = true;
            document.getElementsByName('cvv')[0].required = true;
        }
        pymntmode[0].onclick = function() {
            document.getElementById('ccpymnt-form').style.display = 'none';
            document.getElementsByName('ccname')[0].required = false;
            document.getElementsByName('ccnum')[0].required = false;
            document.getElementsByName('expno')[0].required = false;
            document.getElementsByName('cvv')[0].required = false;
        }
    </script>








    <?php include_once 'footer.php' ?>
</body>

</html>