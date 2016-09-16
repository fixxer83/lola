<?php

include (__DIR__ . '\mysql\Connection.php');

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


function outputProductCategories($product_categories)
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
            echo "<li id=\"" . $comp_id .  "\"><a href='#'>" . ucfirst($sub_category["sub_cat_name"]) . "</a></li>";
        }
    }
    
    echo "</ul>";
}
   
