<?php
require ('../database/DBController.php');

// require Product Class
require ('../database/Product.php');

require ('../database/cart.php');
$db = new DBController();

// Product object
$product = new Product($db);

$cart = new Cart($db);


if(isset($_POST['value'])){
    $data = $cart->updateQuantity($_POST['itemid'],$_POST['value']);
    echo json_encode($data);
}   

if (isset($_POST['itemid'])){
    $result = $product->getProduct($_POST['itemid']);
    echo json_encode($result);
}
