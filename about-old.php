<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
        height: 100vh;
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
        <div class="aboutInfoContainer">
            adzahjhkds
        </div>
    </section>

    <?php include('footer.php') ?>
</body>

</html>