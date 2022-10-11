<?php
session_start();
// with router we can access necessary controller
$router = 'index';
include_once "./controller/core.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>project-home</title>
</head>

<body>
    <!-- header start -->
    <header id="header" class="header">
        <!-- Nav start -->
        <nav class="nav">
            <div class="LeftContainer">
                <img class="nav-logo" src="./images/logo.svg" alt="logo" />
                <h1 class="nav-title">
                    Student Shop
                </h1>
            </div>
            <div class="rightContainer">
                <ul class="nav-list">
                    <a href="./index.php">
                        <li class="button-one">
                            Home
                        </li>
                    </a>
                    <a href="./products.php">
                        <li class="button-one">
                            Products
                        </li>
                    </a>
                    <a href="./cart.php">
                        <li class="button-one">
                            Cart
                        </li>
                    </a>
                    <a href="<?php echo $isLogin ? "?logOut=true" : "./signUp.php" ?>">
                        <li class="button-one">
                            <?php echo $isLogin ? "log out" : "sign up" ?>
                        </li>
                    </a>
                </ul>
                <!-- menu icon -->
                <div onclick="clickbtn()" id="menuButton" class="menu-icon-container button-one">
                    <img class="menu-icon" src="./images/menu-icon.png" alt="menu-icon">
                </div>
            </div>
        </nav>
        <!-- Nav end -->
        <!-- mobile-list start -->
        <div id="mobileList" class="mobile-list-container">
            <ul class="mobile-list">
                <a href="./index.php">
                    <li class="button-one">
                        Home
                    </li>
                </a>
                <a href="./products.php">
                    <li class="button-one">
                        Products
                    </li>
                </a>
                <a href="./cart.php">
                    <li class="button-one">
                        Cart
                    </li>
                </a>
                <a href="<?php echo $isLogin ? "?logOut=true" : "./signUp.php" ?>">
                    <li class="button-one">
                        <?php echo $isLogin ? "log out" : "sign up" ?>
                    </li>
                </a>
            </ul>
        </div>
        <!-- mobile-list end -->
    </header>
    <!-- header end -->

    <!-- main start -->
    <main id="main" class="main">
        <section class="offer-section">
            <h3 class="offer-title">Offers</h3>
            <div class="main-offers">
                <?php foreach ($offers as $offer) { ?>
                    <div class="main-offer">
                        <div class="main-offer-title">
                            <?php echo $offer['offer_title'] ?>
                        </div>
                        <div class="main-offer-desc"><?php echo $offer['offer_dec'] ?></div>
                    </div>
                <?php } ?>
            </div>
        </section>
        <div class="main-banner">
            <h1 class="main-banner-title">Where opportunity creates success</h1>
            <P class="main-banner-info">
                Every student at The University of Central Lancashire is automatically a member of the Students' Union.

                We're here to make life better for students - inspiring you to succeed and achieve your goals.
            </P>
            <p class="main-banner-info">
                Everything you need to know about UCLan Students' Union. Your membership stats here.
            </p>
        </div>
        <section class="video-section-one">
            <h3 class="video-title">Together</h3>
            <div class="video-container">
                <!--  video "html element"  -->
                <video id="h-video" width="100%" height="100%" controls>
                    <source src="./video/V-1.mp4" type="video/mp4">
                    this message Show when browser does not support the video tag.
                </video>
            </div>
        </section>
        <section class="video-section-Two">
            <h3 class="video-title">Join our global community</h3>
            <div class="video-container">
                <!--  youtube video  -->
                <iframe id="y-video" width="100%" height="100%" src="https://www.youtube.com/embed/juKd26qkNAw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
            </div>
        </section>
    </main>
    <!-- main end -->
    <!-- footer start -->
    <footer id="footer" class="footer">
        <div class="footer-links">
            <h3 class="footer-title">Links</h3>
            <a href="#">
                <h4>Students'Union</h4>
            </a>
        </div>
        <div class="footer-contact">
            <h3 class="footer-title">Contact</h3>
            <h4>Email: suinformation@uclan.ac.uk</h4>
            <h4>Phone: 01772 89 3000</h4>
        </div>
        <div class="footer-location">
            <h3 class="footer-title">Location</h3>
            <h4>University of Central Lancashire Students' Union.</h4>
            <h4>Fylde Road, preston.PR17BY</h4>
            <h4>Registered in England</h4>
            <h4>Company Number: 7623917</h4>
            <h4>Registered Charity Number: 1142616</h4>
        </div>
    </footer>
    <!-- footer end -->

    <!-- script -->
    <script src="./js/script.js"></script>
</body>

</html>