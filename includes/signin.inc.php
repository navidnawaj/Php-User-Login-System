<?php
    if(isset($_POST["submit"])){
        
        $username = $_POST["username"];
        $pass = $_POST["password"];

        require_once 'dbh.inc.php';
        require_once '../function.php';
        
        if(blankField($username, $pass) !== false){
            header("location: ../signin.php?error=blank_inputs");
            exit(); 
        }

        LoginUser($mysqli, $username, $pass);
    }
    else{
        header("location: ../signin.php");
        exit();
    }
?>