<?php

include './SetSession.php';

// Getting post params
$sessionToSetName = filter_input(INPUT_POST, 'sessionToSetName');
$sessionValue = filter_input(INPUT_POST, 'sessionValue');
$sessionToDestroy = filter_input(INPUT_POST, 'sessionToDestroy');

// Setting & destroying session
setAndDestroySession($sessionToSetName, $sessionValue, $sessionToDestroy);

/**
 * This function may be used to set session (a)
 * and destroy session(b) * 
 * 
 * @param type $sessionToSetName
 * @param type $sessionValue
 * @param type $sessionToDestroy
 */
function setAndDestroySession($sessionToSetName, $sessionValue, $sessionToDestroy)
{
    setSession($sessionToSetName, $sessionValue);
    
    destroySession($sessionToDestroy);
}

