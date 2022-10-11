<?php
session_start();

// with router we can access necessary controller
$router = 'cart';
include_once "./controller/core.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>project-cart</title>
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
        <!-- cart page -->
        <section <?php if ($isLogin) { ?> userName="<?php echo $userValidation[0]['user_full_name'] ?>" userAddress="<?php echo $userValidation[0]['user_address'] ?>" userEmail="<?php echo $userValidation[0]['user_email'] ?>" <?php  } ?> id="toggleCheckout" class="cart-page-section">
            <h1 id="cartTittle" class="cart-page-title">
                Shopping Cart
            </h1>
            <h3 id="cartInfo" class="cart-page-info">
                <?php
                echo $isLogin & isset($_SESSION['userId']) ? "Welcome " . $userValidation[0]['user_full_name'] : "" ?> The items you've added to your shopping cart are:
            </h3>

            <div id="cartItem" class="cart-page-items-container">
                <!-- cart item start -->
                <table id="cConteainer">
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Product</th>
                    </tr>

                </table>
                <!-- cart item end -->
                <?php if ($isLogin) {  ?>
                    <button id="checkoutBtn" onclick="checkout()" class="checkout-btn">Checkout</button>
                <?php } ?>
            </div>
        </section>
        <!-- check if login not show login form -->
        <?php if (!$isLogin) { ?>
            <section class="cart-login-section ">
                <h3 class="cart-login-info">
                    in order check out you most log in
                </h3>
                <!-- start login form -->
                <form class="login-form" method="post">
                    <label for="login-email">Email address:</label>
                    <input name="email" class="login-input" type="email" id="login-email" required>

                    <!-- <label for="login-password">Password:</label> -->
                    <!-- <input name="password" id="password-field" class="login-input" type="password" id="login-password" required> -->

                    <label class="password-input" for="password">
                        Password::
                        <input class="login-input password" required name="password" id="password" type="password">
                        <div id="eye" class="eye">
                            <img style="display: none;" id="eye-img" src="./styles/password_icon.png" alt="">
                        </div>
                    </label>
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    <button class="login-btn" type="submit">submit</button>
                </form>
                <!-- end login form -->
            </section>
        <?php } ?>
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