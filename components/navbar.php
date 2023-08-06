<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">
      <img src="./assets/logo.png" alt="" srcset="" width="40px" height="40px">
      Peysbuk
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon overflow-hidden p-0">
      <?php
          /*
            STATUS:
              0 = not yet uploaded
              1 = uploaded
            Checks the status, if it is 0 the default picture will be shown in the profile
            if its 1 their uploaded picture will be shown
           */
          if($_SESSION['img_status'] == 0) {
            echo "<img
            src='./assets/coolAvatar.svg'
            alt='Logout Picture' 
            class='img-fluid'
          />";
          }
          else {
            // output the img by using image location in the database
            include("database.php");
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM users WHERE id='$id';";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                $img_location = $row['img_location'];
                echo "<img
                src='".$img_location."'
                alt='Logout Picture' 
                class='img-fluid'
                ".mt_rand()."
                />";
              }
            }
            
          }
        ?>
       <!-- <img src="./assets/coolAvatar.svg" alt="ror" class="myImg img-fluid rounded-circle"> -->
      </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav text-end me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php"><i class="fa-solid fa-house-chimney"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php"><i class="fa-solid fa-clipboard-question"></i> About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php"><i class="fa-solid fa-address-book"></i> Contact</a>
        </li>
      </ul>
      <hr>
      <form action="logout.php" method="post">
        <button type="submit" name="logout" class="btn btn-outline-danger float-end">
        <i class="fa-solid fa-person-walking-arrow-right"></i> LOGOUT
        </button>
      </form>
    </div>
  </div>
</nav>