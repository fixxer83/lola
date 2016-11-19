<?php

include 'DestroySession.php';

/**
 * Create new session according to the
 * parameters passed
 * 
 * @param type $sessionHeaderName
 * @param array $session
 */
function setSession($sessionHeaderName, $session)
{  
    // Set session (if set)
    if ((session_id() == ''))
    {
        startSession();
    }
    else if(!isset($_SESSION))
    {
        // Start the session
        startSession();
    }    
            
    $_SESSION[$sessionHeaderName] = $session;    
}

function startSession()
{
    session_start();
}