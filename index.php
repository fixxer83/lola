<?php 
include_once './php/productData/ProductFetcher.php';
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" href="img/lola_upd.png">
        <meta charset="utf-8">
        <meta name="robots" content="all,follow">
        <meta name="googlebot" content="index,follow,snippet,archive">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="">
        <title>Lola's Room</title>
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
        
        <!-- updates -->
        <link href="css/custom.css" rel="stylesheet">
        <script src="js/respond.min.js"></script>
        <script src="js/products.js"></script>
        <link rel="shortcut icon" href="favicon.png">
        <script 
            src="https://code.jquery.com/jquery-1.12.4.js"
            integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
            crossorigin="anonymous">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>
    <body>
        
        <script>
//            
//            $(window).bind('beforeunload', function(e) { 
//                return "Are you sure you want to return to the homepage?"
//                e.preventDefault();
//            });
//            
//            
//            $(document).ready(function(){
//                $(document).on("keydown", disableF5);
//            });
//            
//            // slight update to account for browsers not supporting e.which
//            function disableF5(e) { if ((e.which || e.keyCode) == 116) e.preventDefault(); };
//            // To disable f5
//                /* jQuery < 1.7 */
//            $(document).bind("keydown", disableF5);
//            /* OR jQuery >= 1.7 */
//            $(document).on("keydown", disableF5);
//
//            // To re-enable f5
//                /* jQuery < 1.7 */
//            $(document).unbind("keydown", disableF5);
//            /* OR jQuery >= 1.7 */
//            $(document).off("keydown", disableF5);
        </script>
        
        
        
        <div id="main" class="main">
            <!-- *** nav start *** -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a class="navbar-brand home" href="index.php" data-animate-hover="">
                        <img src="img/logo.png" alt="Lola logo" class="hidden-xs">
                        <img src="img/logo-small.png" alt="Lola logo" class="visible-xs"><span class="sr-only">Lola - go to homepage</span>
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
                            <a class="btn btn-default navbar-toggle" href="basket.html">
                            <i class="fa fa-shopping-cart"></i> <span class="hidden-xs"></span>
                            </a>
                        </div>
                    </div>
                    
                    <!--/.navbar-header -->
                    <div class="navbar-collapse collapse" id="navigation">
                        <ul class="nav navbar-nav navbar-left">
                            <li class="active"><a href="index.php">Home</a>
                            </li>
                            <li class="dropdown yamm-fw">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Products <b class="caret"></b></a>
                                <?php
                                    
                                     outputProductCategoriesToDropDown(fetch_product_categories());  
                                ?>
                            </li>
                            <li class="hoverable">
                                <a href="#">About</a>
                            </li>
                            <li class="hoverable">
                                <a href="#">Our Brands</a>
                            </li>
                        </ul>
                    </div>
                    <!--nav-collapse -->
                    <div class="navbar-buttons">
                        <div class="navbar-collapse collapse right" id="basket-overview">
                            <a href="basket.html" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">0</span></a>
                        </div>
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
                        <form class="navbar-form" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </nav>
            <!-- nav end -->                
            
            <!-- *** page_content Start*** -->
            <div class="page_content" id="page_content">
                
                <div id="product_content" style="display:none">
                    <!-- category_1.php will be loaded in this div -->
                </div>
                
                <div id="product_detail" style="display:none">
                    <!-- detail_1.php will be loaded in this div -->
                </div>
                
                <div id="hide">
                    <div id="carousel_content">
                        <div class="container">
                            <div class="col-md-12">
                                <div id="main-slider">
                                    <div class="item">
                                        <img class="img-responsive" src="img/slider_items/wide/img001.png" alt="toys" style="width: 100%; height: 550px; padding: 20px;">
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="img/slider_items/wide/img002.png" alt="toys" style="width: 100%; height: 550px; padding: 20px;">
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="img/slider_items/wide/img003.png" alt="toys" style="width: 100%; height: 550px; padding: 20px;">
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="img/slider_items/wide/img004.png" alt="toys" style="width: 100%; height: 550px; padding: 20px;">
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src="img/slider_items/wide/img005.png" alt="toys" style="width: 100%; height: 550px; padding: 20px;">
                                    </div>
                                </div>
                                <!-- /#main-slider -->
                            </div>
                        </div>
                        
                        <!-- *** ADVANTAGES HOMEPAGE ***-->
                        <div id="advantages">
                            <div class="container">
                                <div class="same-height-row">
                                    <div class="col-sm-4">
                                        <div class="box same-height clickable">
                                            <div class="icon"><i class="fa fa-heart"></i>
                                            </div>
                                            <h3><a href="#">We love our customers</a></h3>
                                            <p>We strive to provide best possible service ever</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="box same-height clickable">
                                            <div class="icon"><i class="fa fa-tags"></i>
                                            </div>
                                            <h3><a href="#">Best prices</a></h3>
                                            <p>We aim to provide the best prices ever</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="box same-height clickable">
                                            <div class="icon"><i class="fa fa-thumbs-up"></i>
                                            </div>
                                            <h3><a href="#">Quality guaranteed</a></h3>
                                            <p>We try to choose the best brands ever</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container -->
                        </div>
                    </div>
                </div>
                <!-- *** page_content End *** -->
            </div>
        </div>
        <!-- /#all -->        
    </body>
    <footer>
        <!-- *** COPYRIGHT *** -->
        <div id="copyright" class="col-lg-12">
            <p>
                <script>
                    var today = new Date();
                    document.write(today.getFullYear());
                </script> 
                © Copyright Andrea Montesin<a href="#" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
            </p>
            <p>    
                <!-- Bootstrapious-->
                Template design by <a href="http://bootstrapious.com/e-commerce-templates">Bootstrapious</a> with support from <a href="https://kakusei.cz">Kakusei</a>
            </p>
        </div>
        <!-- *** COPYRIGHT END *** -->
    </footer>
    <!-- *** SCRIPTS TO INCLUDE ***-->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>
</html>