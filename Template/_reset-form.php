<?php
// require MySQL Connection
require ('database/User.php');
$user= new user($db); 
$password=$confrim_password="";
$password_err=$confirm_password_err="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 // Validate password
 if(empty(trim($_POST["password"]))){
    $password_err = "Please enter a password.";     
} elseif(strlen(trim($_POST["password"])) < 6){
    $password_err = "Password must have atleast 6 characters.";
} else{
    $password = trim($_POST["password"]);
}

// Validate confirm password
if(empty(trim($_POST["confirm_password"]))){
    $confirm_password_err = "Please confirm password.";     
} else{
    $confirm_password = trim($_POST["confirm_password"]);
    if(empty($password_err) && ($password != $confirm_password)){
        $confirm_password_err = "Password did not match.";
    }
}

if(empty($password_err) && empty($confirm_password_err)){
    $password=password_hash($password,PASSWORD_DEFAULT);
    $result=$user->resetPassword($_SESSION['user_id'],$password);
    if(isset($result))
        echo 'Your password has been reset';
        else
        echo 'Something went wrong..please Try again';
}
}
?>


<div class="container">
<div class="row">
<div class="col-lg-6 col-md-8 login-box ml-auto mr-auto">
            
<div class="col-lg-12 login-form">
<div class="col-lg-12 login-form">
<form class="text-center p-5" method="post">

    <p class="h4 mb-4">Reset Form</p>

    <p>please enter the new password to reset</p>



    <input  type="password" name="password" class="form-control mb-4 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>" placeholder="New password">
    
    <input type="password" name="confirm_password" class="form-control mb-4 <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>" placeholder="comfirm password">
    
    <button class="btn btn-info btn-block bg-success" type="submit">Reset Password</button>
    <span class="help-block"><?php echo $password_err; ?></span>
    <span class="help-block"><?php if($password_err=='') echo $confirm_password_err; ?></span>
</form>

</div>
</div>

</div>
</div>
</div>
<style >
.reset-box {
    margin-top: 75px;
    height: auto;
    text-align: center;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
}
</style>