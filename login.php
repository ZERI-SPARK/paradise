<!-- PHP Code -->
<?php

require_once 'config.php';

session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE `email`='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    // echo "<script> alert('" . print_r($result) . "') </script>";
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['uid'] = $row['uid'];
            $_SESSION['fname'] = $row['fname'];
            $_SESSION['lname'] = $row['lname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['phno'] = $row['phone_number'];
            $_SESSION['acc_created_at'] = $row['created_at'];
            $_SESSION['profile-img'] = $row['profile_img'];

            $address['addr1'] = $row['address1'];
            $address['addr2'] = $row['address2'];
            $address['city'] = $row['city'];
            $address['pincode'] = $row['pincode'];
            $_SESSION['address'] = $address;
            header("location: index.php");
            // echo "<pre>";
            // print_r($_SESSION['address']);
            // echo "</pre>";
        } else {
            echo "<script> alert('Password is Wrong!') </script>";
        }
    } else {
        echo "<script> alert('Account does not exists!') </script>";
    }
}

?>

<!-- HTML Code -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins|Monoton|Montserrat&display=swap">

    <!-- Title Logo -->
    <link rel="shortcut icon" href="./assets/images/ParadiseLogo(Title).png" type="image/x-icon">
    <title>Paradise | Login</title>
</head>

<body>
    <div class="container">
        <div class="outer-box">
            <div class="heading">
                <h2 class="h2-heading"><span class="first-letter">E</span>nter</h2>
                <h1 class="h1-heading">The<br>Paradise</h1>
            </div>
            <div class="inner-box">
                <div class="form-content" id="login-content">
                    <header>
                        <h1>Welcome back</h1>
                    </header>
                    <section>
                        <form action="" method="POST" class="login-form">
                            <div class="input-group">
                                <label for="username">Email</label>
                                <input type="text" placeholder="Email" name="email" pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" title="Please use a valid email" value="<?php echo $email ?? ""; ?>" required />
                            </div>
                            <div class="input-group">
                                <label for="password">Password</label>
                                <input type="password" placeholder="Password" name="password" required />
                            </div>
                            <div class="input-group"><button name="submit">Login</button></div>
                        </form>
                    </section>
                    <footer>
                        <p>Don't have an account? <a href="register.php" title="Create Account">Create a new one</a></p>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</body>

</html>