<?php

@require_once "includes/controllerUserData.php"; 

?>

<?php
if($_SESSION['info'] == false){
    header('Location: login-user.php');  
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <!---<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">!-->
    <link rel="stylesheet" href="css/login-user.css" />
    <title>Sign In</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="login-user.php" class="sign-in-form" method="POST" autocomplete="off">

            <?php 
            if(isset($_SESSION['info'])){
                ?>
                <div class="alert alert-success text-center">
                <?php echo $_SESSION['info']; ?>
                </div>
                <?php
            }
            ?>
     
            <input type="submit" value="Submit" class="btn solid" name="login-now" style="width: 350px;">         
          </form>
        </div>
        <div class="panels-container">
        <div class="panel left-panel">
          
        <img src="img/logo.png" class="image" alt="" style="width: 90%; position:relative; right:50px; ">

        </div>
      </div>
      </div>



    <script src="app.js"></script>
  </body>
</html>
