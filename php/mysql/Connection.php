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
function connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lolas_room";
    
    // Create new connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Connect
    if(mysqli_connect_errno())
    {
        die("Connecion not established: "  . mysqli_connect_errno());
    }
    
    return $conn;
}

