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
    <link rel="stylesheet" href="css/login-admin.css?version=1" />
    <title>Sign In</title>
</head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="admin-login.php" class="sign-in-form" method="POST" autocomplete="">
            <h2 class="title">Admin Sign in</h2>

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
              <i class="fas fa-user"></i>
              <input type="text" class="input" name="email" required placeholder="Email">
            </div>


            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" class="input" name="password" placeholder="Password" />
            </div>

            <input type="submit" value="Login" class="btn solid" name="loginadmin" style="width: 350px;">

            
            
          </form>
        </div>
      </div>

     
  </body>
</html>
