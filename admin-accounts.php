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



if(isset($_POST['update_plan'])){
    $id = $_POST['id'];
    $plan = $_POST['plan'];

 
    $update_query = mysqli_query($con, "UPDATE `usertable` SET plan = '$plan' WHERE id = '$id'");
 
    if($update_query){
       
       $message[] = 'product updated succesfully';
       header('location:admin-accounts.php');
    }else{
       $message[] = 'product could not be updated';
       header('location:admin-accounts.php');
    }
 
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
		.edit-form-container{
    position: fixed;
    top:0; left:0;
    z-index: 3000;
    background-color: black;
    padding:2rem;
    display: none;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    width: 100%;
 }
 
 .edit-form-container form{
    width: 25rem;
    border-radius: .5rem;
    background-color: white;
    text-align: center;
    padding:2rem;
 }
 
 .edit-form-container form .box{
    width: 100%;
    background-color: white;
    border-radius: .5rem;
    margin: .5rem;
    font-size: 1rem;
    color: var(--black);
    padding: 0.2rem 1.4rem;
    text-transform: none;
 }

 .container{
    max-width: 1200px;
    margin:0 auto;
    /* padding-bottom: 5rem; */
 }
	</style>
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
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
							<?php
                            	$conn = mysqli_connect("localhost", "root", "", "pmdb");
                            	$sql = "SELECT * from usertable";
                            	$result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result-> fetch_assoc()) {
										echo '<tr>
										<td>'. $row['id'] .'</td>
										<td>'. $row['firstname'] .'</td>
										<td>'. $row['lastname'] .'</td>
										<td>'. $row['email'] .'</td>
										<td>'. $row['status'] .'</td>
										<td>'. $row['plan'] .'</td>
										<td> <a href="admin-accounts.php?edit='. $row['id'] .'" class="btn-download">Update Plan</a></td>
									  </tr>';
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
	
	<div class="container">
    <section class="edit-form-container">

    <?php

    if(isset($_GET['edit'])){
    $edit_id = $_GET['edit'];
    $edit_query = mysqli_query($con, "SELECT * FROM `usertable` WHERE id = $edit_id");
    if(mysqli_num_rows($edit_query) > 0){
        while($fetch_edit = mysqli_fetch_assoc($edit_query)){
    ?>

        <form action="" method="post" enctype="multipart/form-data">
        
        <input type="hidden" name="id" value="<?php echo $fetch_edit['id']; ?>">
        <input type="text" class="box" required name="plan" value="<?php echo $fetch_edit['plan']; ?>">

        <input type="submit" value="update plan" name="update_plan" class="btn-download">
		
        <input type="reset" value="cancel" class="btn-download" onclick="location.href='admin-accounts.php';">

        </form>

    <?php
         };
      };
      echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
   };
    ?>

    </section>
</div>





	<script src="admin.js"></script>
</body>
</html>