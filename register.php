<?php 
  if(isset($_POST['register'])) {
    include("database.php");
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conf_password = $_POST['conf_password'];
  }
?>