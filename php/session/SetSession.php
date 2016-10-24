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
    if(isset($_SESSION[$sessionHeaderName]))
    {
        // Start the session
        session_start();
    }
    
    // Start the session
    session_start();
    destroySession($sessionHeaderName);
        
    $_SESSION[$sessionHeaderName] = $session;
}