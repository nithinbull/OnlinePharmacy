<?php

// require MySQL Connection
require ('database/DBController.php');

// require Product Class
require ('database/Product.php');

require ('database/cart.php');

require ('database/Admin.php');

// DBController object
$db = new DBController();

// Product object
$product = new Product($db);
// get the product shuffle for using in all pages.
$product_shuffle =$product->getData();

$Cart= new Cart($db);

$admin= new Admin($db);



