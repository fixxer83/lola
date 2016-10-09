/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function initiateSessionCategory(id)
{
    var className = id;
    var session = className.split("_");
    
    //Initiate full product category session
    initSessionAndReload("full_product_category", id);
        
    // Hide non-products div
    hideNonProductDiv();
    
    // Show Products
    displayProductDiv();
    
    return session;
}

function hideNonProductDiv()
{
    $("#hide").hide();
}

function displayProductDiv()
{
    document.getElementById('product_content').style.display = "block";
}

function initSession(sessionName, sessionTitle)
{
    $.ajax
    ({
        type: "POST",
        url: "php/session/SetSession.php",
        data: ({sessionHeaderName: sessionName, session: sessionTitle}),
        cache: false,
        async: true,
        success: function(response)
                {
                    console.log(response);
                }
    });    
}

function initSessionAndReload(sessionName, sessionTitle)
{
    $.ajax
    ({
        type: "POST",
        url: "php/session/SetSession.php",
        data: ({sessionHeaderName: sessionName, session: sessionTitle}),
        cache: false,
        async: true,
        success: function(response)
                {
                    console.log(response);
                    $("#product_content").load("category_1.php");
                }
    });    
}

function dataSelection(fullCategory)
{
    $.ajax
    ({
        type: "POST",
        url: "php/productData/MultiProductSummary.php",
        data: ({fullCategory: fullCategory}),
        cache: false,
        async: true,
        success: function(response)
                {
                    console.log("response: " +  fullCategory);
                    $("#product_content").load("category_1.php");
                }
    });    
}