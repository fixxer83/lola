<?php 
include_once 'php/productData/ProductFetcher.php';
session_start(); 
?>
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
    <script>
        
        $("#content").submit(function(e) {
            e.preventDefault();
        });
    
    </script>
    
    <div class="col-md-3">
        <!-- *** MENUS AND FILTERS ***-->
        <div class="panel panel-default">

            <div class="panel-heading">
                <h1 class="panel-title">Categories</h1>
            </div>

            <div class="panel-body">
                <?php

                    outputProductCategoriesToSideBar(fetch_product_categories());
                ?>
            </div>
        </div>
        <!-- *** MENUS AND FILTERS END *** -->
    </div>

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a>
                        </li>
                        
                        <?php
                            $category= explode("_", $_SESSION['full_product_category']);
                        
                            echo "<li><a href=\"#\">" . ucfirst($category[1]) . "</a></li>";
                        ?>
                    </ul>
                </div>
                
                <div id="all">
                <div id="category_body" class="col-md-12">
                    <div class="box">
                        <?php
                           
                            $category= explode("_", $_SESSION['full_product_category']);
                            
                            echo "<h1>" . ucfirst($category[1]) . "</h1>";
                        ?>
                        
                        <div class="products-sort-by">
                            <select name="sort-by" class="form-control">
                                <option>Sort by</option>
                                <option>Price Descending</option>
                                <option>Price Ascending</option>
                                <option>Name</option>
                                <option>Newest</option>
                            </select>
                            
                            <p class="loadMore">
                            
                            
                        <div class="products-number">
                            <a href="#" class="btn btn-default btn-sm btn-primary">12</a>
                            <a href="#" class="btn btn-default btn-sm">24</a>  
                            <a href="#" class="btn btn-default btn-sm">All</a>
                            <strong>&nbsp;12</strong> of <strong>25</strong>
                        </div>
                        </p>
                            
                        </div>
                        
                    </div>

                    <div class="row products">
                        
                        <?php
                            include './php/productData/MultiProductSummary.php';
                           
                            $fullProductCategory = $_SESSION['full_product_category'];
                            
                            outputProductData($fullProductCategory);
                        ?>
                        
                    </div>
                    <!-- /.products -->

                    <div class="pages">

                        <ul class="pagination">
                            <li><a href="#">&laquo;</a>
                            </li>
                            <li class="active"><a href="#">1</a>
                            </li>
                            <li><a href="#">2</a>
                            </li>
                            <li><a href="#">3</a>
                            </li>
                            <li><a href="#">4</a>
                            </li>
                            <li><a href="#">5</a>
                            </li>
                            <li><a href="#">&raquo;</a>
                            </li>
                        </ul>
                    </div>


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
    </div>
    <!-- /#all -->

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