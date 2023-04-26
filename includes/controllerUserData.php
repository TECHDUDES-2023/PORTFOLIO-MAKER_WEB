<?php 
session_start();
session_regenerate_id(true);
require "connection.php";
$email = "";
$fname = "";
$errors = array();

//if user signup button
if(isset($_POST['signup'])){
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $confirmcaptcha = mysqli_real_escape_string($con, $_POST['confirmcaptcha']);
    $captcha = mysqli_real_escape_string($con, $_POST['captcha']);
    
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }

    elseif($confirmcaptcha != $captcha){
        $errors['confirmcaptcha'] = "Incorrect Captcha Code";
    }

    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(strlen($fname) <2 || strlen($fname) >30){
		$errors['fname']="Firstname must be atleast 3 characters";
	}

    elseif(strlen($lname) <2 || strlen($lname) >30){
		$errors['lname']="Lastname must be atleast 2 characters";
	}

    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO usertable (firstname, lastname, email, password, code, status, plan)
                        values('$fname', '$lname','$email', '$encpass', '$code', '$status', 'free')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            $subject = "Activate Your Portfolio Maker Account";
            $headers = array(
                "MIME-Version" => "1.0",
                "Content-Type" =>"text/html;charset=UTF-8",
                "From" =>"portfolio.maker.web@gmail.com",
                "Reply-To" =>"portfolio.maker.web@gmail.com"
            );

            $message = "
            Your verification code is $code
            To finish signing up for your Portfolio Maker account, you must use the code above and enter it to the verification box to confirm your email address.
            
            After you verify your account, you can now use Portfolio Maker sevices, 
            Start Editing your portfolio, use special tools, templates and start your wondeful journey with us.
                        
            For more urgent concerns, you may call us at (63) 930-568-0911
                        
            Sincerely,
            Portfolio Maker

            <p><img src='../img/logo.png'></p>
            ";

            $sender = "From: Portfolio Maker";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: ./user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['firstname'] = $fname;
                $_SESSION['email'] = $email;
                $_SESSION['user_id'] = $fetch['id'];;
                header('location: ./login-user.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click login button
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $check_email = "SELECT * FROM usertable WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);


        if(mysqli_num_rows($res) > 0){

            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];


            if(password_verify($password, $fetch_pass)){

                $_SESSION['email'] = $email;
                $status = $fetch['status'];


                if($status == 'verified'){

                  $_SESSION['email'] = $email;
                  $_SESSION['user_id'] = $fetch['id'];;

                    header('location: ./index.php');
                }else{

                    $info = "It's look like you haven't still verify your email - $email";
                    $_SESSION['info'] = $info;
                    
                    header('location: ./user-otp.php');

                }
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }


    

    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM usertable WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE usertable SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code
                <p><img src='../img/logo.png'></p>
Thank you for reaching out to Portfolio Maker Customer Care
Please bear with us as we try to respond to all customer queries. Rest assured that we will be looking into your email.

For more urgent concerns, you may call us at (63) 930-568-0911
Thank you and have a good day!



Tech Dudes Customer Care Team
";
                $sender = "From: Portfolio Maker";
                if(mail($email, $subject, $message, $sender)){
                    $info = "We've sent a password reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: ./reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: ./new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE usertable SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: ./password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: ./login-user.php');
    }


    //ADMIN -----------------------------

    //if ADMIN click login button
    if(isset($_POST['loginadmin'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_email = "SELECT * FROM admintable WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $status = $fetch['status'];
                if($status == 'verified'){
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                    header('location: ./admin-dashboard.php');
                }else{
                    $info = "It's look like you haven't still verify your email - $email";
                    $_SESSION['info'] = $info;
                    header('location: ./user-otp.php');
                }
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }

    //if ADMIN click change password button
    if(isset($_POST['admin-change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE admintable SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: ./admin-password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }

    //if ADMIN login now button click
    if(isset($_POST['admin-login-now'])){
        header('Location: ./admin-login.php');
    }


    
?>