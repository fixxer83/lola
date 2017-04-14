<?php

include (__DIR__ . '\..\mysql\Connection.php');
include (__DIR__ . '\..\enums\ClassEnum.php');
include (__DIR__ . '\..\enums\SessionNameEnum.php');
include (__DIR__ . '\..\enums\DivEnum.php');
include_once (__DIR__ . '\Paginator.php');

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
    
    echo "<ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenu3\">"
    . "<li class=\"dropdown-header\">All items</li>"
    . "<li id=\"all_all\" class=\"" . ClassEnum::Category_Click_Class . "\" onclick=\"navigate('".SessionNameEnum::FULL_PROD_CAT."',"
                    . "'all items_all items', 'null')\"><a href='/lola/products.php?page=1'>"
                    . "All items</a></li>";
    
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
            echo "<li id=\"" . $comp_id .  "\" class=\"" . ClassEnum::Category_Click_Class . "\" onclick=\"navigate('".SessionNameEnum::FULL_PROD_CAT."',"
                    . "'".$comp_id."', 'null')\"><a href='/lola/products.php?page=1'>"
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
        echo "<li class=\"list-group-item-heading\"><a href=\"products.php?page=1\">No categories to show at the moment</a></li>";
        
        return;
    }
    echo "<ul class=\"list-group\"><li class=\"list-group-item-heading\"><span class=\"list_heading\">All items</span></li>"
        . "<li id=\"all_all\" class=\"list-group-item " . ClassEnum::Category_Click_Class . "\" onclick=\"navigate('".SessionNameEnum::FULL_PROD_CAT."',"
                    . "'all items_all items', 'null')\"><a href='/lola/products.php?page=1'>"
                    . "All items</a></li></ul>";
    // Outputting results
    foreach($product_categories as $category)
    {       
        // Echo category
        echo "<ul class=\"list-group\"><li class=\"list-group-item-heading\"><span class=\"list_heading\">" . ucfirst($category["category"]) . "</span></li>";
        
        $sub_categories = fetch_product_sub_categories($category["category"]);

        foreach($sub_categories as $sub_category)
        {
            // Set key
            $comp_id = $category["category"] . "_" . $sub_category["sub_cat_name"];
            
            // Echo sub category
            echo "<li class=\"list-group-item " . ClassEnum::Category_Click_Class ."\" id=\"" . $comp_id . "\" onclick=\"navigate('".SessionNameEnum::FULL_PROD_CAT."',"
                    . "'".$comp_id."', 'null')\"><a href='/lola/products.php?page=1'>" . ucfirst($sub_category["sub_cat_name"]) . "</a></li>";
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
    $conn = connect();
    
    // Validate connection
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
   
    // Query
    $query = "Select s.id, s.sub_cat_name, s.product_category_id From product_sub_category s
             Join product_category c
             On s.product_category_id = c.id
             Where s.is_enabled=1 AND c.is_enabled=1 AND c.category = ? Order by s.product_category_id";
    
    // Prepare
    $stmt = $conn->stmt_init();
    $stmt->prepare($query);
    
    if($stmt === false) 
    {
        trigger_error('Wrong SQL: ' . $query . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
    }
    
    // Bind params
    $stmt->bind_param("s", $category);
    $result;
    
    if($stmt->execute())
    {
       $result = $stmt->get_result();
       $result->fetch_array(MYSQLI_ASSOC);
    }
    else
    {
        return;
    }
    
    // Cleanup
    // Kill connection
    $stmt->close();
    mysqli_close($conn);
    
    return $result;
}

/**
 * 
 * @param type $fullCategory
 * @return type
 */
function fetch_product_data($fullCategory, $itemLimitPerPage)
{
    $category= explode("_", $fullCategory);
    $searchTerm = explode(" : ", $category[1]);
    $count = 0;
    
    if(sizeof($searchTerm) > 1)
    {
        // Getting page count and setting its session
        $count = countRecords($category, $searchTerm[1]);  
    }
    else
    {
        // Getting page count and setting its session
        $count = countRecords($category, NULL); 
    }
    
    getNumberOfPagesAndSetSession($count["total"], $itemLimitPerPage);
    
    // To be changed later
    $conn = connect("127.0.0.1", "root", "", "lolas_room");  
    
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
      
    $start = ($page > 1) ? ($page * $itemLimitPerPage) - $itemLimitPerPage : 0;
    
    // Query
    if(($category[0] == "all items") && (sizeof($searchTerm) > 1))
    {
        $result = mysqli_query($conn,"SELECT s.id, s.product_name, s.product_code, s.price, s.main_image FROM stock_item s
        JOIN product_sub_category c ON s.product_sub_category_id = c.id
        JOIN product_category p ON c.product_category_id = p.id
        WHERE s.stock_level >= 1 AND s.is_active=1 AND s.product_name LIKE '%" . $searchTerm[1] . "%'
        LIMIT {$start},{$itemLimitPerPage};");
        
    }
    else if($category[0] == "all items")
    {
       $result = mysqli_query($conn,"SELECT s.id, s.product_name, s.product_code, s.price, s.main_image FROM stock_item s
        JOIN product_sub_category c ON s.product_sub_category_id = c.id
        JOIN product_category p ON c.product_category_id = p.id
        WHERE s.stock_level >= 1 AND s.is_active=1
        LIMIT {$start},{$itemLimitPerPage};");
       
    } else{
        
    $result = mysqli_query($conn,"SELECT s.id, s.product_name, s.product_code, s.price, s.main_image FROM stock_item s
        JOIN product_sub_category c ON s.product_sub_category_id = c.id
        JOIN product_category p ON c.product_category_id = p.id
        WHERE p.category =\"" . $category[0] . "\" AND c.sub_cat_name=\"" . $category[1] . "\"
        AND s.stock_level >= 1 AND s.is_active=1
        LIMIT {$start},{$itemLimitPerPage};");
    }

    if(mysqli_num_rows($result) > 0)
    {
        // Kill connection
        mysqli_close($conn);
        
       return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    else
    {
       // Kill connection
        mysqli_close($conn);
        
       return; 
    }
    
    // Cleanup
    mysqli_free_result($result);
    mysqli_close($conn);
}

/**
 * 
 * @param type $category
 * @return type
 */
function countRecords($category, $searchTerm)
{
    // To be changed later
    $conn = connect("127.0.0.1", "root", "", "lolas_room"); 
    
    // Query
    if(($category[0] == "all items") && ($searchTerm != NULL))
    {
        $result = mysqli_query($conn,"SELECT COUNT(s.id) AS total FROM stock_item s
        JOIN product_sub_category c ON s.product_sub_category_id = c.id
        JOIN product_category p ON c.product_category_id = p.id
        WHERE s.stock_level >= 1 AND s.is_active=1 AND s.product_name LIKE '%" . $searchTerm . "%';");
        
    }
    else if($category[0] == "all items")
    {
       $result = mysqli_query($conn,"SELECT COUNT(s.id) AS total FROM stock_item s
        JOIN product_sub_category c ON s.product_sub_category_id = c.id
        JOIN product_category p ON c.product_category_id = p.id
        WHERE s.stock_level >= 1 AND s.is_active=1");
       
    } else{
        
    $result = mysqli_query($conn,"SELECT COUNT(s.id) AS total FROM stock_item s
        JOIN product_sub_category c ON s.product_sub_category_id = c.id
        JOIN product_category p ON c.product_category_id = p.id
        WHERE p.category =\"" . $category[0] . "\" AND c.sub_cat_name=\"" . $category[1] . "\"
        AND s.stock_level >= 1 AND s.is_active=1;");
    }
    
    $count = mysqli_fetch_assoc($result);

    // Cleanup
    mysqli_free_result($result);
    mysqli_close($conn);
    
    return $count;  
}

/**
 * 
 * @param type $productCode
 * @return type
 */
function fetch_single_product_details($productCode)
{
    
    // To be changed later
    $conn = connect();
    
    // Validate connection
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
   
    // Query
    $query = "SELECT * FROM stock_item WHERE product_code = ? ;";
    // Prepare
    $stmt = $conn->stmt_init();
    $stmt->prepare($query);
    
    if($stmt === false) 
    {
        trigger_error('Wrong SQL: ' . $query . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
    }
    
    // Bind params
    $stmt->bind_param("s", $productCode);
    $result;
    
    if($stmt->execute())
    {
       $result = $stmt->get_result();
       $result->fetch_array(MYSQLI_ASSOC);
    }
    else
    {
        return;
    }
    
    // Cleanup
    // Kill connection
    $stmt->close();
    mysqli_close($conn);
    
    return $result;
}

/**
 * 
 * @param type $product_code
 * @return type
 */
function fetch_single_product_images($product_code)
{        
    // To be changed later
    $conn = connect();
    
    // Validate connection
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
   
    // Query 
    $query = "SELECT i.* FROM stock_item_image i " 
            . "JOIN stock_item s ON i.stock_item_id = s.id "
            . "WHERE s.product_code = ? ;";
    // Prepare
    $stmt = $conn->stmt_init();
    $stmt->prepare($query);
    
    if($stmt === false) 
    {
        trigger_error('Wrong SQL: ' . $query . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
    }
    
    // Bind params
    $stmt->bind_param("s", $product_code);
    $result;

    if($stmt->execute())
    {
       $result = $stmt->get_result();
       $result->fetch_array(MYSQLI_ASSOC);
    }
    else
    {
        return ;
    }
    
    // Cleanup
    // Kill connection
    $stmt->close();
    mysqli_close($conn);
    
    return $result;
}