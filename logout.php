<?php 
    include("path.php");
    session_start();
    session_destroy();
    header('location:'. BASE_URL .'/login.php');
    exit();
?>