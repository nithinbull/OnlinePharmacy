<?php 
session_start();

if(!$_SESSION['loggedin']) {
    header("location:login.php"); 
    die(); 
  }
  
ob_start();
include('header.php');
?>

<?php

//include the cart partial template.
count($product->getData('orders',$_SESSION['user_id'])) ? include ('Template/_orders.php') :  include ('Template/notFound/_order_notFound.php');
//include the blogs template.
include('Template/_blogs.php');
?>

<?php 
include('footer.php');
?>