<?php
$db_user = 'root';
$db_pass = '';
$db_name = 'Login-system';
$db_host = 'localhost';

 $mysqli = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if(!$mysqli) {
        printf('Connection failed:' . mysqli_connect_error());
        exit();
    }
?>