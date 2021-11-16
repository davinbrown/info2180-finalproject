<?php
    $host = 'localhost';
    $user = 'webmaster';
    $password = 'P*.ZA&]4Q6cYpWR';
    $database_name = 'bugme';
    $conn = new MySQLi($host, $user, $password, $database_name);
    if ($conn->connect_error){
        die('Database connection error: ' . $conn->connect_error);
    }
?>