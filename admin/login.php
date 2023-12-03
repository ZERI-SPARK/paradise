<!-- PHP Code -->
<?php

require_once '../config.php';

session_start();

if (isset($_POST['submit'])) {
    $admin_user = $_POST['admin_user'];
    $admin_password = $_POST['admin_password'];

    $sql = "SELECT * FROM `admin` WHERE `username`='$admin_user' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($admin_password, $row['password'])) {
            $_SESSION['admin_id'] = $row['admin_id'];
            $_SESSION['admin_fname'] = $row['fname'];
            $_SESSION['admin_lname'] = $row['lname'];
            $_SESSION['admin_uname'] = $row['username'];
            $_SESSION['admin_profile-img'] = $row['profile_img'];
            $_SESSION['Is_Admin'] = 1;
            header("location: dashboard.php");
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
    <link rel="stylesheet" href="../assets/css/login.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins|Monoton|Montserrat&display=swap">

    <!-- Title Logo -->
    <link rel="shortcut icon" href="../assets/images/ParadiseLogo(Title).png" type="image/x-icon">
    <title>Paradise | Admin Login</title>
</head>

<body>
    <div class="container">
        <div class="outer-box">
            <div class="heading">
                <h2 class="h2-heading"><span class="first-letter">M</span>anage</h2>
                <h1 class="h1-heading">The<br>Paradise</h1>
            </div>
            <div class="inner-box">
                <div class="form-content" id="login-content">
                    <header>
                        <h1>Welcome<br>Admin</h1>
                    </header>
                    <section>
                        <form action="" method="POST" class="login-form">
                            <div class="input-group">
                                <label for="username">Username</label>
                                <input type="text" placeholder="Username" name="admin_user" required />
                            </div>
                            <div class="input-group">
                                <label for="password">Password</label>
                                <input type="password" placeholder="Password" name="admin_password" required />
                            </div>
                            <div class="input-group"><button name="submit">Login</button></div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</body>

</html>