<?php
@require_once 'includes/controllerUserData.php';

$email = $_SESSION['email'];


if(!isset($_SESSION['email'])){
    header('Location: login-user.php');
    exit;
}

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
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $user['firstname']; ?> - Portfolio Maker</title>
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
        }
        body{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7ff;
            padding: 10px;
            margin: 0;
        }
        ._container{
            max-width: 400px;
            background-color: #ffffff;
            padding: 20px;
            margin: 0 auto;
            border: 1px solid #cccccc;
            border-radius: 2px;
        }
        .heading{
            text-align: center;
            color: #4d4d4d;
            text-transform: uppercase;
        }
        ._img{
            overflow: hidden;
            width: 100px;
            height: 100px;
            margin: 0 auto;
            border-radius: 50%;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        ._img > img{
            width: 100px;
            min-height: 100px;
        }
        ._info{
            text-align: center;
        }
        ._info h1{
            margin:10px 0;
            text-transform: capitalize;
        }
        ._info p{
            color: #555555;
        }
        ._info a{
            display: inline-block;
            background-color: #E53E3E;
            color: #fff;
            text-decoration: none;
            padding:5px 10px;
            border-radius: 2px;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="_container">
        <h2 class="heading">My Account</h2>
    </div>
    <div class="_container">
        <div class="_img">
            <img src="<?php echo $user['profile_image']; ?>" alt="<?php echo $user['firstname']; ?>">
        </div>
        <div class="_info">
            <h1><?php echo $user['firstname']; ?></h1>
            <p><?php echo $user['email']; ?></p>
            <a href="includes/logout-user.php">Logout</a>
        </div>
    </div>
</body>
</html>