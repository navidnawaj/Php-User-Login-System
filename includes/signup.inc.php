<?php
    if(isset($_POST["submit"])){

        // User submitted data
        $username = $_POST["username"];
        $email = $_POST["mail"];
        $pwd = $_POST["password"];

        // fucntions
        require_once '../function.php';
        require_once 'dbh.inc.php';
        if(usernSignup($username, $email, $pwd) !== false){
            header("location: ../signup.php?error=blank_inputs");
            exit(); 
        }
        if(invalidEmail($email) !== false){
            header("location: ../signup.php?error=invalid_email");
            exit(); 
        }
        if(invalidusername($username) !==false){
            header("location: ../signup.php?error=invalid_username");
            exit(); 
        }
        if(usernExists($mysqli, $username, $email) !== false){
            header("location: ../signup.php?error=username_or_email_exists");
            exit(); 
        }

        CreateUser($mysqli, $username, $email, $pwd);
    }
    else{
        header("location: ../signup.php?");
        exit();
    }
?>