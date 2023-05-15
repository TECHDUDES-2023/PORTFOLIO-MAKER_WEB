<?php
@require_once 'includes/controllerUserData.php';


$email = $_SESSION['email'];
$user_id = $_SESSION['user_id'];


$get_user = mysqli_query($db_connection, "SELECT * FROM `usertable` WHERE `email`='$email'");

if(mysqli_num_rows($get_user) > 0){
    $user = mysqli_fetch_assoc($get_user);
}
if($email != false ){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];!
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}
else{
    header('Location: includes/logout-user.php');
    exit;
}

//echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $user['firstname']; ?> - Portfolio Maker</title>
    <link rel="stylesheet" href="css/index.css?version=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">

   
      <style>
        .popup-container{
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          }

        .popup-container{
          display: none;
          background: #fff;
          width: 410px;
          padding: 30px;
          box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }

        #show:checked ~ .popup-container{
          display: block;
        }

        .popup-container .close-btn{
          position: absolute;
          right: 20px;
          top: 15px;
          font-size: 18px;
          cursor: pointer;
        }

        .popup-container .close-btn:hover{
          color: #3498db;
        }
      </style>

  </head>
  
  <body>
    <main>
      <div class="big-wrapper light">
        <img src="img/shape.png" alt="" class="shape" />

        <header>
          <div class="container">
            <div class="logo">
              <img src="img/logo.png" alt="Logo" />
            </div>

            <nav>
              <ul>
                <li><a href="index.php">Home</a></li>
                <li>
                  <a href="design-templates.php">Templates</a>
                  <ul>
                    <li><a href="templates/Noah/index.php">Noah</a></li>
                    <li><a href="templates/Stimulus/index.php">Stimulus</a></li>
                    
                  </ul>
                </li>
                <li><a href="design-projects.php">Projects</a></li>
                <li>
                  <a href="#">Plans and pricing</a>
                  <ul>
                    <li><a href="#">Option 1</a></li>
                    <li><a href="#">Option 2</a></li>
                    
                  </ul>
                </li>
                <i class="fa-solid fa-gears"></i>
                <li><a href="design-templates.php" class="btn">Create a design</a></li>
                <div class="dropdown">
                <?php
								if(isset($_SESSION['email'])){
									?>
                  <img src="<?php echo $user['profile_image']; ?>" class="avatar">
                  <?php
								}
								elseif($user['profile_image'] = " "){
									echo "<a href=\"login.php\">Login</a>";
								}
							?>

                    <div class="dropdown-content">
                      <a href="#">Get Mremium</a>
                      <a href="#">Privacy Policy</a>
                      <a href="includes/logout-user.php">Sign Out</a>
                  </div>
                </div>

                
                
              </ul>
            </nav>

            <div class="overlay"></div>

            <div class="hamburger-menu">
              <div class="bar"></div>
            </div>
          </div>
        </header>

        <div class="showcase-area">
          <div class="container">
            <div class="left">
              <div class="big-title"> 
                <h1>Welcome to Portfolio Maker</h1>
                <h2>Start Exploring now.</h1>

                
              </div>
              <p class="text">
                Oops! looks like our home page is still a work in progress. <br>
                :( sad
                
              </p>
              <div class="cta">
                <a href="#" class="btn">Get started</a>
              </div>
            </div>

            <div class="right">
              <img src="img/logo.png" alt="Person Image" class="person" />
            </div>
          </div>
        </div>


        <div class="small-row">
          <div class="container">
            <h2>You might want to try...</h2>
          </div>
        </div>
        <div class="small-container">
          <div class="row">
            <div class="column">
              <a href="templates/Noah/index.php"><img src="img/noah.png" alt=""></a>
              <a href="templates/Noah/index.php"><h4>Noah</h4></a>
            </div>
            <div class="column">
              <a href="templates/Stimulus/index.php"><img src="img/stimulus.png" alt=""></a>
              <a href="templates/Stimulus/index.php"><h4>Stimulus</h4></a>
            </div>
            <div class="column">
              <a href="templates/Meyawo/index.php"><img src="img/meyawo.png" alt=""></a>
              <a href="templates/Meyawo/index.php"><h4>Meyawo</h4></a>
            </div>
            </div>
          </div>
        </div>
   
        <?php

        if($user['plan'] == 'premium'){
          ?>
          <div class="small-row">
          <div class="container">
            <h2>Because you are premium...</h2>
          </div>
        </div>

        <div class="small-container">
          <div class="row">
            <div class="column">
              <a href="templates/Kards/index.php"><img src="img/kards.png" alt=""></a>
              <a href="templates/Kards/index.php"><h4>Kards</h4></a>
            </div>
            </div>
          </div>
        </div>
          <?php
          }
          elseif($user['plan'] == 'free'){}
          ?>

        <div class="small-row">
          <div class="container">
          <?php
         
         $select_projects = mysqli_query($con, "SELECT * FROM `projects` WHERE user_id = '$user_id'");
          if(mysqli_num_rows($select_projects) > 0){
         while($row = mysqli_fetch_assoc($select_projects)){
         ?>
            <h2>Recent Projects</h2>
          </div>
        </div>

        <div class="small-container">
          <div class="row">
            <div class="column">
              <a href="templates/uploaded_templates/<?php echo $row['folder']?>"><img src="img/<?php echo $row['image']?>" alt=""></a>
              <a href="templates/uploaded_templates/<?php echo $row['folder']?>"><h4><?php echo $row['name']?></h4></a>
            </div>
            <?php
            };    
            }else{
               
            };
            ?>

          </div>
        </div>
    
        <div class="bottom-area">
          <div class="container">
            <button class="toggle-btn">
              <i class="far fa-moon"></i>
              <i class="far fa-sun"></i>
            </button>
          </div>
        </div>

      </div>
      
    </main>

    <footer class="footer-distributed">
			<div class="footer-left">

				<h3>PORTFOLIO MAKER</h3>
        <img src="img/logo.png" alt="Logo" />

				<p class="footer-links">
					<a href="#">Home</a>
					·
					<a href="#">Blog</a>
					·
					<a href="#">Pricing</a>
					·
					<a href="#">About</a>
					·
					<a href="#">Faq</a>
					·
					<a href="#">Contact</a>
				</p>

				<p class="footer-company-name">Portfolio Maker @ 2022</p>

        

			</div>

      

			<div class="footer-right">

				<p>Contact Us</p>

				<form action="#" method="post">

					<input type="text" name="email" placeholder="Email">
					<textarea name="message" placeholder="Message"></textarea>
					<button>Send</button>

				</form>

			</div>

      

		</footer>

    
    

    <!-- JavaScript Files -->

    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="index.js"></script>
  </body>
</html>
