/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function hideNonProductDiv()
{
    $("#hide").hide();
}

function displayProductDiv()
{
    document.getElementById('product_content').style.display = "block";
}

function changePageMarker(id)
{
    var actToInact = document.getElementsByClassName("active")
    actToInact.className += "inactive";
    
    var inactToact = document.getElementById(id);
    inactToact.className += "inactive";
    
    echo(id);
}