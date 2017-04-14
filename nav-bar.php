<?php 
include_once './php/productData/ProductFetcher.php';
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Lola's Room</title>
        <link rel="icon" href="img/lola_upd.png">
        <meta charset="utf-8">
        <meta name="robots" content="all,follow">
        <meta name="googlebot" content="index,follow,snippet,archive">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>       

        <!-- styles -->
        <link href="css/font-awesomeOLD.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">
        <link href="css/owl.carousel.css" rel="stylesheet">
        <link href="css/owl.theme.css" rel="stylesheet">
        
        <!-- theme stylesheet -->
        <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">
        
        <!-- updates -->
        <link href="css/custom.css" rel="stylesheet">
        <link rel="shortcut icon" href="img/lola_upd.png">
        <script 
            src="https://code.jquery.com/jquery-1.12.4.js"
            integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
            crossorigin="anonymous">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        
    </head>
    <body>        
        
            <div id="nav_div" class="nav_div">
                <!-- *** nav start *** -->
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <a class="navbar-brand home" href="index.php" data-animate-hover="">
                            <img src="img/logo.png" alt="Lola logo" class="hidden-xs">
                            <img src="img/logo-small.png" alt="Lola logo" class="visible-xs"><span class="sr-only">Lola's Rooms - go to homepage</span>
                            </a>
                            <div class="navbar-buttons">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                                <span class="sr-only">Toggle navigation</span>
                                <i class="fa fa-align-justify"></i>
                                </button>
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                                <span class="sr-only">Toggle search</span>
                                <i class="fa fa-search"></i>
                                </button>
                                <a class="btn btn-default navbar-toggle" href="#">
                                <i class="fa fa-shopping-cart"></i> <span class="hidden-xs"></span>
                                </a>
                            </div>
                        </div>
                    <div id="main" class="main">
                        <!--/.navbar-header -->
                        <div class="navbar-collapse collapse" id="navigation">
                            <ul class="nav navbar-nav navbar-left">
                                <li id="li_nav_item" class="hoverable"><a href="index.php">Home</a>
                                </li>
                                <li id="li_nav_item" class="dropdown yamm-fw hoverable">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Products <b class="caret"></b></a>
                                    <?php

                                         outputProductCategoriesToDropDown(fetch_product_categories());  
                                    ?>
                                </li>
                                <li id="li_nav_item" class="hoverable">
                                    <a href="./about.php">About</a>
                                </li>
                                <li id="li_nav_item" class="hoverable">
                                    <a href="./brands.php">Our Brands</a>
                                </li>
                            </ul>
                        </div>
                        <!--nav-collapse -->
                        <div class="navbar-buttons">
<!--                            <div class="navbar-collapse collapse right" id="basket-overview">
                                <a href="basket.html" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">0</span></a>
                            </div>-->
                            <!--
                                <!--/.nav-collapse -->
                            <div class="navbar-collapse collapse right" id="search-not-mobile">
                                <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                                <span class="sr-only">Toggle search</span>
                                <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="collapse clearfix" id="search">
                            <form class="navbar-form" role="search" onsubmit="clickAndSearch()">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="nav_search_txt_field" placeholder="Search">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary" id="nav_search_btn"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </nav>

            </div>
            <!-- nav end -->                
    </body>

    <!-- *** SCRIPTS TO INCLUDE ***-->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>
    <script src="js/respond.min.js"></script>
    <script type="text/javascript" src="js/products.js"></script>
</html>