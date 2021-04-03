<?php  
    error_reporting(E_ALL); 
    include_once('function.php');
    ini_set('display_errors', 1);
    require_once 'includes/dbh.inc.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login System</title>
    <!-- css -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">PHP User</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <?php
                        if(isset($_SESSION["useruid"])){
                            echo '<li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="includes/logout.inc.php">Logout</a></li>';
                        }
                        else{
                            echo '<li class="nav-item"><a class="nav-link" href="signin.php">Sign in</a> </li>';
                            echo '<li class="nav-item"> <a class="nav-link" href="signup.php">Sign up</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>