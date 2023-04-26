<?php
@require_once "../../save-project.php"; 
//echo basename(__DIR__);
$folder_name = basename(__DIR__);

?>



<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="templatemo">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>Stimulus | <?php echo basename(__DIR__);?></title>
<!--
Stimulus Template
http://www.templatemo.com/tm-498-stimulus
-->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/templatemo-style.css">

<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">

</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <?php    
            $get_projects = mysqli_query($con, "SELECT * FROM `projects` WHERE user_id = '$user_id' AND folder = '$folder_name'");
            if(mysqli_num_rows($get_projects) > 0){
               while($fetch_project = mysqli_fetch_assoc($get_projects)){
     ?>

     <form action="" method="POST" autocomplete="off">
     <input type="hidden" readonly="true" name="dir" value="<?php echo basename(__DIR__);?>">


<!-- PRE LOADER -->

<div class="preloader">
     <div class="spinner">
          <span class="spinner-rotate"></span>
     </div>
</div>


<!-- Navigation Section -->

<div class="navbar navbar-fixed-top custom-navbar" role="navigation">
     <div class="container">

          <!-- navbar header -->
          <div class="navbar-header">
               <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
               </button>
               <a href="#" class="navbar-brand" contenteditable="true" id="d1">
                    <?php 
                         if (empty($fetch_project['data_one'])) {
                         echo "Portfolio Maker";
                    } else {
                         echo $fetch_project['data_one'];
                    }
                    ?>
          
                    <input type="hidden" name="d1" id="d1" value="">
               </a>
          </div>

          <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-right">
                    <li><a href="#home" class="smoothScroll" contenteditable="true">Home</a></li>
                    <li><a href="#about" class="smoothScroll" contenteditable="true">About Me</a></li>
                    <li><a href="#experience" class="smoothScroll" contenteditable="true">Experiences</a></li>
                    <li><a href="#quotes" class="smoothScroll" contenteditable="true">Testimonial</a></li>
                    <li><a href="#contact" class="smoothScroll" contenteditable="true">Contact</a></li>
                    <li><input type="submit" class="wow fadeInUp smoothScroll section-btn btn btn-success" name="stimulus_save" value="SAVE" style="margin-top: 7px;"></li>
                    <li><a href="../../../design-projects.php" class="wow fadeInUp smoothScroll section-btn btn btn-success" style="margin-top: 7px; width:auto; height:50px; padding-top:1px;"> EXIT</a></li>
               </ul>
          </div>

     </div>
</div>


<!-- Home Section -->

<section id="home" class="parallax-section">
     <div class="container">
          <div class="row">

               <div class="col-md-6 col-sm-6">
                    <div class="home-img"></div>
               </div>

               <div class="col-md-6 col-sm-6">
                    <div class="home-thumb">
                         <div class="section-title">
                              <h4 class="wow fadeInUp" data-wow-delay="0.3s" contenteditable="true">welcome to my website</h4>
                              <h1 class="wow fadeInUp" data-wow-delay="0.6s" contenteditable="true" id="d2">
                                   <?php 
                                            if (empty($fetch_project['data_two'])) {
                                                echo "Hello, I am Stimulus";
                                            } else {
                                                echo $fetch_project['data_two'];
                                            }
                                   ?>
          
                                   <input type="hidden" name="d2" id="d2" value="">
                              </h1>
                              <p class="wow fadeInUp" data-wow-delay="0.9s" contenteditable="true" id="d3">
                                   <?php 
                                            if (empty($fetch_project['data_three'])) {
                                                echo "I am a freelancer at New York City";
                                            } else {
                                                echo $fetch_project['data_three'];
                                            }
                                   ?>
          
                                   <input type="hidden" name="d3" id="d3" value="">
                              </p>
                              
                              <a href="#about" class="wow fadeInUp smoothScroll section-btn btn btn-success" data-wow-delay="1.4s" contenteditable="true">Get Started</a>
                              
                         </div>
                    </div>
               </div>


          </div>
     </div>
</section>


<!-- About Section -->

<section id="about" class="parallax-section">
     <div class="container">
          <div class="row">

               <div class="col-md-6 col-sm-12">
                    <div class="about-thumb">
                         <div class="wow fadeInUp section-title" data-wow-delay="0.4s">
                              <h1 contenteditable="true">Donec auctor</h1>
                              <p class="color-yellow" contenteditable="true">Sed vulputate vitae diam quis bibendum</p>
                         </div>
                         <div class="wow fadeInUp" data-wow-delay="0.8s">
                              <p contenteditable="true">Phasellus vulputate tellus nec tortor varius elementum. Curabitur at pulvinar ante. Duis dui urna, faucibus eget felis eu, iaculis congue sem. Mauris convallis eros massa.</p>
                              <p contenteditable="true">Quisque viverra iaculis aliquam. Etiam volutpat, justo non aliquam bibendum, sem nibh mollis erat, quis porta odio odio at velit.</p>
                         </div>
                    </div>
               </div>

               <div class="col-md-3 col-sm-6">
                    <div class="background-image about-img"></div>
               </div>

               <div class="bg-yellow col-md-3 col-sm-6">
                    <div class="skill-thumb">
                         <div class="wow fadeInUp section-title color-white" data-wow-delay="1.2s">
                              <h1 contenteditable="true">My Skills</h1>
                              <p class="color-white" contenteditable="true">Photoshop . HTML CSS JS . Web Design</p>
                         </div>

                         <div class=" wow fadeInUp skills-thumb" data-wow-delay="1.6s">
                         <strong contenteditable="true">Frontend Design</strong>
                              <span class="color-white pull-right">90%</span>
                                   <div class="progress">
                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                   </div>

                         <strong contenteditable="true">Backend processing</strong>
                              <span class="color-white pull-right">70%</span>
                                   <div class="progress">
                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                                   </div>

                         <strong contenteditable="true">HTML5 & CSS3</strong>
                              <span class="color-white pull-right">80%</span>
                                   <div class="progress">
                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                   </div>
                         </div>

                    </div>
               </div>

          </div>
     </div>
</section>


<!-- Service Section -->

<section id="service" class="parallax-section">
     <div class="container">
          <div class="row">

               <div class="bg-yellow col-md-3 col-sm-6">
                    <div class="wow fadeInUp color-white service-thumb" data-wow-delay="0.8s">
                         <i class="fa fa-desktop"></i>
                              <h3 contenteditable="true">Interface Design</h3>
                              <p class="color-white" contenteditable="true">Phasellus vulputate tellus nec tortor varius elementum. Curabitur at pulvinar ante.</p>
                    </div>
               </div>

               <div class="col-md-3 col-sm-6">
                    <div class="wow fadeInUp color-white service-thumb" data-wow-delay="1.2s">
                         <i class="fa fa-paper-plane"></i>
                              <h3 contenteditable="true">Media Strategy</h3>
                              <p class="color-white" contenteditable="true">Curabitur at pulvinar ante. Duis dui urna, faucibus eget felis eu, iaculis congue sem.</p>
                    </div>
               </div>

               <div class="bg-dark col-md-3 col-sm-6">
                    <div class="wow fadeInUp color-white service-thumb" data-wow-delay="1.6s">
                         <i class="fa fa-table"></i>
                              <h3 contenteditable="true">Mobile App</h3>
                              <p class="color-white" contenteditable="true">Mauris convallis eros massa, vitae euismod arcu tempus ut. Quisque viverra iaculis.</p>
                    </div>
               </div>

               <div class="bg-white col-md-3 col-sm-6">
                    <div class="wow fadeInUp service-thumb" data-wow-delay="1.8s">
                         <i class="fa fa-html5"></i>
                              <h3 contenteditable="true">Coding</h3>
                              <p contenteditable="true">Mauris convallis eros massa, vitae euismod arcu tempus ut. Quisque viverra iaculis.</p>
                    </div>
               </div>

          </div>
     </div>
</section>


<!-- Experience Section -->

<section id="experience" class="parallax-section">
     <div class="container">
          <div class="row">

               <div class="col-md-6 col-sm-6">
                    <div class="background-image experience-img"></div>
               </div>

               <div class="col-md-6 col-sm-6">
                    <div class="color-white experience-thumb">
                         <div class="wow fadeInUp section-title" data-wow-delay="0.8s">
                              <h1 contenteditable="true">My Experiences</h1>
                              <p class="color-white" contenteditable="true">Previous companies and my tasks</p>
                         </div>

                         <div class="wow fadeInUp color-white media" data-wow-delay="1.2s">
                              <div class="media-object media-left">
                                   <i class="fa fa-laptop"></i>
                              </div>
                              <div class="media-body">
                                   <h3 class="media-heading" contenteditable="true">Graphic Designer <small>2014 Jul - 2015 Sep</small></h3>
                                   <p class="color-white" contenteditable="true">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                              </div>
                         </div>

                         <div class="wow fadeInUp color-white media" data-wow-delay="1.6s">
                              <div class="media-object media-left">
                                   <i class="fa fa-laptop"></i>
                              </div>
                              <div class="media-body">
                                   <h3 class="media-heading" contenteditable="true">Web Designer <small>2015 Oct - 2017 Jan</small></h3>
                                   <p class="color-white" contenteditable="true">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                              </div>
                         </div>

                    </div>
               </div>

          </div>
     </div>
</section>


<!-- Education Section -->

<section id="education" class="parallax-section">
     <div class="container">
          <div class="row">

               <div class="col-md-6 col-sm-6">
                    <div class="color-white education-thumb">
                         <div class="wow fadeInUp section-title" data-wow-delay="0.8s">
                              <h1 contenteditable="true">My Education</h1>
                              <p class="color-white" contenteditable="true">In cursus orci non ipsum gravida dignissim</p>
                         </div>

                         <div class="wow fadeInUp color-white media" data-wow-delay="1.2s">
                              <div class="media-object media-left">
                                   <i class="fa fa-laptop"></i>
                              </div>
                              <div class="media-body">
                                   <h3 class="media-heading" contenteditable="true">Master in Design <small>2012 Jan - 2014 May</small></h3>
                                   <p class="color-white" contenteditable="true">Etiam iaculis elit in mauris ullamcorper auctor. Proin a sapien id orci ullamcorper dignissim eu in neque. </p>
                              </div>
                         </div>

                         <div class="wow fadeInUp color-white media" data-wow-delay="1.6s">
                              <div class="media-object media-left">
                                   <i class="fa fa-laptop"></i>
                              </div>
                              <div class="media-body">
                                   <h3 class="media-heading" contenteditable="true">Bachelor of Arts <small>2008 May - 2011 Dec</small></h3>
                                   <p class="color-white" contenteditable="true">Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                              </div>
                         </div>

                    </div>
               </div>

               <div class="col-md-6 col-sm-6">
                    <div class="background-image education-img"></div>
               </div>

          </div>
     </div>
</section>


<!-- Quotes Section -->

<section id="quotes" class="parallax-section">
     <div class="overlay"></div>
     <div class="container">
          <div class="row">

               <div class="col-md-offset-1 col-md-10 col-sm-12">
                    <i class="wow fadeInUp fa fa-star" data-wow-delay="0.6s"></i>
                    <h2 class="wow fadeInUp" data-wow-delay="0.8s" contenteditable="true">Proin lobortis eu diam et facilisis. Fusce nisi nibh, molestie in vestibulum quis, auctor et orci.</h2>
                    <p class="wow fadeInUp" data-wow-delay="1s" contenteditable="true">Curabitur at pulvinar ante. Duis dui urna, faucibus eget felis eu, iaculis congue sem.</p>
               </div>

          </div>
     </div>
</section>


<!-- Contact Section -->

<section id="contact" class="parallax-section">
     <div class="container">
          <div class="row">

               <div class="col-md-6 col-sm-12">
                    <div class="contact-form">
                         <div class="wow fadeInUp section-title" data-wow-delay="0.2s">
                              <h1 class="color-white" contenteditable="true">Say hello..</h1>
                              <p class="color-white" contenteditable="true">Integer ut consectetur est. In cursus orci non ipsum gravida dignissim.</p>
                         </div>

                         <div id="contact-form">
                              <form action="#template-mo" method="post">
                                   <div class="wow fadeInUp" data-wow-delay="1s">
                                        <input name="fullname" type="text" class="form-control" id="fullname" placeholder="Your Name">
                                   </div>
                                   <div class="wow fadeInUp" data-wow-delay="1.2s">
                                        <input name="email" type="email" class="form-control" id="email" placeholder="Your Email">
                                   </div>
                                   <div class="wow fadeInUp" data-wow-delay="1.4s">
                                        <textarea name="message" rows="5" class="form-control" id="message" placeholder="Write your message..."></textarea>
                                   </div>
                                   <div class="wow fadeInUp col-md-6 col-sm-8" data-wow-delay="1.6s">
                                        <input name="submit" type="submit" class="form-control" id="submit" value="Send">
                                   </div>
                              </form>
                         </div>

                    </div>
               </div>

               <div class="col-md-3 col-sm-6">
                    <div class="background-image contact-img"></div>
               </div>

               <div class="bg-dark col-md-3 col-sm-6">
                    <div class="contact-thumb">
                         <div class="wow fadeInUp contact-info" data-wow-delay="0.6s">
                              <h3 class="color-white" contenteditable="true">Visit my office</h3>
                              <p contenteditable="true">456 New Street 22000, New York City, USA</p>
                         </div>

                         <div class="wow fadeInUp contact-info" data-wow-delay="0.8s">
                              <h3 class="color-white" contenteditable="true">Contact.</h3>
                              <p contenteditable="true"><i class="fa fa-phone"></i> 01-0110-0220</p>
                              <p contenteditable="true"><i class="fa fa-envelope-o"></i> <a href="mailto:hello@company.co">hello@company.co</a></p>
                              <p contenteditable="true"><i class="fa fa-globe"></i> <a href="#">company.co</a></p>
                         </div>

                    </div>
               </div>

          </div>
     </div>
</section>


<!-- Footer Section -->

<footer>
	<div class="container">
		<div class="row">

               <div class="col-md-12 col-sm-12">
                    <div class="wow fadeInUp footer-copyright" data-wow-delay="1.8s">
                         <p>Copyright &copy; 2016 Your Company
                    
                    | Design: <a href="http://www.google.com/+templatemo" target="_parent">templatemo</a></p>
                    </div>
				<ul class="wow fadeInUp social-icon" data-wow-delay="2s">
                         <li><a href="#" class="fa fa-facebook"></a></li>
                         <li><a href="#" class="fa fa-twitter"></a></li>
                         <li><a href="#" class="fa fa-google-plus"></a></li>
                         <li><a href="#" class="fa fa-dribbble"></a></li>
                         <li><a href="#" class="fa fa-linkedin"></a></li>
                    </ul>
               </div>
			
		</div>
	</div>
</footer>

</form>

<!-- SCRIPTS -->

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.parallax.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>




<script>

     
<?php
            }

      }else{
        echo "Error bwiset";
      }
      ?>

// Get the h2 and h3 elements
     var d1 = document.getElementById('d1');
     var d2 = document.getElementById('d2');
     var d3 = document.getElementById('d3');

    
    // Get the hidden input fields inside the var elements
    var hiddenInput1 = d1.querySelector('input[type="hidden"]');
    var hiddenInput2 = d2.querySelector('input[type="hidden"]');
    var hiddenInput3 = d3.querySelector('input[type="hidden"]');

    
    // Set the initial value of the hidden input fields to the trimmed content of the h2 and h3 elements
    hiddenInput1.value = d1.textContent.trim().replace(/'/g, "");
    hiddenInput2.value = d2.textContent.trim().replace(/'/g, "");
    hiddenInput3.value = d3.textContent.trim().replace(/'/g, "");

    
    // Add an event listener to the var elements to update the value of the hidden input fields whenever their content changes
    d1.addEventListener('input', function() {
        hiddenInput1.value = d1.textContent.trim().replace(/'/g, "");
    });
    d2.addEventListener('input', function() {
        hiddenInput2.value = d2.textContent.trim().replace(/'/g, "");
    });
    d3.addEventListener('input', function() {
        hiddenInput3.value = d3.textContent.trim().replace(/'/g, "");
    });




</script>




</body>
</html>