<?php
$con = mysqli_connect('localhost', 'root', '', 'pmdb');
session_start();

$user_id = $_SESSION['user_id'];
$rand = rand(9999,1000);



if (!isset($user_id)) {
   header('location: ../../login-user.php');
}

if(isset($_POST['noah'])){
    $sourceFolder = '../NoahEditable';
    $destinationFolder = '../uploaded_templates/';
    $newFolderName = $rand;

    // Check if the source folder exists
  if (is_dir($sourceFolder)) {

    // Create the new destination folder with the desired name
    $destinationPath = "$destinationFolder" . $newFolderName;
    mkdir($destinationPath);
  
    // Use a recursive iterator to copy all files and subdirectories to the new location
    $iterator = new RecursiveIteratorIterator(
      new RecursiveDirectoryIterator($sourceFolder, RecursiveDirectoryIterator::SKIP_DOTS),
      RecursiveIteratorIterator::SELF_FIRST
    );
    foreach ($iterator as $file) {
      if ($file->isDir()) {
        mkdir($destinationPath . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
      } else {
        copy($file, $destinationPath . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
      }
    }
  
    // Check if the copy was successful
    if (is_dir($destinationPath)) {
      echo "Folder copied and renamed successfully.";
      $select_projects= mysqli_query($con, "SELECT * FROM `projects` WHERE user_id = '$user_id'") or die('query failed');


    if (mysqli_num_rows($select_projects) > 0){
        $project_insert="INSERT INTO projects SET user_id = '$user_id', folder = '$newFolderName' , name = 'Noah' , image = 'noah.png'";
        mysqli_query($con,$project_insert);
        header('location: ../../design-projects.php');
    }
    else{
        $project_insert="INSERT INTO projects SET user_id = '$user_id', folder = '$newFolderName' , name = 'Noah' , image = 'noah.png'";
        mysqli_query($con,$project_insert);
        header('location: ../../design-projects.php');
    }

    } else {
      echo "Failed to copy and rename folder.";
    }
  
  } else {
    echo "Source folder does not exist.";
  }

};

if(isset($_POST['stimulus'])){
    $sourceFolder = '../StimulusEditable';
    $destinationFolder = '../uploaded_templates/';
    $newFolderName = $rand;

    // Check if the source folder exists
  if (is_dir($sourceFolder)) {

    // Create the new destination folder with the desired name
    $destinationPath = "$destinationFolder" . $newFolderName;
    mkdir($destinationPath);
  
    // Use a recursive iterator to copy all files and subdirectories to the new location
    $iterator = new RecursiveIteratorIterator(
      new RecursiveDirectoryIterator($sourceFolder, RecursiveDirectoryIterator::SKIP_DOTS),
      RecursiveIteratorIterator::SELF_FIRST
    );
    foreach ($iterator as $file) {
      if ($file->isDir()) {
        mkdir($destinationPath . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
      } else {
        copy($file, $destinationPath . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
      }
    }
  
    // Check if the copy was successful
    if (is_dir($destinationPath)) {
      echo "Folder copied and renamed successfully.";
      $select_projects= mysqli_query($con, "SELECT * FROM `projects` WHERE user_id = '$user_id'") or die('query failed');


    if (mysqli_num_rows($select_projects) > 0){
        $project_insert="INSERT INTO projects SET user_id = '$user_id', folder = '$newFolderName' , name = 'Stimulus' , image = 'stimulus.png'";
        mysqli_query($con,$project_insert);
        header('location: ../../design-projects.php');
    }
    else{
        $project_insert="INSERT INTO projects SET user_id = '$user_id', folder = '$newFolderName' , name = 'Stimulus' , image = 'stimulus.png'";
        mysqli_query($con,$project_insert);
        header('location: ../../design-projects.php');
    }

    } else {
      echo "Failed to copy and rename folder.";
    }
  
  } else {
    echo "Source folder does not exist.";
  }

};




?>