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
include('Template/_order-table.php'); 
?> 

<?php 
include('admin-footer.php'); 
?> 