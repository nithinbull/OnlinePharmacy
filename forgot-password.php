<?php
    $username ="";
    $username_err = "";
    // require MySQL Connection
    require ('database/DBController.php');
    require ('database/User.php');
    $db = new DBController();
    $user= new user($db);


    if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Check if username is empty
              if(empty(trim($_POST["username"]))){
                    $username_err = "Please enter username.";
                } 
                else{
                 $username = trim($_POST["username"]);
                }
                if(empty($username_err)){
                    $result=$user->getUser($_POST["username"]);
                    if(!empty($result)){
                        header("location: security-question.php?username=".$username);
                        exit;
                    }
                    else{
                        $username_err = "Entered username is not found";
                    }
                }

    
    
    
    
            }
    

?>

<div class="container">
    <div class="text-center col-lg-6 ml-auto mr-auto" style="margin-top: 75px;">
        <form method="post">
        <p class="h4 mb-4">Forgot Password</p>

        <p>please enter your username to answer your security question</p>

        <input  type="text" name="username" class="form-control mb-4 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>" placeholder="username">
        <span class="help-block"><?php echo $username_err; ?></span>
        <button type="submit" class="btn btn-outline-primary">Reset</button>

        </form>
    </div>
</div>







  <!-- bootstrap js files -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
