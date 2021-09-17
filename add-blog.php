<?php
session_start();
if(!$_SESSION['loggedin']) {
    header("location:login.php"); 
    die(); 
  }
  
ob_start();
include('admin-header.php');
?>

<?php
include('Template/_blog-form.php');
?>

<?php 
include('footer.php');
?>