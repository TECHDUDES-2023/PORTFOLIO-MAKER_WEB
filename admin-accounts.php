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
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="admin-dashboard.php" class="brand">
			<img src="img/logo.png" style="width: 60%; height: 98%; margin-left: 2rem; margin-top: 2.2rem;" alt="logo">
		</a>
		<ul class="side-menu top">
			<li>
				<a href="admin-dashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="admin-accounts.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Accounts</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="admin-settings-account.php">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="includes/logout-user.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
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
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Accounts</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>

			


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Orders</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>User ID</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email</th>
								<th>Status</th>
								<th>Plan</th>
							</tr>
						</thead>
						<tbody>
							<?php
                            	$conn = mysqli_connect("localhost", "root", "", "pmdb");
                            	$sql = "SELECT * from usertable";
                            	$result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result-> fetch_assoc()) {
                                        echo "<tr>
                                        <td> $row[id]</td>
                                        <td> $row[firstname]</td>
                                        <td> $row[lastname]</td>
                                        <td> $row[email]</td>
                                        <td> $row[status]</td>
										<td> $row[plan]</td>
                                                
                                        </tr>";
                                    }
                                }
                            ?>

						</tbody>
					</table>
				</div>
				
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="admin.js"></script>
</body>
</html>