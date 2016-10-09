/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function initiateSessionDetail(id)
{   
    // Initiate full product category session
    initDetailsSessionAndReload("product_number", id);
    
    // Hide non-products div
    hideCategoryDiv();
    
    // Show Products
    displayProductDetailDiv();
    
   // return session;
}

function hideCategoryDiv()
{
    $("#product_content").hide();
}

function displayProductDetailDiv()
{
    document.getElementById('product_detail').style.display = "block";
}

function initDetailsSessionAndReload(sessionName, sessionTitle)
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
                    $("#product_detail").load("detail_1.php");
                }
    });    
}