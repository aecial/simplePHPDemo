<?php
session_start();
include("database.php");
  if(isset($_POST["upload"])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if(in_array($fileActualExt, $allowed)) {
      if($fileError === 0) {
        if($fileSize < 500000) {
          $fileNameNew = "profile".$_SESSION['id'].".".$fileActualExt;
          $fileDestination = './uploads/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          $sqlLoc = "UPDATE users SET img_location = '{$fileDestination}' WHERE id='{$_SESSION['id']}';";
          $resultLoc = mysqli_query($conn, $sqlLoc);
          $sqlstat = "UPDATE users SET img_status =1 WHERE id='{$_SESSION['id']}';";
          $resultstat = mysqli_query($conn, $sqlstat);
        }
        else {
          echo "Maximum file size exceeded!";
        }
      }
      else {
        echo "There was an error uploading your file!";
      }
    }
    else {
      echo "You cannot upload files of this type!";
    }
    header("Location: home.php");
  }
?>