<?php include_once('header.php')?>
<div class="content-center">
    <div class="container">
        <div class="container-width">
            <div class="signup-body">
                <form action="includes/signup.inc.php" method="post">
                    <div class="mb-3">
                        <?php 
                        text('username', 'username', 'Username', 'Username', 'text'); 
                    ?>
                    </div>
                    <div class="mb-3">
                        <?php 
                        text('mail', 'mail', 'Email', 'Username', 'email'); 
                    ?>
                    </div>
                    <div class="mb-2">
                        <?php 
                            text('password', 'password', 'Password', 'password', 'password');
                        ?>
                    </div>
                    <div class="mb-1">
                        <?php submit() ?>
                    </div>

                </form>
                <?php 
                    if(isset($_GET["error"])){
                        if($_GET["error"] == "blank_inputs"){
                            echo '<p class="error_message">Blank input!</p>';
                        }
                        elseif($_GET["error"] == "invalid_email"){
                            echo '<p class="error_message">Invalid Email</p>';
                        }
                        elseif($_GET["error"] == "invalid_username"){
                            echo '<p class="error_message">Invalid Username</p>';
                        }
                        elseif($_GET["error"] == "username_or_email_exists"){
                            echo '<p class="error_message">Username or Email already exists</p>';
                        }
                        elseif($_GET["error"] == "something_went_wrong"){
                            echo '<p class="error_message">Our Fault! Please try again. </p>';
                        }
                        elseif($_GET["error"] == "none"){
                            echo '<p class="success">Success! Please log in. </p>';
                        }
                    }
                    else{
                        header("location: ");
                        exit();
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include_once('footer.php')?>