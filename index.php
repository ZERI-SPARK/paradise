<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Stylesheet CSS -->
    <link rel="stylesheet" href="assets/css/index.css">
    <!-- Title Logo -->
    <link rel="shortcut icon" href="./assets/images/ParadiseLogo(Title).png" type="image/x-icon">
    <title>Paradise | Home</title>
</head>

<body>
    <header>
        <?php include('header.php') ?>
    </header>

    <!-- section Header -->
    <div class="wrapper">
        <section class="landing-page" id="landing-page">
            <div class="bannerVideo">
                <video src="assets/videos/restaurant_1080p_trimmed.mp4" autoplay muted loop></video>
            </div>
            <div class="container">
                <h2 class="sub-headline"><span class="first-letter">W</span>elcome</h2>
                <h1 class="headline">The Paradise</h1>
                <div class="headline-desc">
                    <div class="separator">
                        <div class="line line-left"></div>
                        <div class="asterisk"><i class="fas fa-asterisk"></i></div>
                        <div class="line line-right"></div>
                    </div>
                    <div class="single-animation">
                        <h5>Enjoy your Stay</h5>
                        <a href="#" class="btn cta-btn" onclick="window.scrollTo(0, window.innerHeight);">Explore</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="services">
            <div class="service_title">
                <h2 class="sub-headline"><span class="first-letter">O</span>ur</h2>
                <h1 class="headline">Services</h1>
            </div>
            <div class="service-list">
                <div class="service-card 1">
                    <div class="card_image"> <img src="./assets/images/Service1.jpg" /> </div>
                    <div class="card_title">
                        <h2>Experienced Chefs</h2>
                    </div>
                </div>

                <div class="service-card 2">
                    <div class="card_image">
                        <img src="./assets/images/Service2.jpg" />
                    </div>
                    <div class="card_title">
                        <h2>Fast Delivery</h2>
                    </div>
                </div>

                <div class="service-card 3">
                    <div class="card_image">
                        <img src="./assets/images/Service3.jpg" />
                    </div>
                    <div class="card_title">
                        <h2>Fresh & Hygenic Food</h2>
                    </div>
                </div>

                <div class="service-card 4">
                    <div class="card_image">
                        <img src="./assets/images/Service4.jpg" />
                    </div>
                    <div class="card_title">
                        <h2>Friendly Staff</h2>
                    </div>
                </div>

            </div>
        </section>

        <section class="special-Tab">
            <div class="special_title">
                <h2 class="sub-headline"><span class="first-letter">O</span>ur</h2>
                <h1 class="headline">Specials</h1>
            </div>
            <div class="special-dishes">
                <div class="special-card 1">
                    <div class="special-img"><img src="./assets/images/Special1.jpg" alt=""></div>
                    <div class="special-details">
                        <h3>Punjabi Thali</h3>
                        <p>Lassi, Rice, Papad, Salad, Paratha, Dahi, Shahi Paneer, Dal Makhani, Khadhi Paneer, Gulab Jamunm, Chatni</p>
                    </div>
                </div>
                <div class="special-card 2">
                    <div class="special-img"><img src="./assets/images/Special2.jpg" alt=""></div>
                    <div class="special-details">
                        <h3>Assamese Thali</h3>
                        <p>Amitar Khar, Bilahi Boror Tenga, Lao Aloo Pitika, Lusi/Lucy, Plain Organic Rice, Koldil Bhaaji, Baremehali Xaak Bhaji, Sanmeholi Chutney, Gooror Payash</p>
                    </div>
                </div>
                <div class="special-card 3">
                    <div class="special-img"><img src="./assets/images/Special3.jpg" alt=""></div>
                    <div class="special-details">
                        <h3>U.P. Special Thali</h3>
                        <p>Poori, Mixi Poori, Mattar Paneer, Kheer, Aloo Fry, Dahi Bada, Rice, Salad, Chutney, Sweets</p>
                    </div>
                </div>
                <div class="special-card 4">
                    <div class="special-img"><img src="./assets/images/Special4.jpg" alt=""></div>
                    <div class="special-details">
                        <h3>Rajasthani Thali</h3>
                        <p>Baati, Moong Dal, Goond ki Ladoo, Gatte ki Kadhi, Kesar Malai Lassi, Churma, Chatni</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="quote-box">
            <p>&ldquo;To eat is a necessity, <br><span>but to eat intelligently is an art.&rdquo;</span></p>
        </section>

        <section class="gallery">
            <div class="img-container">
                <div class="gallery-img 1"><img src="./assets/images/Gallery1.jpg" alt="gallery-pic_1"></div>
                <div class="gallery-img 2"><img src="./assets/images/Gallery2.jpg" alt="gallery-pic_2"></div>
                <div class="gallery-img 3"><img src="./assets/images/Gallery3.jpg" alt="gallery-pic_3"></div>
                <div class="gallery-img 4"><img src="./assets/images/Gallery4.jpg" alt="gallery-pic_4"></div>
                <div class="gallery-img 5"><img src="./assets/images/Gallery5.jpg" alt="gallery-pic_5"></div>
                <div class="gallery-img 6"><img src="./assets/images/Gallery6.jpg" alt="gallery-pic_6"></div>
                <div class="gallery-img 6"><img src="./assets/images/Gallery7.jpg" alt="gallery-pic_7"></div>
                <div class="gallery-img 6"><img src="./assets/images/Gallery8.jpg" alt="gallery-pic_8"></div>
            </div>
        </section>
    </div>

    <?php include('footer.php'); ?>

</body>

</html>