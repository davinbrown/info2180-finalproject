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

function create($table, $data){
    global $conn;
    $sql = "INSERT INTO $table SET";
    $i = 0;
    foreach ($data as $key => $value) {
        if ($i === 0) {
            $sql = $sql . " $key=?";
        }else {
            $sql = $sql . ", $key=?";
        }
        $i++;
    }
    $stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;
    return $id;
}

function selectAll($table, $conditions = []){ // Resusable func to get data from database
    global $conn;
    $sql = "SELECT * FROM $table";
    if(empty($conditions)){
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }else{
        $i = 0;
        foreach ($conditions as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE $key=?" ;
            }else {
                $sql = $sql . " AND $key=?" ;
            }
            $i++;
        }
        $stmt = executeQuery($sql, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}

function validateNames($data){ 
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $namePattern = "/^[a-zA-Z0-9 -,'.]*$/";

    if(empty($data) || !preg_match($namePattern,$data)){
        return false;
    }else{
        return true;
    }
}

function validateEmail($data){ 
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $emailPattern = "/^[a-zA-Z0-9@.]*$/";

    if(empty($data) || !preg_match($emailPattern,$data)){
        return false;
    }else{
        return true;
    }
}

function validatePassword($data){ 
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $emailPattern = "/^[a-zA-Z0-9]*$/";

    if(empty($data) || !preg_match($emailPattern,$data)){
        return false;
    }else{
        return true;
    }
}
?>