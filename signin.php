<?php include_once('header.php') ?>
<div class="content-center">
    <div class="container">
        <div class="container-width">
            <div class="signup-body">
                <form action="includes/signin.inc.php" method="post">
                    <div class="mb-3">
                        <?php 
                        text('username', 'username', 'Username/Email', 'Username', 'text'); 
                    ?>
                    </div>
                    <div class="mb-2">
                        <?php 
                            text('password', 'password', 'Password', 'password', 'password');
                        ?>
                    </div>
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Remember Me
                        </label>
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
                        elseif($_GET["error"] == "wronglogin"){
                            echo '<p class="error_message">Incorrect Credentials</p>';
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
<?php include_once('footer.php') ?>