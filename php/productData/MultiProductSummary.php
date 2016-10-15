<?php

include_once (__DIR__ . '\ProductFetcher.php');

/**
 * This method may be used to output the
 * product data in the product
 * summary page
 * 
 * @param type $fullProductCategory
 * @return type
 */
function outputProductData($fullProductCategory)
{
    
    $product_data = fetch_product_data($fullProductCategory);
    
    // Validating results
    if(count($product_data) == 0 )
    {
        echo "Error encountered";
        
        return;
    }
    
    // Outputting results
    foreach($product_data as $data)
    {       
        // Echo header
        echo "<div class=\"col-md-4 col-sm-6\"><div class=\"product\">";
        
        // Echo body
        echo "<a href=\"detail_1.php\">"
            . "<img src=\"img/product_images/" . $data["main_image"] . "\" alt=\"product image\" class=\"img-responsive\">"
            . "</a>"
            . "<div class=\"text\">"
            ."<h3><a href=\"#\" onclick=\"initiateSessionAndSetDivs('" . SessionNameEnum::SINGLE_PROD_NUM . "', ". $data["id"] . ", '#" . DivEnum::MULTI_PRODUCT_DIV . "',"
                . "'" . DivEnum::SINGLE_PRODUCT_DIV .  "' )\">" . ucfirst($data["product_name"]) . "</a></h3>"
            . "<p class=\"price\">€ " . $data["price"] . "</p>"
            . "<p class=\"buttons\">"
            ."<div class=\"btn-group\" role=\"group\" aria-label=\"Test\">"
            . "<a href=\"#\" onclick=\"initiateSessionAndSetDivs('" . SessionNameEnum::SINGLE_PROD_NUM . "', ". $data["id"] . ", '#" . DivEnum::MULTI_PRODUCT_DIV . "',"
                . "'" . DivEnum::SINGLE_PRODUCT_DIV .  "' )\" class=\"btn btn-default\">View detail</a><a href=\"basket.html\" class=\"btn btn-primary\">"
            . "<i class=\"fa fa-shopping-cart\"></i></a>"
            . "</div></p>";
        
        // Echo footer
        echo "</div>"
            . "</div>"
            . "</div>";   
    }
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
        . "<a href=\"#\" onclick=\"initiateSessionAndSetDivs('".SessionNameEnum::FULL_PROD_CAT."',"
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
        . "<h4>Share this product</h4>"
        . "<p>"
        . "<a href=\"#\" class=\"external facebook\" data-animate-hover=\"pulse\"><i class=\"fa fa-facebook\"></i></a>"
        . "<a href=\"#\" class=\"external gplus\" data-animate-hover=\"pulse\"><i class=\"fa fa-google-plus\"></i></a>"
        . "<a href=\"#\" class=\"external twitter\" data-animate-hover=\"pulse\"><i class=\"fa fa-twitter\"></i></a>"
        . "<a href=\"#\" class=\"email\" data-animate-hover=\"pulse\"><i class=\"fa fa-envelope\"></i></a>"
        . "</p>"  
        . "</div></div></div>";
        
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
