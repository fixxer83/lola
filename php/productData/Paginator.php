<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * This function may be used to get the number
 * of pages required for the selected category
 * for pagination purposes
 * 
 * @param type $product_data
 */
function getNumberOfPagesAndSetSession($product_data, $divisibleBy)
{
    $total = ceil($product_data / $divisibleBy);
    
    setSession(SessionNameEnum::PAGE_COUNT, $total);
}

/**
 * Get the current page number for the displayed products
 * 
 * @param type $itemLimit
 * @return type
 */
function getCurrentPageNumber($itemLimit)
{
    $page=$_GET['page'];
    
    if($page=='')
    {
     $page=1;
     $start=0;
    }
    else
    {
     $start=$itemLimit*($page-1);
    }

   return $start; 
}