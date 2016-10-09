<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * If the passed session is set kill session
 * 
 * @param type $sessionHeaderName
 */
function destroySession($sessionHeaderName)
{
    if(isset($_SESSION[$sessionHeaderName]))
    {
        session_unset($_SESSION[$sessionHeaderName]);
        session_destroy($_SESSION[$sessionHeaderName]);
    }
}