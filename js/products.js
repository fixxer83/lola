/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function initiateSessionAndSetDivs(sessionName, sessionValue, divToHide, divToShow)
{    
    if(sessionName == "full_product_category")
    {
        // Initiate full product category session
        initDetailsSessionAndReload(sessionName, sessionValue, divToShow, "category");
    }
    else if(sessionName == "product_number")
    {
         // Initiate full product category session
        initDetailsSessionAndReload(sessionName, sessionValue, divToShow, "detail");
    }
    
    
    // Hide non-products div
    showAndHideDiv(divToHide, divToShow);
    
    //return session;
}

function showAndHideDiv(divToHide, divToShow)
{
    hideDiv(divToHide);
    
    showDiv(divToShow);
}

function hideDiv(id)
{
   $(id).hide();
}

function showDiv(id)
{
   document.getElementById(id).style.display = "block";
}

function initDetailsSessionAndReload(sessionName, sessionTitle, divToShow, classToLoad)
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
                    $("#" + divToShow).load(classToLoad+"_1.php");
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