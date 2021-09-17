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
include('Template/_product.php');
include('Template/_blogs.php');
?>

<?php 
include('footer.php');
?>