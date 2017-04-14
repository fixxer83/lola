<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
   <head>
    <title>Lola's Room</title>
    <link rel="icon" href="img/lola_upd.png">
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="keywords" content="">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--<script type="text/javascript" src="//connect.facebook.net/en_US/sdk.js"></script>-->
      
   </head>
   <body class="fade-out">
        <!-- Animate -->
        <script>           
            $(function() {
                $('body').removeClass('fade-out');
            });
        </script>
        
        <div id="fb-root"></div>
        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8&appId=1724560197864207";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
       
    <div class="prelim_stuff" id="prelim_stuff">
        <!-- This section will be used to load the navbar and categories sidebar -->        
         <script>
            $('#prelim_stuff').load('index.php #nav_div');
        </script>
    </div>
       
      <div id="all">
         <div id="content">
            <div id="single_product_details" class="single_product">
                              
                  <!-- To output product details -->
                  <?php
                     include_once './php/productData/MultiProductSummary.php';
                     
                        if (isset($_GET['product'])) {
                            $product_code =  $_GET['product'];
                            
                            outputSingleProductDetails($product_code);
                        }else{
                            
                            echo "<h1>Error encounterd, please try again later.</h1>";
                        }                     
                     ?>
                  
<!--                <script>
                    document.getElementById('share_button').onclick = function() {
                       // window.fbAsyncInit() = function() {
                            
                            FB.ui({
                              method: 'share',
                              app_id: '1724560197864207',
                              display: 'popup',
                              href: window.location.href,
                            }, function(response){});
                      //  }
                    };
                </script>-->
            </div>
         </div>
      </div>
       
    <footer>
        <div id="copyright">
            <!-- *** COPYRIGHT *** -->
        </div>
        <script>
            $('#copyright').load('index.php #copyright');
        </script>
    </footer>
       
      <!-- *** SCRIPTS TO INCLUDE ***
         _________________________________________________________ -->
      <!--<script src="js/jquery-1.11.0.min.js"></script>-->
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.cookie.js"></script>
      <script src="js/waypoints.min.js"></script>
      <script src="js/modernizr.js"></script>
      <script src="js/bootstrap-hover-dropdown.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/front.js"></script>
   </body>
</html>