<?php
include("../database/db.php");
if (isset($_POST['request'])) {

    if($_POST['request'] == "update"){
        $issue = trim_input($_POST['issue']);
        $update = trim_input($_POST['update']);

        $data = ['status' => $update];

        $result = update('issues', $issue, $data );

        if ($result >= 1) {
            echo "success";
        }else{
            echo "failed";
        }
    }
?>