<!-- Form Fields -->
<?php
require_once 'includes/dbh.inc.php';
function text($name, $id, $label, $placeholder, $type ){?>
<div class="form-group">
    <label for="<?php echo $id ?>"><?php echo $label ?></label>
    <input name="<?php echo $name ?>" type="<?php echo $type ?>" class="form-control" id="<?php echo $id ?>"
        aria-describedby="emailHelp" placeholder="<?php echo isset($_SESSION[$name]) ? __($_SESSION[$name]) : ''; ?>">
</div>
<?php }

function submit($value = "submit", $class = "submitbtn") {?>
<button type="submit" class="<?php echo $class ?>" name="submit"><?php echo $value ?></button>

<?php }

// Blank input check
function usernSignup($username, $email, $pwd){
    $result;
    if(empty($username) || empty($email) || empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
// Invalid Email check
function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
//Invalid Username Check
function invalidusername($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
//Existence Email o r username check
function usernExists($mysqli, $username, $email){
    $sql = "SELECT * FROM users WHERE username = ? OR userEmail = ?;";
    $stmt = mysqli_stmt_init($mysqli);
    if (!mysqli_stmt_prepare($stmt , $sql)){
         header("location: ../signup.php?error=something_went_wrong");
        exit(); 
    }
    mysqli_stmt_bind_param($stmt, 'ss', $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
};
//Send data into the database
function CreateUser($mysqli,$username, $email, $pwd){
    $sql = 'INSERT INTO users (username, userEmail, userPwd) VALUES (?, ?, ?)';
    $stmt = mysqli_stmt_init($mysqli);
    if(!mysqli_stmt_prepare($stmt,$sql)){
         header("location: ../signup.php?error=something_went_wrong");
        exit(); 
    }
    $hashpwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $hashpwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}
//==========Login functions 

//blank input check
function blankField($username, $pass){
    $result;
    if(empty($username) || empty($pass)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
};
function LoginUser($mysqli, $username, $pass){
   $uidexists =  usernExists($mysqli, $username, $username);

   if($uidexists === false){
        header("location: ../signin.php?error=wronglogin");
        exit();
   }

   $hashedpwd = $uidexists["userPwd"];
   $checkpwd = password_verify($pass, $hashedpwd);

   if($checkpwd === false){
       header("location: ../signin.php?error=wronglogin");
        exit();
   }
   else if($checkpwd === true){
       session_start();
       $_SESSION["userid"]  = $uidexists['ID'];
       $_SESSION["useruid"]  = $uidexists['username'];
       header("location: ../index.php");
    exit();
   }
}
?>