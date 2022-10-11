<?php
session_start();
// with router we can access necessary controller
$router = 'signUp';
include_once "./controller/core.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>project-signUp</title>
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
        <form method="POST" class="signUp-section">
            <h1 class="signUp-title">Sign up</h1>
            <div class="signUp-info">
                In order to purchase from the Students' Union shop, you need to create an account with all fields below required. if you have any difficulties with the from please contact the webmaster
            </div>
            <?php if ($success) { ?>
                <div class="success-ms">
                    <img src="./styles//green-check-mark-2-icon-17.png" while="15px" alt=""> User account created successfuly
                </div>
            <?php } ?>
            <label for="full-name">
                Full name:
                <input required name="name" id="full-name" type="text">
            </label>
            <label for="email">
                Email address:
                <input required name="email" id="email" type="email">
            </label>
            <label for="password">
                Password:
                <div class="pass-info">
                    Must contain at least on number and one uppercase and lowercase letter, and at least 8 or more characters
                </div>
                <input required class="password" name="password" id="password" type="password">
                <div id="eye" class="eye">
                    <img style="display: none;" id="eye-img" src="./styles/password_icon.png" alt="">
                </div>
            </label>
            <div id="validation-pass"></div>
            <label for="confirm">
                Confirm password:
                <input required id="confirm" type="password">
            </label>
            <label for="address">
                Address:
                <input required name="address" class="signUp-address" id="address" type="text">
            </label>
            <button type="submit">Submit</button>
        </form>
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
<?php
global $conn;
$conn = null
?>