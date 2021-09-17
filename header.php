<?php
require('functions.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Pharmacy</title>

  
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <!-- Font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
</head>

<!-- Start header-->
<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <a class="navbar-brand" href="#">Online Pharmacy</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" >
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
        <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
              <li class="active dropdown-submenu ">
              <a href="#" class="dropdown-toggle font-size-16 px-2 text-white" style="text-decoration: none;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="nav-label"><?php echo $_SESSION['username']?></span></a>
              <ul class="dropdown-menu " style="right:3px; left:auto; background-color: #AAFF99; " >
                <li class="nav-link active font-size-16 px-2 "> <a href="logout.php" style="text-decoration: none; color:black;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Logout</a></li>
                <li class="nav-link active font-size-16 px-2 "> <a href="your-orders.php" style="text-decoration: none; color:black;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Your orders</a></li>
                <li class="nav-link active font-size-16 px-2 "> <a href="reset-password.php" style="text-decoration: none; color:black;">&nbsp&nbsp&nbsp Reset Password</a></li>
              </ul>
              </li>
               
            </ul>
        <form action="#" class="font-size-14 ">
              <a href="cart.php" class="py-2 rounded-pill color-primary-bg" style="text-decoration:none">
                <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count($product->getData('cart',$_SESSION['user_id'])); ?></span>
              </a>
            </form>
            </div>
      </nav>
</header>
<!-- !Start header-->