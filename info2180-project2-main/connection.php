<?php

require_once 'dbconfig.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    echo "Connected to $dbname at $host successfully.";
    
} catch (PDOException $pe) {
    die("Could not connect to the database");
}
?>
