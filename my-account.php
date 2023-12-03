<?php

require_once 'config.php';
require_once 'component.php';

if (is_session_started() === FALSE) session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title Logo -->
    <link rel="shortcut icon" href="./assets/images/ParadiseLogo(Title).png" type="image/x-icon">
    <title>Paradise | My Account</title>
</head>

<style>
    .user-account {
        min-height: 100vh;
        width: 100%;
        background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)),
            url("./assets/images/MyAccountPage.jpg") no-repeat center fixed;
        background-size: cover;
    }

    .user-account .wrapper {
        display: flex;
        justify-content: center;
        width: 100%;
        height: 100%;
        padding: 30px 60px;
    }

    .profile-dashboard {
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 220px;
        height: 100%;
        border-radius: 15px;
        background: #252525;
        padding: 16px;
        margin-right: 10px;
    }

    .accContainer {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .accHeading .h2-heading {
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

    .accHeading .h2-heading .first-letter {
        font-size: 8.4rem;
        text-transform: uppercase;
    }

    .accHeading .h1-heading {
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


    .right-block {
        display: block;
        width: 50%;
        height: 100%;
        margin-left: 10px;
    }

    .profile-dashboard .basic-info {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        margin: 40px auto;
    }

    input.hidden {
        display: none;
    }

    .basic-info .user-img {
        position: relative;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        overflow: hidden;
        cursor: pointer;
    }

    .basic-info .user-img img {
        position: absolute;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .basic-info h2 {
        color: #fff;
        font-size: 2.5rem;
        margin: 15px auto;
        text-align: center;
    }

    .profile-dashboard .account-acc {
        display: flex;
        flex-direction: column;
    }

    .account-acc li {
        padding: 16px 16px 16px 0;
        border-top: 1px solid #333;
    }

    .account-acc li a {
        display: inline-block;
        text-decoration: none;
        color: #fff;
        letter-spacing: 1px;
        font-size: 1.8rem;
    }

    .account-acc li i {
        opacity: 0.5;
        transition: 0.5s;
        font-size: 2rem;
        margin-right: 14px;
        color: #c59d5f;
    }

    .account-acc li:hover i {
        opacity: 1;
    }

    .account-acc li:hover a {
        color: #c59d5f;
    }

    .a-profile-link.is-active {
        opacity: 1;
        color: #c59d5f;
    }

    .right-block .right-box {
        display: none;
        overflow: hidden;
        height: 100%;
        width: 100%;
    }

    .right-box.is-visible {
        display: flex;
    }

    .right-box h1 {
        font-size: 3.4rem;
        border-bottom: 1px solid #333;
        padding-bottom: 5px;
        color: #c59d5f;
        letter-spacing: 1.25px;
    }

    .right-box .profile-form {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        width: 90%;
        height: 70%;
        border-radius: 15px;
        padding: 15px;
        background-color: #252525;
        margin-bottom: 10px;
    }

    #my-profile {
        flex-direction: column;
    }

    .right-box .change-password-form {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        width: 70%;
        height: 70%;
        border-radius: 15px;
        padding: 15px;
        background-color: #252525;
    }

    .right-box .input-grp {
        display: flex;
        flex-direction: column;
        width: 100%;
        max-width: 320px;

        margin-top: 20px;
    }

    .change-password-form .input-grp {
        max-width: 98%;
    }

    .right-box .input-grp label {
        color: #86939e;
        font-size: 1.5rem;
        letter-spacing: 1px;

        margin-left: 16px;
        margin-bottom: 5px;
    }

    .right-box .input-grp input {
        font-size: 1.4rem;
        color: #999;

        background-color: #1f1f1f;
        border-radius: 7px;
        border: 1px solid #1f1f1f;

        padding: 15px;
        letter-spacing: 0.5px;
    }

    .right-box .input-grp input:focus {
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

    .input-row .input-grp:last-child {
        margin-right: 0;
    }

    .input-grp button {
        font-size: 1.4rem;
        color: white;
        font-weight: 600;
        background-color: #c59d5f;
        width: 200px;
        border: unset;
        text-transform: uppercase;
        border-radius: 7px;
        margin-top: 15px;
        margin-bottom: 10px;
        padding: 15px;
        transition: all 0.3s ease-in-out;
        cursor: pointer;
    }

    .input-grp button:hover {
        outline: none;
        background-color: #fff;
        color: #111;
    }

    .input-grp.addr-text {
        max-width: 100%;
    }

    .right-box .order-container {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        width: 100%;
        max-height: 700px;
        border-radius: 15px;
        padding: 15px;
        background-color: #252525;
        overflow-y: scroll;
    }

    .right-box .order-container::-webkit-scrollbar {
        display: none;
    }

    .order-item {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        border-radius: 15px;
        background: #2a2a2a;
        max-height: 100%;
        width: 100%;
        padding: 10px;
        margin-top: 10px;
    }

    .order-status-icon {
        display: flex;
        font-size: 4.4rem;
        height: 80px;
        width: 80px;
        border-radius: 12px;
        margin-right: 10px;
        align-items: center;
        justify-content: center;
    }

    .order_status {
        margin: 3px 0;
    }

    .order-item.placed .order-status-icon {
        background: #cce5ff;
        color: #66b0ff;
    }

    .order-item.placed .order_status {
        color: #66b0ff;
    }

    .order-item.delivered .order-status-icon {
        color: #2bd47d;
        background: #c0f2d8;
    }

    .order-item.delivered .order_status {
        color: #2bd47d;
    }

    .order-item.on-the-way .order-status-icon {
        color: #ffc233;
        background: #ffe8b3;
    }

    .order-item.on-the-way .order_status {
        color: #ffc233;
    }

    .order-item.cancelled .order-status-icon {
        color: #e05260;
        background: #f7d4d7;
    }

    .order-item.cancelled .order_status {
        color: #e05260;
    }

    .order-left {
        display: flex;
        align-items: center;
    }

    .order-text {
        font-size: 2rem;
        color: #eee;
    }

    .order-right {
        display: flex;
        flex-direction: column;
    }

    button.order-btn {
        color: #fff;
        background: #004187;
        width: 100%;
        margin: 5px 0;
        font-size: 1.4rem;
        padding: 10px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    button.order-btn:hover {
        background: #0060c6;
    }

    button.order-btn.cancel {
        background: #980000;
    }

    button.order-btn.cancel:hover {
        background: #c00000;
    }

    .order-id {
        font-size: 2.4rem;
        margin-bottom: 7px;
        color: #eee;
    }

    .order-date {
        font-size: 1.9rem;
        margin-bottom: 3px;
        color: #cdcdcd;
    }
</style>


<body>
    <header>
        <?php include_once('header.php') ?>
    </header>
    <section class="user-account">
        <div class="accContainer">
            <div class="accHeading">
                <h2 class="h2-heading"><span class="first-letter">M</span>y</h2>
                <h1 class="h1-heading">Account</h1>
            </div>
            <div class="wrapper">
                <div class="profile-dashboard">
                    <div class="basic-info">
                        <form action="includes/profileImage.php" method="post" enctype="multipart/form-data">
                            <input id="profile-image-upload" name="profile-image-upload" onchange="this.form.submit()" class="hidden" type="file">
                        </form>
                        <div class="user-img" id="profile-image" onclick="profileUpload();">
                            <img src="assets/images/UserImage/<?php echo $_SESSION['profile-img'] ?>" alt="UserPic">
                        </div>
                        <h2><?php echo $fullname = isset($_SESSION['email']) ? $_SESSION['fname'] . " " . $_SESSION["lname"] : ""; ?></h2>
                    </div>
                    <ul class="account-acc">
                        <li><a class="a-profile-link is-active" href="#my-profile"><i class="fas fa-user"></i>My Profile</a></li>
                        <li><a class="a-profile-link" href="#my-orders"><i class="fas fa-hamburger"></i>My Orders</a></li>
                        <li><a class="a-profile-link" href="#privacy"><i class="fas fa-key"></i>Privacy</a></li>
                        <li><a class="" href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                    </ul>
                </div>
                <div class="right-block">
                    <div class="right-box is-visible" id="my-profile">
                        <form action="includes/updateprofile.php" method="POST" class="profile-form">
                            <h1>Basic Information</h1>
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
                            <div class="input-grp">
                                <label>Email</label>
                                <input type="text" placeholder="Email" value="<?php echo $_SESSION['email'] ?? ""; ?>" name="email">
                            </div>
                            <div class="input-grp">
                                <label>Phone Number</label>
                                <input type="text" placeholder="Phone Number" value="<?php echo $_SESSION['phno'] ?? ""; ?>" name="phno">
                            </div>
                            <div class="input-grp"><button name="update-profile">Update</button></div>
                        </form>

                        <form action="includes/updateaddress.php" method="POST" class="profile-form">
                            <h1>Address Information</h1>
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
                            <div class="input-grp"><button name="update-addr">Update</button></div>
                        </form>
                    </div>
                    <div class="right-box" id="my-orders">
                        <div class="order-container">
                            <h1>My Orders</h1>
                            <ul class="order-list">
                                <?php
                                $sql = "SELECT * FROM `orders` WHERE `user_email`='" . $_SESSION['email'] . "' ORDER BY `ordered_at` DESC;";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $order_status_class = $row['order_status'] == "Delivered" ? 'delivered' : ($row['order_status'] == "Placed" ? 'placed' : ($row['order_status'] == "Cancelled" ? 'cancelled' : 'on-the-way'));
                                    $order_status_icon = $order_status_class == 'delivered' ? "fas fa-receipt" : ($order_status_class == 'placed' ? "fas fa-truck-loading" : ($order_status_class == 'on-the-way' ? "fas fa-shipping-fast" : "fas fa-ban"));
                                    my_order_card($row['order_id'], $row['order_status'], $row['ordered_at'], $order_status_class, $order_status_icon);
                                }
                                ?>
                            </ul>
                        </div>

                    </div>
                    <div class="right-box" id="privacy">
                        <form action="includes/changepassword.php" method="POST" class="change-password-form">
                            <h1>Change Password</h1>
                            <div class="input-grp">
                                <label for="password">Old Password</label>
                                <input type="password" placeholder="Password" name="old_password" required />
                            </div>
                            <div class="input-grp">
                                <label for="password">New Password</label>
                                <input type="password" placeholder="Password" name="new_password" required />
                            </div>
                            <div class="input-grp">
                                <label for="password">Confirm Password</label>
                                <input type="password" placeholder="Password" name="c_new_password" required />
                            </div>
                            <div class="input-grp"><button name="change">Change</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once('footer.php') ?>

    <script>
        const currentLocation = location.href;
        const profileLinks = document.querySelectorAll(".a-profile-link");
        const profileBlocks = document.querySelectorAll(".right-box");
        profileLinks.forEach((profileLink, i) => {
            if (profileLink.href === currentLocation) {
                profileLinks[0].classList.remove('is-active');
                profileBlocks[0].classList.remove('is-visible');
                profileLink.classList.add('is-active');
                profileBlocks[i].classList.add('is-visible');
            }
            profileLink.addEventListener('click', function() {
                setTimeout(function() {
                    window.scrollTo(0, window.pageYOffset);
                }, 2);
                profileBlocks.forEach(box => box.classList.remove('is-visible'));
                profileBlocks[i].classList.add('is-visible');
                profileLinks.forEach(link => link.classList.remove('is-active'));
                this.classList.add('is-active');
            });
        });

        function profileUpload() {
            document.querySelector('#profile-image-upload').click();
        }
    </script>

</body>

</html>