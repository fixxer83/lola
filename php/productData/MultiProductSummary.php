<?php

include_once (__DIR__ . '\ProductFetcher.php');
include_once (__DIR__ . '\Paginator.php');
include_once (__DIR__ . '\..\session\SetSession.php');

/**
 * This method may be used to output the
 * product data in the product
 * summary page
 * 
 * @param type $fullProductCategory
 * @return type
 */
function outputProductData($fullProductCategory, $itemLimit)
{
    
    $product_data = fetch_product_data($fullProductCategory, $itemLimit);
        
    // Validating results
    if(count($product_data) == 0)
    {
        echo "<h1>No items found</h1>";
        
        return 0;
    }
    
    // Outputting results
    foreach($product_data as $data)
    {       
        // Echo header
        echo "<div class=\"col-md-4 col-sm-6\"><div class=\"product\">";
        
        // Echo body
        echo "<a href=\"item-details.php\">"
            . "<img src=\"img/product_images/" . $data["main_image"] . "\" alt=\"product image\" class=\"img-responsive\">"
            . "</a>"
            . "<div class=\"text\">"
            ."<h3><a href=\"/lola/item-details.php\" onclick=\"navigate('" . SessionNameEnum::SINGLE_PROD_NUM . "', ". $data["id"] . ", '#" . DivEnum::MULTI_PRODUCT_DIV . "',"
                . "'" . DivEnum::SINGLE_PRODUCT_DIV .  "' )\">" . ucfirst($data["product_name"]) . "</a></h3>"
            . "<p class=\"price\">€ " . $data["price"] . "</p>"
            . "<p class=\"buttons\">"
            ."<div class=\"btn-group\" role=\"group\" aria-label=\"Test\">"
            . "<a href=\"/lola/item-details.php\" onclick=\"navigate('" . SessionNameEnum::SINGLE_PROD_NUM . "', ". $data["id"] . ", '#" . DivEnum::MULTI_PRODUCT_DIV . "',"
                . "'" . DivEnum::SINGLE_PRODUCT_DIV .  "' )\" class=\"btn btn-default\">View detail</a><a href=\"#\" class=\"btn btn-primary\">"
            . "<i class=\"fa fa-shopping-cart\"></i></a>"
            . "</div></p>";
        
        // Echo footer
        echo "</div>"
            . "</div>"
            . "</div>";   
    }
    
    return $product_data;
}

/**
 * 
 * @param type $count
 * @return type
 */
function outputNumberPageNumbers($count)
{
    if($count <=1)
    {
        return null;
    }
    
    echo"<form name=\"pagination_form\">"
    . "<ul class=\"pagination\">"
    . "<li class=\"chevron_left\"><a href=\"#\"><i class=\"fa fa-chevron-left\" aria-hidden=\"true\"></i></a></li>";
    
    for($i=1; $i<=$count; $i++)
    {
        if($i<=12)
        {
            if($i == 1)
            {
                echo "<li id=\"page" .$i . "\" class=\"page\"><a href=\"?page=" . $i . "\" onclick=\"setSession(\"page_number\", \"page_" . $i ."\">" . $i . "</a></li>";
            }
            else
            {
               echo "<li id=\"page" .$i . "\" class=\"page\"><a href=\"?page=" . $i . "\" onclick=\"setSession(\"page_number\", \"page_" . $i ."\">" . $i . "</a></li>"; 
            }
        }
        
    }
    echo "<li class=\"chevron_right\"><a href=\"#\"><i class=\"fa fa-chevron-right\" aria-hidden=\"true\"></i></a></li>"
        ."</ul></form>";    
}

function outputSingleProductDetails($id)
{
    $product_data = fetch_single_product_details($id);

    // Validating results
    if(count($product_data) == 0 )
    {
        echo "Error encountered";
        
        return;
    }
    
    // Outputting results
    foreach($product_data as $data)
    {
        // Echo product details
        echo "<div class=\"col-md-7\">"
        . "<div class=\"row\" id=\"productMain\">"
        . "<div class=\"col-sm-6\">"
        . "<div id=\"mainImage\">"
        . "<img src=\"img/product_images/" . $data["main_image"] . "\" alt=\"test\" class=\"img-responsive\">"
        . "</div></div>"
                
        . "<div class=\"col-sm-6\">"
        . "<div class=\"box\" id=\"product_box\">"
        . "<h1 class=\"text-center\">" . ucfirst($data["product_name"]) . "</h1>"
        . "<p class=\"goToDescription\"><a href=\"#details\" class=\"scroll-to\">Scroll to product details</a></p>"
        . "<p class=\"price\">€ " . $data["price"] . "</p>"
        . "<p class=\"buttons\">"
        . "<div class=\"btn-group\" role=\"group\" aria-label=\"Test\">"
        . "<a href=\"products.php\" onclick=\"navigate('".SessionNameEnum::FULL_PROD_CAT."',"
                    . "'".$_SESSION['full_product_category']."','#".DivEnum::SINGLE_PRODUCT_DIV."','".DivEnum::MULTI_PRODUCT_DIV."')\" class=\"btn btn-default\">Back</a><a href=\"basket.html\" class=\"btn btn-primary\">"
        . "<i class=\"fa fa-shopping-cart\"></i></a>"
        . "</div>"
        . "</p>"
        . "</div>";
        
        // Images
        outputSingleProductImages($data["id"], $data["main_image"]);

        echo "</div></div>"
        . "<div class=\"box\" id=\"details\"><p>"
        . "<div id=\"product_description\""
        . "<p><h2 style=\"font-weight: bold;\">Product details</h2></p>"
        . "<p>" . ucfirst($data["product_description"]) . "</p><hr></div>"
        . "<div class=\"social\">"
//        . "<h4>Share this product</h4>"
//       . "<p>"
//        . "<a href=\"#\" class=\"external facebook\" data-animate-hover=\"pulse\"><i class=\"fa fa-facebook\"></i></a>"
//        ."<div class=\"fb-share-button\" data-href=\"https://developers.facebook.com/docs/plugins/\" data-layout=\"button\" data-size=\"small\""
//        . "data-mobile-iframe=\"true\"><a class=\"fb-xfbml-parse-ignore\" target=\"_blank\" "
//        . "href=\"https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse\">Share</a></div>"
//        . "<a href=\"#\" class=\"external gplus\" data-animate-hover=\"pulse\"><i class=\"fa fa-google-plus\"></i></a>"
//        . "<a href=\"#\" class=\"external twitter\" data-animate-hover=\"pulse\"><i class=\"fa fa-twitter\"></i></a>"
//        . "<a href=\"#\" class=\"email\" data-animate-hover=\"pulse\"><i class=\"fa fa-envelope\"></i></a>"
//        . "</p>"  
        . "</div></div></div>";
        
//        <div class="fb-share-button" 
//        data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>
        
    }
}

function outputSingleProductImages($productImages, $mainImage)
{
    
    $product_data = fetch_single_product_images($productImages);
    
    // Validating results
    if(count($product_data) == 0 )
    {
        // Echo main image
        echo "<div class=\"col-xs-4\">"
        . "<a href=\"img/product_images/" . $mainImage . "\" class=\"thumb\">"
        . "<img src=\"img/product_images/" . $mainImage . "\"  alt=\"\" class=\"img-responsive\">"
        . "</a></div>"; "<div class=\"col-xs-4\"></div>";
        
        return;
    }
    
    echo "<div class=\"row\" id=\"thumbs\">";
    
    // Echo main image
    echo "<div class=\"col-xs-4\">"
    . "<a href=\"img/product_images/" . $mainImage . "\" class=\"thumb\">"
    . "<img src=\"img/product_images/" . $mainImage . "\"  alt=\"\" class=\"img-responsive\">"
    . "</a></div>";
    
    // Outputting results
    foreach($product_data as $image)
    {       
        // Echo images
        echo "<div class=\"col-xs-4\">"
        . "<a href=\"img/product_images/" . $image["file_name"] . "\" class=\"thumb\">"
        . "<img src=\"img/product_images/" . $image["file_name"] . "\"  alt=\"\" class=\"img-responsive\">"
        . "</a></div>";
    }
    
    echo "</div>";
}
