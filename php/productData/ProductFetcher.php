<?php

include (__DIR__ . '\..\mysql\Connection.php');
include (__DIR__ . '\..\enums\ClassEnum.php');
include (__DIR__ . '\..\enums\SessionNameEnum.php');
include (__DIR__ . '\..\enums\DivEnum.php');

/**
 * 
 * @return type
 */
function fetch_product_categories()
{    
    // To be changed later
    $conn = connect("127.0.0.1", "root", "", "lolas_room");
   
    // Query
    $result = mysqli_query($conn, "Select Distinct(c.category) From product_category c
                                   Join product_sub_category s
                                   On c.id = s.product_category_id
                                   Where c.is_enabled=1 order by c.category Asc");
    
    if(mysqli_num_rows($result) > 0)
    {
        // Kill connection
        mysqli_close($conn);
        
       return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    
    // Cleanup
    mysqli_free_result($result);
    mysqli_close($conn);
}

/**
 * This method may be used to output categories
 * to the nav drop-down list
 * 
 * @param type $product_categories
 * @return type
 */
function outputProductCategoriesToDropDown($product_categories)
{
    // Validating results
    if(count($product_categories) == 0 )
    {
        echo "Error encountered";
        
        return;
    }
    
    echo "<ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenu3\">";
    
    // Outputting results
    foreach($product_categories as $category)
    {       
        // Echo category
        echo "<li class=\"dropdown-header\">" . ucfirst($category["category"]) . "</li>";
        
        $sub_categories = fetch_product_sub_categories($category["category"]);

        foreach($sub_categories as $sub_category)
        {
            // Set key
            $comp_id = $category["category"] . "_" . $sub_category["sub_cat_name"];
            
            // Echo sub category
            echo "<li id=\"" . $comp_id .  "\" class=\"" . ClassEnum::Category_Click_Class . "\" onclick=\"initiateSessionAndSetDivs('".SessionNameEnum::FULL_PROD_CAT."',"
                    . "'".$comp_id."','#".DivEnum::INDEX_DIV."','".DivEnum::MULTI_PRODUCT_DIV."')\"><a href='#'>"
                    . ucfirst($sub_category["sub_cat_name"]) . "</a></li>";
        }
    }
    
    echo "</ul>";
}

/**
 * This method may be used to output categories
 * to the side-bar menu
 * 
 * @param type $product_categories
 * @return type
 */
function outputProductCategoriesToSideBar($product_categories)
{
    // Validating results
    if(count($product_categories) == 0 )
    {
        echo "<li class=\"list-group-item-heading\"><a href=\"category.html\">No categories to show at the moment</a></li>";
        
        return;
    }
    
    // Outputting results
    foreach($product_categories as $category)
    {       
        // Echo category
        echo "<ul class=\"list-group\"><li class=\"list-group-item-heading\"><a href=\"category.html\" >" . ucfirst($category["category"]) . "</a></li>";
        
        $sub_categories = fetch_product_sub_categories($category["category"]);

        foreach($sub_categories as $sub_category)
        {
            // Set key
            $comp_id = $category["category"] . "_" . $sub_category["sub_cat_name"];
            
            // Echo sub category
            echo "<li class=\"list-group-item " . ClassEnum::Category_Click_Class ."\" id=\"" . $comp_id . "\" onclick=\"initiateSessionAndSetDivs('".SessionNameEnum::FULL_PROD_CAT."',"
                    . "'".$comp_id."','#".DivEnum::INDEX_DIV."','".DivEnum::MULTI_PRODUCT_DIV."')\"><a href='#'>" . ucfirst($sub_category["sub_cat_name"]) . "</a></li>";
        }
        
        echo "</ul>";
    }
}

/**
 * 
 * @param type $category
 * @return type
 */
function fetch_product_sub_categories($category)
{
    
    // To be changed later
    $conn = connect("127.0.0.1", "root", "", "lolas_room");
   
    // Query
    $result = mysqli_query($conn,"Select s.id, s.sub_cat_name, s.product_category_id From product_sub_category s
                                  Join product_category c
                                  On s.product_category_id = c.id
                                  Where s.is_enabled=1 AND c.is_enabled=1 AND c.category=\"" .$category . "\" Order by s.product_category_id");
    
    if(mysqli_num_rows($result) > 0)
    {
        // Kill connection
        mysqli_close($conn);
        
       return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    
    // Cleanup
    mysqli_free_result($result);
    mysqli_close($conn);
}

/**
 * 
 * @param type $fullCategory
 * @return type
 */
function fetch_product_data($fullCategory)
{
    $category= explode("_", $fullCategory);
    
    // To be changed later
    $conn = connect("127.0.0.1", "root", "", "lolas_room");
   
    // Query
    $result = mysqli_query($conn,"SELECT s.id, s.product_name, s.price, s.main_image FROM stock_item s
        JOIN product_sub_category c ON s.product_sub_category_id = c.id
        JOIN product_category p ON c.product_category_id = p.id
        WHERE p.category =\"" . $category[0] . "\" AND c.sub_cat_name=\"" . $category[1] . "\";");
    
    if(mysqli_num_rows($result) > 0)
    {
        // Kill connection
        mysqli_close($conn);
        
       return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    
    // Cleanup
    mysqli_free_result($result);
    mysqli_close($conn);
}

/**
 * 
 * @param type $singleProductId
 * @return type
 */
function fetch_single_product_details($singleProductId)
{    
    // To be changed later
    $conn = connect("127.0.0.1", "root", "", "lolas_room");
   
    // Query
    $result = mysqli_query($conn,"SELECT * FROM stock_item WHERE id=\"" . $singleProductId . "\";");
    
    if(mysqli_num_rows($result) > 0)
    {
        // Kill connection
        mysqli_close($conn);
        
       return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    
    // Cleanup
    mysqli_free_result($result);
    mysqli_close($conn);
}

/**
 * 
 * @param type $singleProductId
 * @return type
 */
function fetch_single_product_images($singleProductId)
{    
    // To be changed later
    $conn = connect("127.0.0.1", "root", "", "lolas_room");
   
    // Query
    $result = mysqli_query($conn,"SELECT * FROM stock_item_image WHERE stock_item_id=\"" . $singleProductId . "\";");
    
    if(mysqli_num_rows($result) > 0)
    {
        // Kill connection
        mysqli_close($conn);
        
       return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    
    // Cleanup
    mysqli_free_result($result);
    mysqli_close($conn);
}


   
