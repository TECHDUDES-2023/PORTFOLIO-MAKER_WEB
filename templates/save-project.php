<?php 
$con = mysqli_connect('localhost', 'root', '', 'pmdb');
session_start();
$user_id = $_SESSION['user_id'];


if (isset($_POST['noah_save'])) {

    $folder = $_POST['dir'];
    $d1 = $_POST['d1'];
    $d2 = $_POST['d2'];
    $d3 = $_POST['d3'];
    $d4 = $_POST['d4'];
    $d5 = $_POST['d5'];
    
    $user_id = $_SESSION['user_id'];


    $select_projects= mysqli_query($con, "SELECT * FROM `projects` WHERE folder = '$folder' ") or die('query failed');
    

    if (mysqli_num_rows($select_projects) > 0){

        $project_update= "UPDATE projects SET data_one = '$d1', data_two = '$d2', data_three = '$d3', data_four = '$d4', data_five = '$d5' WHERE folder = '$folder'";
        mysqli_query($con,$project_update);
    }
    else{
        $project_update= "UPDATE projects SET data_one = '$d1', data_two = '$d2', data_three = '$d3', data_four = '$d4', data_five = '$d5' WHERE folder = '$folder'";
        mysqli_query($con,$project_update);
    }
}

if (isset($_POST['stimulus_save'])) {

    $folder = $_POST['dir'];
    $d1 = $_POST['d1'];
    $d2 = $_POST['d2'];
    $d3 = $_POST['d3'];

    
    $user_id = $_SESSION['user_id'];


    $select_projects= mysqli_query($con, "SELECT * FROM `projects` WHERE folder = '$folder' ") or die('query failed');
    

    if (mysqli_num_rows($select_projects) > 0){

        $project_update= "UPDATE projects SET data_one = '$d1', data_two = '$d2', data_three = '$d3' WHERE folder = '$folder'";
        mysqli_query($con,$project_update);
    }
    else{
        $project_update= "UPDATE projects SET data_one = '$d1', data_two = '$d2', data_three = '$d3' WHERE folder = '$folder'";
        mysqli_query($con,$project_update);
    }
}
//echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
?>
