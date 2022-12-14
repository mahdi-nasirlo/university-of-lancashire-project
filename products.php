<?php
session_start();
// with router we can access necessary controller
$router = 'productsList';
include_once "./controller/core.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">

    <title>project-products</title>
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
        <form class="product-search" action="" method="GET">
            <input name="search" class="input-search" type="text" placeholder="search..">
            <button class="btn-search">search</button>
        </form>
        <div class="products-category">
            <button class="filter-product">
                <a href="?type=UCLan Logo Tshirt">t-shirts</a>
            </button>
            <button class="filter-product" href="#">
                <a href="?type=UCLan Hoodie">hoodies</a>
            </button>
            <button class="filter-product" href="#">
                <a href="?type=UCLan Logo Jumper">jumpers</a>
            </button>
        </div>
        <!-- go to top button in product page start -->
        <a href="#header" class="go-top-button">
            Top
        </a>
        <!-- go to top button in product page end -->
        <div id="product-container" class="products-container">
            <!-- print all product in view part -->
            <?php foreach ($products as $product) {
            ?>
                <!-- product start -->
                <div class="product">
                    <div class="product-image-container">
                        <img class="product-image" src="<?php echo $product['product_image'] ?>" alt="product-image">
                    </div>
                    <div class="product-info-container">
                        <h4 class="product-name">
                            <?php echo $product['product_title'] ?>
                        </h4>
                        <h5 class="product-info">
                            <?php echo $product['product_desc'] ?>
                            <a href="./item.php?id=<?Php echo $product['product_id'] ?>">
                                Read More
                            </a>
                        </h5>
                        <h5 class="product-price">
                            <?php echo $product['product_price']
                            ?>
                        </h5>
                        <button data-type="<?php echo $product['product_type'] ?>" data-price="<?php echo $product['product_price'] ?>" data-name="<?php echo $product['product_title'] ?>" data-img="<?php echo $product['product_image'] ?>" data-id="<?php echo $product['product_id'] ?>" onclick="addItem(event)">
                            Buy
                        </button>
                    </div>
                </div>
                <!-- product end -->
            <?php } ?>
        </div>
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