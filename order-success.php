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
include('Template/_order-success.php');
//include the blogs template.
include('Template/_blogs.php');
?>

<?php 
include('footer.php');
?>