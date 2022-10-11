<?php
session_start();
// with router we can access necessary controller
$router = 'productItem';
include_once "./controller/core.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>project-Item</title>
</head>

<body>
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
    <!-- main start -->
    <main id="main" class="main">
        <!-- product information -->
        <section id="itemSection" class="item-section">
            <div class="item">
                <div class="item-image-container">
                    <img class="item-image" src="./<?php echo $product['product_image'] ?>" alt="item-image">
                </div>
                <div class="item-info-container">
                    <h4 class="item-name">
                        <?php echo $product['product_title'] ?>
                    </h4>
                    <h5 class="item-info">
                        <?php echo $product['product_desc'] ?> </h5>
                    <h5 class="item-price">
                        <?php echo $product['product_price'] ?>
                    </h5>
                    <button onclick="addItem(event)" data-type="<?php echo $product['product_type'] ?>" data-id=<?php echo $product['product_id'] ?> data-img="<?php echo $product['product_image'] ?>" data-name="<?php echo $product['product_title'] ?>" data-price="<?php echo $product['product_price'] ?>">
                        Buy
                    </button>
                </div>
        </section>
        <!-- product information -->
        <!-- comment section -->
        <?php if (count($reviews) > 0) { ?>
            <div class="average">
                <?php
                echo "Average Rating: " . $avrageRating;
                ?>
            </div>
            <?php foreach ($reviews as $review) { ?>
                <div class="comment-itme">
                    <div class="comment-itme-tilte">
                        <?php echo $review['review_title'] ?>
                    </div>
                    <div class="comment-itme-desc">
                        <?php echo $review['review_desc'] ?>
                    </div>
                    <div class="comment-itme-rating">
                        <?php echo $rating[$review['review_rating']] ?>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
        <?php if ($isLogin) { ?>
            <form class="comment-form" method="POST">
                <div class="item-comment-container">
                    <div class="comment-div">
                        <label class="lable-title-comment" for="title-comment">Title
                            <input name="title" type="text" id="title-comment">
                        </label>
                        <label class="lable-rating-comment" for="rating-comment">Rating
                            <select name="rating" id="rating-comment">
                                <option value="5">Excellent</option>
                                <option value="4">Very good</option>
                                <option value="3">Good</option>
                                <option value="2">Middling</option>
                                <option value="1">Terrible</option>
                            </select>
                        </label>
                    </div>
                    <label class="lable-info-comment" for="info-comment">Comment
                        <input name="comment" type="text" id="info-comment">
                    </label>
                </div>
                <button class="comment-submit-btn" type="submit">submit</button>
            </form>
        <?php  } ?>
        <!-- comment section -->
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