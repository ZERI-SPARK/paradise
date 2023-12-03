<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/contact-us.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Title Logo -->
    <link rel="shortcut icon" href="./assets/images/ParadiseLogo(Title).png" type="image/x-icon">
    <title>Paradise | Contact Us</title>
</head>

<body>
    <header>
        <?php include('header.php') ?>
    </header>

    <section class="contactContainer">
        <div class="contactBody">
            <div class="contactHeading">
                <h2 class="h2-heading"><span class="first-letter">C</span>ontact</h2>
                <h1 class="h1-heading">Us</h1>
            </div>
        </div>
        <div class="infoContainer">
            <div class="contactInfo">
                <ul>
                    <li>
                        <span><i class="fas fa-map-marked-alt"></i></span>
                        <span>
                            <h2>Address</h2><br>
                            <a href="https://maps.google.com?q=48.8583736,2.2922926" target="_blank">Shop No. - 48, Sector-19, <br>Market 1, Main Najafgarh Road, <br>Delhi, <br>India</a>
                        </span>
                    </li>
                    <li>
                        <span><i class="fas fa-phone-alt"></i></span>
                        <span>
                            <h2>Phone</h2><br>
                            <a href="tel:9512024436">+91 9512024436</a><br>
                            <a href="tel:7925893453">+91 7925893453</a>
                        </span>
                    </li>
                    <li>
                        <span><i class="fas fa-envelope"></i></span>
                        <span>
                            <h2>Email</h2><br>
                            <a href="mailto:theparadise@gmail.com">theparadise@gmail.com</a>
                        </span>
                    </li>
                </ul>
            </div>
            <form action="" method="POST" class="contactForm">
                <h1>Get in Touch with Us</h1>
                <div class="input-grp">
                    <label>Name</label>
                    <input type="text" placeholder="Name" name="fullname" value="<?php echo $fullname = isset($_SESSION['email']) ? $_SESSION['fname'] . " " . $_SESSION["lname"] : ""; ?>">
                </div>
                <div class="input-grp">
                    <label>Email</label>
                    <input type="text" placeholder="Email" name="email" pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" title="Please use a valid email" value="<?php echo $_SESSION['email'] ?? ""; ?>" required />
                </div>
                <div class="input-grp">
                    <label>Message</label>
                    <textarea placeholder="Type your message.... (Max. 250 words)" name="message" required></textarea>
                </div>
                <div class="input-grp"><button name="send">Send</button></div>
            </form>
        </div>
    </section>

    <?php include('footer.php') ?>
</body>

</html>


<?php

if (isset($_POST['send'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO `queries`(`full_name`, `email`, `message`) VALUES ('$fullname','$email','$message')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script> alert('Thank You for Contacting Us!') </script>";
    } else {
        echo "<script> alert('Woops! Something went Wrong.') </script>";
    }
}

?>