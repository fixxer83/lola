<?php

/**
 * This method may be used to connect to a MySQL instance
 * 
 * @param type $host
 * @param type $username
 * @param type $password
 * @param type $db
 * 
 */
function connect($host, $username, $password, $db)
{
    // Create new connection
    $conn = mysqli_connect($host, $username, $password, $db);
    
    // Connect
    if(mysqli_connect_errno())
    {
        die("Connecion not established: "  . mysqli_connect_errno());
    }
    
    return $conn;
}

