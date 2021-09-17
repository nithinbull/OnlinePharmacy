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
count($product->getData('cart')) ? include ('Template/_cart.php') :  include ('Template/notFound/_cart_notFound.php');
//include the blogs template.
include('Template/_blogs.php');
?>

<?php 
include('footer.php');
?>