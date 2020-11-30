<?php

    $server     = 'localhost';
    $user       = 'root';
    $password   = '';
    $db         = 'php_crud';

    // Create connection
    $conn = new MYSQLi($server, $user, $password, $db); 

    // Check connection
    if (!$conn) {
        // die("Connection failed: " . mysqli_connect_error());
        die("Connection failed: " . $conn->connect_error);
    }
