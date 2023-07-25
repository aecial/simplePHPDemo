<?php
  session_start();
  if(isset($_POST['login'])) {
    include("database.php");
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * from users WHERE username='{$username}';";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        if(password_verify($password, $row["password"])) {
          $_SESSION['id'] = $row['id'];
          $_SESSION['username'] = $row['username'];
          $_SESSION['img_status'] = $row['img_status'];
          header("Location: home.php");
        }
        else {
          echo "<script>alert('Invalid Credentials');</script>";
          header("Location: index.php");
        }
      }
    }
    else {
      header("Location: index.php?UserNotFound");
    }
    mysqli_close($conn);
  }
?>