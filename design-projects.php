<?php

@require_once "includes/controllerUserData.php"; 

$user_id = $_SESSION['user_id'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/admin.css">

	<title>Create a Design | Portfolio Maker</title>
	<style>
#content main .box-info li{
    padding: 10px !important;
    background: var(--light);
    border-radius: 20px;
    display: block;
    align-items: center;
    grid-gap: 24px;
}
	</style>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="index.php" class="brand">
			<img src="img/logo.png" style="width: 60%; height: 98%; margin-left: 2rem; margin-top: 2.2rem;" alt="logo">
			
		</a>
		<ul class="side-menu top">
        <li>
				<a href="design-templates.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Templates</span>
				</a>
			</li>
			<li class="active">
				<a href="design-projects.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Projects</span>
				</a>
			</li>
		</ul>


	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			
			<form action="#">
				<div class="form-input">
					
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
					
				</div>
			</form>
			
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<!---
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/avatar.svg">
			</a>

			--->
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Your Recent Projects</h1>
				</div>
			</div>
		

			<ul class="box-info">

			<?php
         
		 	$select_projects = mysqli_query($con, "SELECT * FROM `projects` WHERE user_id = '$user_id'");
		 	if(mysqli_num_rows($select_projects) > 0){
			while($row = mysqli_fetch_assoc($select_projects)){
	  		?>
                <li>
                    <a href="templates/uploaded_templates/<?php echo $row['folder']?>/index.php" ><img src="img/<?php echo $row['image']?>" style="width: 80%; margin-left:30px" alt=""></a>
                    <span class="text">
						<h3><?php echo $row['folder']?></h3>
					</span>
				</li>          

				<?php
            };    
            }else{
               echo "<div class='empty'>You have no recent projects</div>";
            };
         ?>


			</ul>



		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="admin.js"></script>
</body>
</html>