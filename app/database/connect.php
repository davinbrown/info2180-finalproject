<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database_name = 'bugme';
    $conn = new MySQLi($host, $user, $password, $database_name);
    if ($conn->connect_error){
        die('Database connection error: ' . $conn->connect_error);
    }
?>