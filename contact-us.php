<?php 
    include_once 'php/productData/ProductFetcher.php';
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Lola's Rooms</title>
        <link rel="icon" href="img/lola_upd.png">
        <meta charset="utf-8">
        <meta name="robots" content="all,follow">
        <meta name="googlebot" content="index,follow,snippet,archive">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Obaju e-commerce template">
        <!--<meta name="keywords" content="">-->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
        <!-- styles -->
<!--        <link href="css/font-awesomeOLD.css" rel="stylesheet">-->
        <link rel="stylesheet" href="./css/font-awesome.min.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">
        <link href="css/owl.carousel.css" rel="stylesheet">
        <link href="css/owl.theme.css" rel="stylesheet">
        <!-- theme stylesheet -->
        <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">
        <link href="css/custom.css" rel="stylesheet">
        <script src="js/respond.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/products.js"></script>
    </head>
    <body class="fade-out">
        <!-- Animate -->
        <script>           
            $(function() {
                $('body').removeClass('fade-out');
            });
        </script>
        
        <div id='test'>
            <div class="prelim_stuff" id="prelim_stuff">
                <!-- This section will be used to load the navbar and categories sidebar -->
                <script>
                    $('#prelim_stuff').load('index.php #nav_div');
                </script>
            </div>
            <div class="col-md-3">
            </div>
            <div id="content">
                <div class="container">
                    <section id='main'>
                        <div id="category_body" class="col-md-12">
                            <div class="box">
                                <span>
                                    <h1>Contact Us</h1>
                                </span>
                            </div>
                            <div class="contact_us">
                                <div class="form_contact">
                                    <form id="contact_form" action="mailto:andreamontesin@gmail.com" method="GET">
                                        <div class="row">
                                            <input id="name" class="input" name="name" type="text" value="" 
                                                size="70" placeholder="Your name"/><br/>
                                        </div>
                                        <div class="row">
                                            <input id="email" class="input" name="email" type="text" value="" 
                                                size="70" placeholder="Your email address"/><br/>
                                        </div>
                                        <div class="row">
                                            <textarea id="message" class="input" name="message" rows="10" 
                                                cols="71" placeholder="Your message"></textarea><br/>
                                        </div>
                                        
                                        <input id="submit_button" type="submit" value="Submit" />
                                    </form>						
                                    
                                </div>
                                <div class="social_contact">
                                    <div class="contact_us_section">
                                        <p><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></p>
                                        <p><label class="like_us_text">Like Us</label></p>
                                    </div>

<!--                                    <div class="contact_us_section">   
                                        <p><i class="fa fa-google-plus-official fa-2x" aria-hidden="true"></i></p>
                                        <p><label class="like_us_text">Follow Us</label></p>
                                    </div>-->

                                    <div class="contact_us_section">   
                                        <p><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></p>
                                        <p><label class="like_us_text">Follow Us</label></p>
                                    </div>                                
                                </div>
                            </div>
                    </section>
                    <!-- /.container -->
                </div>
                <!-- /#content -->
            </div>
        </div>
        <!-- /#all -->
        <footer>
            <div id="copyright">
                <!-- *** COPYRIGHT *** -->
            </div>
            <script>
                $('#copyright').load('index.php #copyright');
            </script>
        </footer>
        <!-- *** SCRIPTS TO INCLUDE *** -->
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