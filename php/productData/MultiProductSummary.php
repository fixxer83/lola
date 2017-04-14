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
        echo "<div class=\"product_wrapper_box\"><div class=\"product\">";
        
        // Echo body
        echo "<div id=\"main_image_wrapper\"><a href=\"/lola/product-details.php?product=" . $data["product_code"] . "\">";
        
        if($data["main_image"] == null)
        {
            //No_Image_Available
            echo "<img src=\"img/product_images/noa.png\" alt=\"product image\" class=\"product_grid_image\">";
        }
        else
        {
            echo "<img src=\"img/product_images/" . $data["main_image"] . "\" alt=\"product image\" class=\"product_grid_image\">";
        }
            echo "</a></div>"
            . "<div class=\"text\">"
            . "<h3><a href=\"/lola/product-details.php?product=" . $data["product_code"] . "\">" . ucfirst($data["product_name"]) . "</a></h3>"
            . "<p class=\"price\">€ " . $data["price"] . "</p>"
            . "<p class=\"buttons\">"
            . "<div id=\"combo_details_btn\" class=\"btn-group\" role=\"group\" aria-label=\"combo\">"
            . "<a id=\"combo_details_view\" href=\"/lola/product-details.php?product=" . $data["product_code"] . "\" class=\"btn btn-default\"><i class=\"fa fa-binoculars fa-lg\" aria-hidden=\"true\"></i></a><a href=\"#\" class=\"btn btn-primary\">"
            . "<i id=\"combo_details_cart\" class=\"fa fa-shopping-cart fa-lg\"></i></a>"
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

function outputSingleProductDetails($productCode)
{
    $product_data = fetch_single_product_details($productCode);

    // Validating results
    if(count($product_data) == 0 )
    {
        echo "<h1>Error encountered</h1>";
        
        return;
    }
    
    // Outputting results
    foreach($product_data as $data)
    {
        // Echo product details
        echo "<div class=\"row\" id=\"productMain\">"
        ."<p><h1 class=\"summary_header\">" . ucfirst($data["product_name"]) . "</h1><p>"
        . "<p class=\"goToDescription\"><a href=\"#details\" class=\"scroll-to\">Scroll to product details</a></p>"
        . "<div class=\"box\" id=\"product_box\">"
        . "<div class=\"product_image_summary\">"
        . "<div id=\"mainImage\">";
        
        if($data["main_image"] == null)
        {
            //No_Image_Available
            echo "<img src=\"img/product_images/noa.png\" alt=\"image\" class=\"product_summary_image\">"
            . "</div></div>";
        }
        else
        {
            echo "<img src=\"img/product_images/" . $data["main_image"] . "\" alt=\"image\" class=\"product_summary_image\">"
            . "</div></div>";
        }
        
        // Images
        outputSingleProductImages($data["product_code"], $data["main_image"]);
        
        echo "<p class=\"price\">€ " . $data["price"] . "</p>"
        . "<p class=\"buttons\">"
        . "<div class=\"btn-group\" role=\"group\" aria-label=\"Test\">"
        . "<a href=\"products.php\" onclick=\"navigate('".SessionNameEnum::FULL_PROD_CAT."',"
                    . "'".$_SESSION['full_product_category']."','#".DivEnum::SINGLE_PRODUCT_DIV."','".DivEnum::MULTI_PRODUCT_DIV."')\" class=\"btn btn-default\"><i class=\"fa fa-reply fa-lg\" aria-hidden=\"true\"></i></a><a href=\"basket.html\" class=\"btn btn-primary\">"
        . "<i class=\"fa fa-shopping-cart fa-lg\"></i></a>"
        . "</div>"
        . "<p></p>"
        . "</div>"
        . "<div class=\"box\" id=\"details\"><p>"
        . "<div id=\"product_description\""
        . "<p><h2 style=\"font-weight: bold;\">Product details</h2></p>"
        . "<p>" . ucfirst($data["product_description"]) . "</p><hr></div>"
        . "<div class=\"social\">"
        . "<h4>Share this product</h4>"
        . "<p>"
        . "<div id=\"share_button\" class=\"btn btn-success clearfix\"><i class=\"fa fa-facebook fa-lg\"></i></div>"
//        . "<a id=\"share_button\" href=\"#\""
//        . "class=\"external facebook\" data-animate-hover=\"pulse\"><i class=\"fa fa-facebook\"></i></a>"
//        ."<div class=\"fb-share-button\" data-href=\"#\" data-layout=\"button\" data-size=\"small\""
//        . "data-mobile-iframe=\"true\"><a id=\"share_button\" class=\"fb-xfbml-parse-ignore\" target=\"_blank\" "
//        . "href=\"https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse\">Share</a></div>"
//        . "<a href=\"#\" class=\"external gplus\" data-animate-hover=\"pulse\"><i class=\"fa fa-google-plus\"></i></a>"
//        . "<a href=\"#\" class=\"external twitter\" data-animate-hover=\"pulse\"><i class=\"fa fa-twitter\"></i></a>"
//        . "<a href=\"#\" class=\"email\" data-animate-hover=\"pulse\"><i class=\"fa fa-envelope\"></i></a>"
        . "</p>"  
        . "</div></div></div>";
        
//        <div class="fb-share-button" 
//        data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>
        
    }
}

function outputSingleProductImages($productCode, $mainImage)
{
    
    $product_data = fetch_single_product_images($productCode);
    
    if($mainImage == null)
    {
        $mainImage = "noa.png";
    }
    else
    {
    
        // Validating results
        if(count($product_data) == 0 )
        {
            // Echo main image
            echo "<div class=\"thumb_sm\">"
            . "<a href=\"img/product_images/" . $mainImage . "\" class=\"thumb\">"
            . "<img src=\"img/product_images/" . $mainImage . "\"  alt=\"product image\" class=\"img-responsive\">"
            . "</a></div>"; "<div class=\"thumb_sm\"></div>";

            return;
        }

        echo "<div class=\"row\" id=\"thumbs\">";

        // Echo main image
        echo "<div class=\"thumb_sm\">"
        . "<a href=\"img/product_images/" . $mainImage . "\" class=\"thumb\">"
        . "<img src=\"img/product_images/" . $mainImage . "\"  alt=\"\" class=\"img-responsive\">"
        . "</a></div>";

        // Outputting results
        foreach($product_data as $image)
        {       
            // Echo images
            echo "<div class=\"thumb_sm\">"
            . "<a href=\"img/product_images/" . $image["file_name"] . "\" class=\"thumb\">"
            . "<img src=\"img/product_images/" . $image["file_name"] . "\"  alt=\"product image\" class=\"img-responsive\">"
            . "</a></div>";
        }

        echo "</div>";
    }
}
