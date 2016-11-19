/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function loadTransition()
{
    $(document).ready(function(){
        // to fade in on page load
        $("body").css("display", "none");
        $("body").fadeIn(0); 
        // to fade out before redirect
        $('a').click(function(e){
            redirect = $(this).attr('href');
            e.preventDefault();
            $('body').fadeOut(0, function(){
                document.location.href = redirect;
            });
        });
    });
}