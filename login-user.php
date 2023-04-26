<?php
@require_once "includes/controllerUserData.php"; 


if(isset($_SESSION['login_id'])){
  header('Location: index.php');
  exit;
}

?>

<?php

require 'google-api/vendor/autoload.php';

// Creating new google client instance
$client = new Google_Client();

// Enter your Client ID
$client->setClientId('707535597754-ahldl5ja5js7ksb4pos4n17v61kn753n.apps.googleusercontent.com');
// Enter your Client Secrect
$client->setClientSecret('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');
// Enter the Redirect URL
$client->setRedirectUri('http://localhost/pm/login-user.php');

// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");


if(isset($_GET['code'])):
  

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if(!isset($token["error"])){

        $client->setAccessToken($token['access_token']);

        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
    
        // Storing data into database
        // $id = mysqli_real_escape_string($db_connection, $google_account_info->id);
        $firstname = mysqli_real_escape_string($db_connection, $google_account_info->givenName);
        $lastname = mysqli_real_escape_string($db_connection, $google_account_info->familyName); 
        $email = mysqli_real_escape_string($db_connection, $google_account_info->email);
        $profile_pic = mysqli_real_escape_string($db_connection, $google_account_info->picture);
        

        // checking user already exists or not
        $get_user = "SELECT `email` FROM `usertable` WHERE `email`='$email'";

        $res = mysqli_query($db_connection, $get_user);

        
        
        if(mysqli_num_rows($res) > 0){

          do {  
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            mysqli_query($db_connection, "UPDATE usertable SET `profile_image` = '$profile_pic' WHERE email = '$email'");
          } while (header('Location: index.php'));
        }

        else{

            // if user not exists we will insert the user

            $encpass = password_hash($lastname, PASSWORD_BCRYPT);
            $insert = mysqli_query($db_connection, "INSERT INTO `usertable`(`firstname`,`lastname`,`email`,`password`,`profile_image`,`status`,`plan`) VALUES('$firstname','$lastname','$email','$encpass','$profile_pic','verified','free')");

            if($insert){
                $_SESSION['email'] = $email;
                header('Location: index.php');
                exit;
            }
            else{
                echo "Sign up failed!(Something went wrong).";
            }
        }
    }
    else{
        header('Location: login-user.php');
        exit;
    }
    
else: 
    // Google Login Url = $client->createAuthUrl(); 
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login-user.css" />
    <title>Sign In | Portfolio Maker</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="login-user.php" class="sign-in-form" method="POST" autocomplete="">
            <h2 class="title">Sign in</h2>

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

            <a href="forgot-password.php" style="text-decoration: none; font-size: 14px; position: relative; left: 6rem;">Forgot Password?</a>

            <input type="submit" value="Login" class="btn solid" name="login" style="width: 350px;">

            <p class="social-text">don't have an account?</p>
            <a href="signup-user.php" style="text-decoration: none; margin-top: -13px; font-size: 15px;">Create an account</a>
            
            <div class="social-media">

              <a href="<?php echo $client->createAuthUrl(); ?>" type="button" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="admin-login.php" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
            
          </form>
          <form action="#" class="sign-up-form">
            <h2 class="title">Latest Updates</h2>
             <br>
            <p>1. Portfolio Maker V1 started its first run in January 22, 2023. Our software engineer is still finalizing the cocenpt and the final UI of the login and register page. </p>
             <br>
            <p>2. PMv1.2 is released with a semi working login and register page and still various errors and resources are missing</p>
             <br>
            <p>3. PMv1.3 Finalized its Front end UI in login and signup and also configured a fully working backend of the login and register function.</p>
             <br>
            <p>4. PMv1.4 Admin Dashboard has been created together with some of its functionality</p>
            <br>
            <p>5. PMv1.5 (Latest Version) google sign in was included, captcha code during signup included,</p>
                 
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          
        <img src="img/logo.png" class="image" alt="" style="width: 90%; position:relative; right:40px; ">

          <div class="content">
            <h3>Latest Updates</h3>
            <p>
              Check out the wonderful journey of Porftfolio Maker Project.
            </p>
            <button class="btn transparent" id="sign-up-btn">
              See more
            </button>
          </div>

        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/logo.png" class="image" alt="" style="position: relative; left:50px; bottom:30px; width:90%;">
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>



<?php endif; ?>