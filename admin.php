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

include('Template/_product-table.php');

?>

<?php 
if(count($admin->getDataAdmin())<=6)
include('admin-footer.php');
else
include('footer.php');

?>