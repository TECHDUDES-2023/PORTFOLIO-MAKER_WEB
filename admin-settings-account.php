<?php

@require_once "includes/controllerUserData.php"; 

$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM admintable WHERE email = '$email'";
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
}else{
    header('Location: login-admin.php');
}
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

	<title><?php echo $fetch_info['firstname'] ?> | Home</title>

<style>

</style>

</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="admin-dashboard.php" class="brand">
			<img src="img/logo.png" style="width: 60%; height: 98%; margin-left: 2rem; margin-top: 2.2rem;" alt="logo">
		</a>

		<ul class="side-menu">
			<li class="active">
				<a href="admin-settings-account.php">
					<i class='bx bxs-cog' ></i>
					<span class="text">Your Account</span>
				</a>
			</li>
			<li>
				<a href="admin-settings-security.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Login & Security</span>
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
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/avatar.svg">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Your Account</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Settings</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Account Settings</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="small-row">
				<p style="font-weight: 700;">Login</p>
				<p style="font-weight: 500;">Profile Photo</p>
				<img src="img/avatar.svg" alt="" style="width:10%;">
				<a href="#" class="btn" style="margin-left:20rem ;">Remove Photo</a>
				<a href="#" class="btn">Change Photo</a>
				<hr style="margin-top: 20px; width:80%;">
			</div>

			<div class="small-row">
				<p style="font-weight: 500;">Name</p>
				<p>NO FUNCTION</p>
				<a href="#" class="btn" style="margin-left:43.5rem;">Edit</a>
				<hr style="margin-top: 20px; width:80%;">
			</div>

			<div class="small-row">
				<p style="font-weight: 500;">Email Address</p>
				<p>NO FUNCTION</p>
				<a href="#" class="btn" style="margin-left:43.5rem;">Edit</a>
				<hr style="margin-top: 20px; width:80%;">
			</div>

			
			
		</main>
	</section>
	

	<script src="admin.js"></script>
</body>
</html>