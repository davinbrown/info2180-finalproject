<?php
include("../database/db.php");
if (isset($_POST['request'])) {
    

    if($_POST['request'] == "addissue"){
        unset($_POST['request']);

        $errors = array();

        $firstname = trim_input($_POST['firstname']);
        $lastname = trim_input($_POST['lastname']);
        $useremail = trim_input($_POST['email']);
        $userpassword = trim_input($_POST['password']);

        if(!validateNames($firstname) ){
            array_push($errors, "firstname" );
            echo "FirstName is empty or invalid<br>";
        }
        if (!validateNames($lastname)) {
            array_push($errors, "lastname" );
            echo "LastName is empty or invalid<br>";

        }
        if (!validateEmail($useremail)) {
            array_push($errors, "useremail" );
            echo "Email is empty or invalid<br>";
        }
        if (!validatePassword($userpassword)) {
            array_push($errors, "userpassword" );
            echo "password is too weak<br>";
        }else{
            $userpasswordHash = password_hash($userpassword, PASSWORD_DEFAULT );
        }

        if(empty($errors)){
            // create user
            $newuser = ['firstname'=> $firstname, 'lastname'=> $lastname , 'email' => $useremail , 'password' => $userpasswordHash];
            $result = create('users', $newuser);
            if ($result > 1) {
                echo "success";
            }else{
                echo "failed";
            }
        }
    }

    if($_POST['request'] == "newissue"){

        unset($_POST['request']);

        echo "okay";

    }