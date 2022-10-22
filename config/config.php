<?php

$servername = "localhost";
$username = "root";
$dbname = "szarei";
$password = "";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// data base tables
define("PRODUCT", "tbl_products");
define("OFFER", "tbl_offers");
define("USER", "tbl_users");
define("REVIEW", "tbl_reviews");
