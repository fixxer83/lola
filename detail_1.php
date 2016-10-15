<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
   <head>
       
      <meta charset="utf-8">
      <meta name="robots" content="all,follow">
      <meta name="googlebot" content="index,follow,snippet,archive">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="Obaju e-commerce template">
      <meta name="keywords" content="">
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
      
      <!-- styles -->
      <link href="css/font-awesome.css" rel="stylesheet">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/animate.min.css" rel="stylesheet">
      <link href="css/owl.carousel.css" rel="stylesheet">
      <link href="css/owl.theme.css" rel="stylesheet">
      
      <!-- theme stylesheet -->
      <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">
      
      <!-- your stylesheet with modifications -->
      <link href="css/custom.css" rel="stylesheet">
      <script src="js/respond.min.js"></script>
      
      <!-- Updates -->
      <script src="js/products.js"></script>
      
   </head>
   <body>
      <div id="all">
         <div id="content">
            <div id="single_product_details" class="single_product">
                              
                  <!-- To output product details -->
                  <?php
                     include_once './php/productData/MultiProductSummary.php';
                     
                     $product_number = $_SESSION['product_number'];
                     
                     outputSingleProductDetails($product_number);
                     ?>
            </div>
         </div>
      </div>
      <!-- *** SCRIPTS TO INCLUDE ***
         _________________________________________________________ -->
      <script src="js/jquery-1.11.0.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.cookie.js"></script>
      <script src="js/waypoints.min.js"></script>
      <script src="js/modernizr.js"></script>
      <script src="js/bootstrap-hover-dropdown.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/front.js"></script>
   </body>
</html>