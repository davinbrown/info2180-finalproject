<?php
session_start();
require('connect.php');

function show($value){
    echo "<pre>", print_r($value, true), "</pre>";
    die();
}
function trim_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function executeQuery($sql, $data){
    global $conn;
    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values); 
    $stmt->execute();
    return $stmt;
}

function selectOne($table, $conditions ){ // Resusable func to get data from database
    global $conn;
    $sql = "SELECT * FROM $table";
    $i = 0;
    foreach ($conditions as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " WHERE $key=?" ;
        }else {
            $sql = $sql . " AND $key=?" ;
        }
        $i++;
    }
    $sql = $sql . " LIMIT 1";
    $stmt = executeQuery($sql, $conditions);
    $records = $stmt->get_result()->fetch_assoc();
    return $records;
}


?>