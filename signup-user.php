<?php
@require_once "includes/controllerUserData.php"; 

$rand = rand(9999,1000);
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
    <link rel="stylesheet" href="css/signup-user.css?version=1" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"/>
    <title>Sign Up</title>

    <style>
      .alert-danger{
        background-color: red;
        color: black; height: 35px;
        padding: 10px 10px 10px 10px;
        text-align: left;
        margin-top: 5px;
        border-radius: 15px;

      }


      .alert-danger li{
        background-color: red;
        color: black; height: 35px;
        padding: 10px 10px 10px 10px;
        text-align: left;
        margin-top: 5px;
        border-radius: 15px;

      }
      
    </style>



    
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="signup-user.php" class="sign-in-form" method="POST" id="form">
            <h2 class="title">Sign Up</h2>
            
            <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert-danger" >
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert-danger" >
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
            

            <!------ FIRSTNAME INPUT FIELD --------->
            
            <div class="input-field">
              <i class="fas fa-user"></i>
              
              <input type="text" class="input" placeholder="First Name " required name="fname" id="email" onkeydown="return /[a-z, ]/i.test(event.key)" maxlength="20" title="Alphabets Only || Minimum of 2 characters">
              
            </div>
           

            <!------ LASTNAME INPUT FIELD --------->

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" class="input" placeholder="Last Name" required name="lname" onkeydown="return /[a-z, ]/i.test(event.key)" maxlength="20" title="Alphabets Only || Minimum of 2 characters">
            </div>


            <!------- EMAIL INPUT FIELD --------->


            <div class="input-field">
              <div id="icon" style="margin-left:10px"></div>
              
              <input type="email" class="input" placeholder="Email" required name="email" id="email-id" oninput="checker()"
              value="<?= isset($_SESSION['info']['email'])?   $_SESSION['info']['email'] : ''?>">   
            </div>
            
            

            <!------- PASSWORD INPUT FIELD --------->

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" class="input" placeholder="Password" id="password" required name="password" style="user-select: none;"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
						title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
						value="<?= isset($_SESSION['info']['pass'])?   $_SESSION['info']['pass'] : ''?>">         
            </div>

            <!------- CPASSWORD INPUT FIELD --------->

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" class="input" placeholder="Confirm Password" id="cpassword" required name="cpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
						title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
						value="<?= isset($_SESSION['info']['cpass'])?   $_SESSION['info']['cpass'] : ''?>">
            </div>

            <!------- CAPTCHA INPUT FIELD --------->

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="text" class="input" name="confirmcaptcha" id="captcha" placeholder="Enter Captcha" required title="Catpcha Code can be found at our Terms and Conditions">
            </div>

            <input type="checkbox" id="show" style="display: none;">
            <input type="hidden" name="captcha" value="<?php echo $rand; ?>">

            <input type="checkbox" style="position: relative; top: 14px; left: 10px;">
            <label for="show" class="show-btn" style="text-decoration: none; font-size: 14px; position: relative; left: 5.8rem;">Terms and Conditions</label>

            <input type="submit" value="Sign Up" class="btn solid" name="signup" style="width: 350px;">      

            <p class="social-text">already have an account?</p>
            <a href="login-user.php" style="text-decoration: none; margin-top: -13px; font-size: 15px;;">Log In</a>

            <img src="img/logo.png" class="image" alt="" style="position: absolute; left:860px; bottom:290px; width:60%; z-index: 5;">

            <div class="popup-container">
               <label for="show" class="close-btn fas fa-times" title="close"></label>
              
                <h4 style="text-align: center;">Terms and Conditions</h4>

                <p style="text-align: justify;">Portfolio Maker services that enable people to connect with each other, build communities, and grow businesses. These Terms govern your use of Facebook, Messenger, and the other products, features, apps, services, technologies, and software we offer (the Meta Products or Products), except where we expressly state that separate terms (and not these) apply. <br><br>These Products are provided to you by Meta Platforms, Inc. We don’t charge you to use Facebook or the other products and services covered by these Terms, unless we state otherwise. Instead, businesses and organizations, and other persons pay us to show you ads for their products and services. By using our Products, you agree that we can show you ads that we think may be relevant to you and your interests. We use your personal data to help determine which personalized ads to show you.

                <br>
                <br>



                <label for="captcha-code">Captcha Code</label>
                <div class="captcha">
                  <?php
                  echo $rand;
                  ?>
                </div>
            </div>
          </form>  
        </div>        
      </div>

  

    <script src="app.js"></script>
    <script>
      window.onload = () => {
      const password = document.getElementById('password');
      const cpassword = document.getElementById('cpassword');

      password.onpaste = e => e.preventDefault();
      cpassword.onpaste = e => e.preventDefault();
      }

    </script>

    <script>
      let emailId = document.getElementById("email-id");
      let icon = document.getElementById("icon");
      let mailRegex = /^[a-zA-Z][a-zA-Z0-9\-\_\.]+@[a-zA-Z0-9]{2,}\.[a-zA-Z0-9]{2,}$/;

    function checker(){
    icon.style.display="inline-block";
    if(emailId.value.match(mailRegex)){
        icon.innerHTML = '<i class="fas fa-check-circle"></i>';
        icon.style.color = 'blue';

    }
    else if(emailId.value == ""){
        icon.style.display = 'none';

    }
    else{
        icon.innerHTML = '<i class="fas fa-exclamation-circle"></i>';
        icon.style.color = '#ff2851';
    }

}
    </script>





  </body>
</html>
