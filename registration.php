<?php
// require MySQL Connection
require ('database/DBController.php');
require ('database/User.php');
$db = new DBController();
$user= new user($db); 
 
// Define variables and initialize with empty values
$username = $password =$confirm_password=$lastname=$firstname=$security_question=$answer= "";
$username_err = $password_err =$confirm_password_err= $name_err=$security_question_err=$answer_err="";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Validate and assign username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } 
    else{   
        $username = $user->getUser(trim($_POST['username']));
        if(!empty($username))
        {
            $username_err = "username has been taken";
        }
        else
        {
            $username=trim($_POST['username']);
        }
    }

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

    //validate first name and last name
    if(empty(trim($_POST["firstname"])) && empty(trim($_POST["lastname"]))){
        $name_err = "Please Enter first name and last name";     
    }
    else{
        $firstname=trim($_POST["firstname"]);
        $lastname=trim($_POST["lastname"]);
    }

    //validate security question
    if(empty(trim($_POST["security_question"]))){
        $security_question_err = "Please select a seurity question";     
    }
    else{
        $security_question=trim($_POST["security_question"]);
    }

    //validate security question's answer
    if(empty(trim($_POST["answer"]))){
        $answer_err = "Please answer the security question";     
    }
    else{
        $answer=trim($_POST["answer"]);
    }

    //Insert user data into Database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($name_err) && empty($security_question_err) && empty($answer_err)){

        $password=password_hash($password,PASSWORD_DEFAULT);
        $answer=password_hash($answer,PASSWORD_DEFAULT);
        $result=$user->addToUser($firstname,$lastname,$username,$password,$security_question,$answer,'user');
        if(isset($result))
        echo 'Registration success. You can login from the login page.';
        else
        echo 'Something went wrong..please Try again';
    }

}




?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>

<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                
                <div class="col-lg-12 login-title">
                    Register Account
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form method="post">
                            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                                <label class="form-control-label">FIRST NAME</label>
                                <input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>">
                                
                            </div>

                            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                                <label class="form-control-label">LAST NAME</label>
                                <input type="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>">
                                <span class="help-block"><?php echo $name_err; ?></span>
                                
                            </div>

                            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                <label class="form-control-label">USERNAME</label>
                                <input type="text" name="username" class="form-control" value="">
                                <span class="help-block"><?php echo $username_err; ?></span>
                                
                            </div>
                            
                            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password" name="password" class="form-control">
                                <span class="help-block"><?php echo $password_err; ?></span>
                            </div>

                            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <label class="form-control-label">CONFIRM PASSWORD</label>
                                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                                <span class="help-block"><?php echo $confirm_password_err; ?></span>
                            </div>

                            <div class="form-group <?php echo (!empty($security_question_err)) ? 'has-error' : ''; ?>">
                            <label class="form-control-label">CHOOSE A SECURITY QUESTION</br></label>
                                <select name="security_question" class="security form-control">
                                    <option value=""></option>
                                    <option value="your Favourite color">Your favourite color?</option>
                                    <option value="Best friend in high school">Best friend in high school?</option>
                                    <option value="Name of your favourite pet">Name of your favourite pet?</option>
                                </select>
                                <span class="help-block"><?php echo $security_question_err; ?></span>
                            </div>

                            <div class="form-group <?php echo (!empty($answer_err)) ? 'has-error' : ''; ?>">
                                <label class="form-control-label">RECOVERY QUESTION'S ANSWER</label>
                                <input type="text" name="answer" class="form-control" value="<?php echo $answer; ?>">
                                <span class="help-block"><?php echo $answer_err; ?></span>
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <button type="submit" class="btn btn-outline-primary">Register</button>
                                </div>
                                <p style="color: #ffffff;">Already have an account? <a href="login.php">Login here</a>.
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div> 
</body>
</html>





<style>
body {
    background:  #f2f2f2;
    font-family: 'Roboto', sans-serif;
}

.help-block{
    color: #A52A2A;
}
.login-box {
    margin-top: 30px;
    margin-bottom: 30px;
    height: auto;
    background: #1A2226;
    text-align: center;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
}

.login-key {
    height: 100px;
    font-size: 80px;
    line-height: 100px;
    background: -webkit-linear-gradient(#27EF9F, #0DB8DE);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.login-title {
    margin-top: 35px;
    text-align: center;
    font-size: 25px;
    letter-spacing: 2px;
    font-weight: bold;
    color: #ECF0F5;
}

.login-form {
    margin-top: 25px;
    text-align: left;
}

input[type=text] {
    background-color: #1A2226;
    border: none;
    border-bottom: 2px solid  #f2f2f2;
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    outline: 0;
    margin-bottom: 20px;
    padding-left: 0px;
    color: #ECF0F5;
}

input[type=password] {
    background-color: #1A2226;
    border: none;
    border-bottom: 2px solid  #f2f2f2;
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    outline: 0;
    padding-left: 0px;
    margin-bottom: 20px;
    color: #ECF0F5;
}

.security {
    background-color: #1A2226;
    border: none;
    border-bottom: 2px solid  #f2f2f2;
    border-top: 0px;
    border-radius: 0px;
    font-weight: bold;
    outline: 0;
    padding-left: 0px;
    margin-bottom: 20px;
    color: #ECF0F5;
}

.form-group {
    margin-bottom: 40px;
    outline: 0px;
}

.form-control:focus {
    border-color: inherit;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-bottom: 2px solid #0DB8DE;
    outline: 0;
    background-color: #1A2226;
    color: #ECF0F5;
}

input:focus {
    outline: none;
    box-shadow: 0 0 0;
}

label {
    margin-bottom: 0px;
}

.form-control-label {
    font-size: 10px;
    color: #6C6C6C;
    font-weight: bold;
    letter-spacing: 1px;
}

.btn-outline-primary {
    border-color: #000000;
    color: #000000;
    border-radius: 0px;
    font-weight: bold;
    letter-spacing: 1px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

.btn-outline-primary:hover {
    background-color: #ffffff;
    right: 0px;
}

.login-btm {
    float: left;
}

.login-button {
    padding-right: 0px;
    text-align: right;
    margin-bottom: 25px;
}

.login-text {
    text-align: left;
    padding-left: 0px;
    color: #A2A4A4;
}

.loginbttm {
    padding: 0px;
}


</style>
