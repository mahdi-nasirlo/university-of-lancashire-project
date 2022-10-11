<?php

// include database connection configuration
include_once './config/config.php';
include_once './lib/function.php';

// make logout functionality with get request 
if (isset($_GET['logOut'])) {
    $_SESSION['isLogin'] = false;
    header("location: /~szarei");
}

$isLogin = isset($_SESSION['isLogin']) ? $_SESSION['isLogin'] : false;


// with custom router You limit each page to its own information
if ($router === 'productsList') {
    // get products
    if (isset($_GET['search']) or isset($_GET['type'])) {
        $type = isset($_GET['type']) ? $_GET['type'] : '';
        $search = isset($_GET['search']) ? $_GET['search'] : '';

        $products =   filterProduct($search, $type);
    } else
        $products = select([], constant("PRODUCT"));
}

if ($router === 'productItem') {
    // if user get product item Manualy, redirect him to 404 page 

    $rating = [5 => 'Excellent', 4 => "Very Good", 3 => "Good", 2 => "Middling", 1 =>  "Terrible"];
    if (isset($_GET['id'])) {
        if (isset($_POST['title']) and isset($_POST['title']) and isset($_POST['rating'])) {
            $data = [
                'product_id' => $_GET['id'],
                "review_title" => $_POST['title'],
                "review_desc" => $_POST['comment'],
                "review_rating" => $_POST['rating'],
                "review_timestamp" => date("Y-m-d h:i:sa")
            ];
            $insert = insert(constant("REVIEW"), $data);
        }

        $reviews = select(array('product_id' => $_GET['id']), constant("REVIEW"));
        $product = select(array('product_id' => $_GET['id']),  constant("PRODUCT"));

        $sumRating = 0;
        foreach ($reviews as $review) {
            $sumRating += $review['review_rating'];
        }
        $avrageRating = $sumRating != 0 ? round($sumRating / count($reviews)) : 0;


        if (count($product) > 0) {
            // if user get product item with right product id show product details
            $product = $product[0];
        } else
            // if user get product item with Incorrect product id, redirect him to 404 page
            header("location: /web%20application/404.php");
    } else
        header("location: /web%20application/404.php");
}

if ($router === 'index') {
    $offers = select([], constant("OFFER"));
}

if ($router === 'cart') {
    $userValidation = $isLogin  ? select(['user_id' => $_SESSION['userId']], constant("USER")) : "";

    if (isset($_POST['email']) and isset($_POST['password'])) {
        $condition = [
            "user_email" =>  $_POST['email'],
        ];
        $userValidation = select($condition, constant("USER"));
        if (count($userValidation) > 0 and password_verify($_POST['password'], $userValidation[0]['user_pass'])) {
            $_SESSION['isLogin'] = true;
            $isLogin = true;
            $_SESSION['userId'] = $userValidation[0]['user_id'];
        } else {
            $_SESSION['isLogin'] = false;
            $isLogin = false;
        }
    }
}

if ($router === 'signUp') {
    $success = false;
    if (!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['address']) and !empty($_POST['password'])) {
        $data = [
            "user_full_name" => $_POST['name'],
            "user_address" => $_POST['address'],
            "user_email" => $_POST['email'],
            "user_pass" =>   password_hash($_POST['password'], PASSWORD_DEFAULT),
            "user_timestamp" => date("Y-m-d h:i:sa")
        ];
        $insert =  insert(constant("USER"), $data);
        if ($insert) {
            $success = true;
        } else
            $success = false;
    }
}
