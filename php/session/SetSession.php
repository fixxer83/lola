<?php

include './DestroySession.php';

$tempSessionHeaderName = filter_input(INPUT_POST, 'sessionHeaderName');
$tempSession = filter_input(INPUT_POST, 'session');

setSession($tempSessionHeaderName, $tempSession);

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
        //destroySession($sessionHeaderName);
        
        //$_SESSION[$sessionHeaderName] = $session; 
    }
    
    // Start the session
    session_start();
    destroySession($sessionHeaderName);
        
    $_SESSION[$sessionHeaderName] = $session;
    
    
    
    
}