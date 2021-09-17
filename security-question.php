<?php
    $username ="";
    $username_err = "";
    // require MySQL Connection
    require ('database/DBController.php');
    require ('database/User.php');
    $db = new DBController();
    $user= new user($db);
    $answer=$answer_err="";
    $result=$user->getUser($_GET["username"]);
    $question=$result[0]['security_question'];
    $hashed_answer=$result[0]['security_answer'];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
    //validate security question's answer
    if(empty(trim($_POST["answer"]))){
        $answer_err = "Please answer the security question";     
    }
    else{
        $answer=trim($_POST["answer"]);
    }
    if(empty($answer_err) && password_verify($answer,$hashed_answer))
    {
        session_start();
                        // Store data in session variables
                        $_SESSION["usertype"] = 'user';
                        $_SESSION["loggedin"] = true;
                        $_SESSION["username"] = $_GET['username'];     
                        $_SESSION["user_id"]=$result[0]["user_id"];
                        // Redirect user to index page
                        header("location: reset-password.php");
                        exit;

    }
    }
?>

<div class="container">
    <div class="text-center col-lg-6 ml-auto mr-auto" style="margin-top: 75px;">
        <form method="post">
        <p class="h4 mb-4">Security Question</p>
        
        <p><?php echo $question.'?'  ?></p>

        <input  type="password" name="answer" class="form-control mb-4 <?php echo (!empty($answer_err)) ? 'has-error' : ''; ?>" placeholder="">
        <span class="help-block"><?php echo $answer_err; ?></span>
        
        <button type="submit" class="btn btn-outline-primary">Reset</button>

        </form>
    </div>
</div>

  <!-- bootstrap js files -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
