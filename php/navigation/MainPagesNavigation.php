<?php

include (__DIR__ . '\..\session\SetSession.php');
//include (__DIR__ . '\..\enums\ClassEnum.php');
//include (__DIR__ . '\..\enums\SessionNameEnum.php');
//include (__DIR__ . '\..\enums\DivEnum.php');

$sessionHeaderName = filter_input(INPUT_POST, 'sessionHeaderName');
$sessionValue = filter_input(INPUT_POST, 'sessionValue');
    
setSessionAndNavigateToPage($sessionHeaderName, $sessionValue);

function setSessionAndNavigateToPage($sessionHeaderName, $sessionValue)
{
    // Setting session
    setSession($sessionHeaderName, $sessionValue);
    
//    // Redirection
//    ob_start();
//    header("Location: /category_1.php");
//    ob_end_flush();
//    die();
    
}
