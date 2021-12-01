<?php
include("../database/db.php");
if (isset($_POST['request'])) {
    

    if($_POST['request'] == "adduser"){
        //unset($_POST['request']);

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
            if ($result >= 1) {
                echo "success";
            }else{
                echo "failed";
            }
        }
    }

    if($_POST['request'] == "addissue"){
        //unset($_POST['request']);

        $errors = array();


        $title = trim_input($_POST['title']);
        $description = trim_input($_POST['description']);
        $assigned = trim_input($_POST['assigned']);
        $type = trim_input($_POST['type']);
        $priority = trim_input($_POST['priority']);
        $status = "open";
        $user = $_SESSION['id'];
        $currentdate = date("Y-m-d h:i:s");
        

        if(!validateNames($title) ){
            array_push($errors, "title" );
            echo "Title is empty or invalid<br>";
        }
        if (!validateNames($description)) {
            array_push($errors, "description" );
            echo "Description is empty or invalid<br>";
        }


        if(empty($errors)){
            // create user
            $newissue = ['title'=> $title,'description'=> $description,'type'=> $type,'priority'=> $priority,'status'=>$status,'assign_to'=>$assigned,'created_by'=>$user,'updated'=> $currentdate ];
            $result = create('issues', $newissue);
            if ($result >= 1) {
                echo "success";
            }else{
                echo "failed";
            }
        }

    }


}   
?>
