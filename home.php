<?php
  session_start();
  if(empty($_SESSION['id'])) {
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HomePage</title>
    <link rel="icon" type="image/x-icon" href="./assets/nekoIcon2.ico">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://kit.fontawesome.com/fae056ab45.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div
      class="d-flex flex-column justify-content-center align-items-center my-auto min-vh-100"
    >
      <h1>Hello <?php echo strtoupper($_SESSION['username']); ?></h1>
      <div class="d-flex justify-content-center">
        <img
          src="./assets/logoutDemo.svg"
          alt="Logout Picture" 
          class="img-fluid"
          width="450px"
          height="450px"
        />
      </div>
      <form action="logout.php" method="post">
        <button type="submit" name="logout" class="btn btn-outline-danger">
          LOGOUT
        </button>
      </form>
    </div>
  </body>
</html>
