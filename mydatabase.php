<?php
  $db_server = "localhost";
  $db_user = //db user ;
  $db_pass = //db password;
  $db_name = //db name;
  $conn = "";

  try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
  }
  catch(mysqli_sql_exception) {
    echo "<h1 class='text-danger'>Could Not Connect!</h1>";
  }
?>