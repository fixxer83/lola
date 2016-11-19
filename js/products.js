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
        
//        header("Location: category_1.php");
    }
    else if(sessionName == "product_number")
    {
        // Initiate full product category session
        //initDetailsSessionAndReload(sessionName, sessionValue, divToShow, "detail");
        
        //header("Location: category_1.php");
    }
    
    // Hide non-products div
    //showAndHideDiv(divToHide, divToShow);
}

/**
 * This function will hide the first param (divToHide)
 * and set visible the second one (divToShow)
 *  
 * @param {type} divToHide
 * @param {type} divToShow
 */
function showAndHideDiv(divToHide, divToShow)
{
    hideDiv(divToHide);
    
    showDiv(divToShow);
}

/**
 * This function will hide the first
 * div passed (divToHide)
 *  
 * @param {type} divToHide
 */
function hideDiv(divToHide)
{
   $(divToHide).hide();
}

/**
 * This function will set visible 
 * the div passed (divToShow)
 *  
 * @param {type} divToShow
 */
function showDiv(divToShow)
{
   document.getElementById(divToShow).style.display = "block";
}

/**
 * This function will initiate the session based
 * on the arguments passed (i.e. session name & value)
 * set visible the div passed and reloads the class
 * passed in the arguments
 * 
 * @param {type} sessionName
 * @param {type} sessionTitle
 * @param {type} divToShow
 * @param {type} classToLoad
 */
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
                  //  $("#" + divToShow).load(classToLoad+"_1.php");
                    //$("#" + divToShow).load("category_1.php");
                    
                }
    });   
}

/**
 * This function will initiate the session and destroy
 * a second session based on the arguments passed 
 * (i.e. session name & value for both init and destroy)
 * set visible the div passed and reloads the class
 * passed in the arguments
 * 
 * @param {type} sessionToSetName
 * @param {type} sessionTitle
 * @param {type} sessionToDestroy
 * @param {type} divToShow
 * @param {type} classToLoad
 */
function initAndDestroySessionAndReload(sessionToSetName, sessionTitle, sessionToDestroy, divToShow, classToLoad)
{
    $.ajax
    ({
        type: "POST",
        url: "php/session/SetSession.php",
        data: ({sessionToSetName: sessionToSetName, sessionTitle: sessionTitle, sessionToDestroy: sessionToDestroy}),
        cache: false,
        async: true,
        success: function(response)
                {
                    console.log(response);
                    $("#" + divToShow).load(classToLoad+"_1.php");
                }
    });     
}

function navigate(sessionToSetName, sessionValue, searchTerm)
{ 
    $.ajax
    ({
        type: "POST",
        url: "php/navigation/MainPagesNavigation.php",
        data: ({sessionHeaderName: sessionToSetName, sessionValue: sessionValue}),
        cache: false,
        async: false,
        success: function(response)
                {
                    console.log(response);
                    console.log(sessionToSetName + " : " + sessionValue);
                }
    });     
}

function searchAndNavigate(sessionToSetName, sessionValue, searchTerm)
{
    
    $.ajax
    ({
        type: "POST",
        url: "php/navigation/MainPagesNavigation.php",
        data: ({sessionHeaderName: sessionToSetName, sessionValue: sessionValue + " : " + searchTerm }),
        cache: false,
        async: true,
        success: function(response)
                {
                    console.log(response);
                    window.location.href = "products.php";
                }
    });     
}

/**
 * This methd may be used to load
 * the nav-bar in another page
 * 
 * @returns {undefined}
 */
function loadNavBar()
{
    $.ajax
    ({
        url:"../index.php",
        type:"GET",
        success: function(data){
            $("#prelim_stuff").load("index.php #nav_div");
        }
    });
    
}

//function setActivePage(id)
//{
////    document.getElementsByClassName("active").
//
//    alert(id);
//    
//    //document.getElementById("#"+id).className = "active";
//}

/**
 * This method may be used to get search term from the 
 * #nav_search_text_field and redirect the user to the 
 * product listing
 */
function clickAndSearch()
{
    var searchValue = $("#nav_search_txt_field").val();
    searchAndNavigate("full_product_category", "all items_all items", searchValue);                   
}