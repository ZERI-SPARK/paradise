<?php

require_once 'config.php';

if (isset($_POST['submit'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
    $cpass = $_POST['cpass'];

    if (password_verify($cpass, $pass)) {
        $sql = "SELECT * FROM `users` WHERE `email`='$email'";
        $result = mysqli_query($conn, $sql);
        if (!mysqli_num_rows($result) > 0) {
            $sql = "INSERT INTO `users`(`fname`, `lname`, `email`, `password`) 
            VALUES ('$fname','$lname','$email','$pass')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $fname = "";
                $lname = "";
                $email = "";
                $_POST['pass'] = "";
                $cpass = "";
                echo "
                    <script>
                        alert('Account Created!');
                        window.location.href ='login.php';
                    </script>";
            } else {
                echo "<script> alert('Woops! Something went Wrong..') </script>";
            }
        } else {
            echo "<script> alert('Account already exists with this Email!') </script>";
        }
    } else {
        echo "<script> alert('Password Not Matched.') </script>";
    }
}

?>



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
    <title>Paradise | Register</title>
</head>




<body>
    <div class="container">
        <div class="outer-box">
            <div class="heading">
                <h2 class="h2-heading"><span class="first-letter">E</span>nter</h2>
                <h1 class="h1-heading">The<br>Paradise</h1>
            </div>
            <div class="inner-box">
                <div class="form-content" id="register-content">
                    <header>
                        <h1>Create An Account</h1>
                    </header>
                    <section>
                        <form action="" method="POST" class="login-form">
                            <div class="input-row">
                                <div class="input-group">
                                    <label for="name">First Name</label>
                                    <input type="text" placeholder="First Name" name="fname" value="<?php echo $fname ?? ""; ?>" required />
                                </div>
                                <div class="input-group">
                                    <label for="name">Last Name</label>
                                    <input type="text" placeholder="Last Name" name="lname" value="<?php echo $lname ?? ""; ?>" required />
                                </div>
                            </div>
                            <div class="input-group">
                                <label for="email">Email</label>
                                <input type="text" placeholder="Email" name="email" pattern="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" title="Please use a valid email" value="<?php echo $email ?? ""; ?>" required />
                            </div>
                            <div class="input-group">
                                <label for="password">Password</label>
                                <input type="password" placeholder="Password" name="pass" required />
                            </div>
                            <div class="input-group">
                                <label for="confirm-password">Confirm Password</label>
                                <input type="password" placeholder="Confirm Password" name="cpass" required />
                            </div>
                            <div class="input-group"><button name="submit">Register</button></div>
                        </form>
                    </section>
                    <footer>
                        <p>Already have an account? <a href="login.php" title="Login">Click Here</a></p>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</body>

</html>