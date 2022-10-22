در این پروژه که با  **php pure** توسعه یافته است سعی بر این بوده که با استفاده از کمترین کتابخانه ها و با تسلط کامل بر تمام چالش های توسعه پروژه پیاده سازی شده است. معماری بکار رفته در این پروژه **mvc** است که سطح model این پروژه برای ایجاد توسعه پذیری بیشتر از کتابخانه استفاده شده است
از ویژگی های این پروژه که با php و javascript خالص پیدا شده است : 

- صفحه ورود و ثبت نام با سشن ها 
- سبد خرید با استفاده از جاوااسکریپت 
- نمایش محصولات با استفاده از **api** با جاوااسکریپت خالص  ( در پروژه ای مجزا )
- ایجاد کامنت ها و سیستم امتیاز دهی به هر محصول 
- نمایش زنده پیشنهادات در صفحه اصلی

# Uclan student's union shop

Uclan student's union shop is designed to be fully responsive

This site contains four pages named index.php, products.php, item.php, cart.php

## index.php

path : ./index.php

The home page of the site is index.php

index.php includes homepage information and two videos

First video: "php video element"

The second video is "youtube video" which uses iframe

The script.js file is loaded as the javascript code of this page
The style.css file is loaded as the main styling file of this page in the head section

## products.php

path : ./products.php

The products page of the site is products.php
product categories and a list of all products are on this page

Each of the products displayed in the product list includes the product image, product name, product information and price, and the "buy" key that adds the product to the cart.

The script.js file is loaded as the javascript code of this page
The style.css file is loaded as the main styling file of this page in the head section

## item.php

path : ./item.php

The item page of the site is ./item.php
This page shows the product selected on the product page via the read more button

The product displayed on this page includes a large image, product name, product information and price, and a "buy" button that adds the product to the cart.

The product selected on the products page with the "readmore" key is added to the session storage and displayed on the item.php page

The script.js file is loaded as the javascript code of this page
The style.css file is loaded as the main styling file of this page in the head section

## cart.php

path : ./cart.php

The item page of the site is ./cart.php
The cart page contains a list of products that have been added to the cart by the user

Any product that is selected on the products page or item page with the "buy" button is added to local storage and the cart.php page in
"List of products added to the card" displays them

The script.js file is loaded as the javascript code of this page
The style.css file is loaded as the main styling file of this page in the head section

## core.php

path : ./controller/core.php

It forms the core of the application and prevents the creation of information by routing
This page manages all php pages and plays a model role in mvc design

All the necessary information on the page is called in this page

The config.php file is loaded as the php conection config in this page

## config.php

path : ./config/config.php

This page configures the php connection to the mysql database with the PDO method
The page contains information of database tables

## function.php

path : ./lib/function.php

This page have functions that executes queries in the database and organizes the results
The function.php contains two more common functions called insert and select

And a product filter function that can be filtered in two ways

## script.js

path : scripts/script.js

script.js contains javascript code for various sections of the site, including:

- Function related to the key to open the list in pages with mobile size "mobile-menu"

- The section related to the display of all products in product.php

- The section for displaying products added to the card and displaying them in cart.php
  (Clicking the "buy" button adds product information to localStorage and then displays it in the cart.php page.)

- The section for adding a product to the item.php page
  (Clicking "readmore" on the products.php page will add product information to the sessionStorage and then display it on the item.php page.)

script.js is loaded in index.php, products.php, cart.php, script.js, styles.css files

# style.css

path : scripts/style.css

style.css describe how php elements are displayed on the screen

Styles related to different pages of the site are in style.css

Site styles are defined for different screen dimensions (mobile, tablet, computer) and the site is fully responsive
The main colors of the site are initially defined style.css file and are used in different parts of the site

style.css is loaded in index.php, products.php, cart.php, script.js, styles.css files

# Other site files

> images : ./images

> videos : ./video
