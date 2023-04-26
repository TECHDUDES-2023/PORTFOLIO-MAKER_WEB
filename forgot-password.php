<?php

@require_once "includes/controllerUserData.php"; 

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
          <form action="login-user.php" class="sign-in-form" method="POST" autocomplete="">
            <h2 class="title">Forgot Password</h2>
            <p class="">Enter your email address</p>

            <?php
            if(count($errors) > 0){
                ?>
                 <div class="alert alert-danger text-center">
                    <?php
                      foreach($errors as $showerror){
                          echo $showerror;
                      }
                      ?>
                      </div>
                      <?php
             }
             ?>
            
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" class="input" name="email" required placeholder="Email">
            </div>
            <input type="submit" value="Continue" class="btn solid" name="check-email" style="width: 350px;">

            <p class="social-text">already know your password?</p>
            <a href="login-user.php" style="text-decoration: none; margin-top: -13px; font-size: 15px;">Log In</a>
           
          </form>
        </div>
      </div>
      
      <div class="panels-container">
        <div class="panel left-panel">
          
        <img src="img/logo.png" class="image" alt="" style="width: 90%; position:relative; right:40px; ">

        </div>
      </div>
    </div>


    <script src="app.js"></script>
  </body>
</html>
