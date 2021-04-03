<?php include_once('header.php') ?>


<?php
    if(isset($_SESSION["useruid"])){
        echo '<p style="text-align: center; font-size: 28px;margin-top: 50px;">Hello there, ' . $_SESSION["useruid"] .'</p>';
    }
    else{
        echo '<p style="text-align: center; font-size: 28px;margin-top: 50px;">Hello, sign up & log in to our website</p>';
    }
    ?>
<?php include_once('footer.php') ?>