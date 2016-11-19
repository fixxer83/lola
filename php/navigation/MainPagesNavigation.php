<?php

include (__DIR__ . '\..\session\SetSession.php');

$sessionHeaderName = filter_input(INPUT_POST, 'sessionHeaderName');
$sessionValue = filter_input(INPUT_POST, 'sessionValue');
    
setSessionAndNavigateToPage($sessionHeaderName, $sessionValue);

function setSessionAndNavigateToPage($sessionHeaderName, $sessionValue)
{
    // Setting session
    setSession($sessionHeaderName, $sessionValue);    
}
