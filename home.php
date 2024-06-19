<?php
  ob_start();
  session_start();

  include("database.php");

  $user_id="";
    
  if (isset($_GET["id"]) AND !empty($_GET["id"])) {
    $user_id = $_GET["id"];
  }
  else {
    exit(header("location: index.php"));
  }

  $query  = "SELECT * FROM operators where id = '$user_id'"; 
  $results = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

  $rows = mysqli_num_rows($results);
      
          if ($rows > 0) {

              $row = mysqli_fetch_assoc($results);
      
              $id = $row["id"];
              $username = $row["username"];
          }                              

          if (isset($_COOKIE["user"])) {

            if (str_contains($_COOKIE["user"],"admin")) {
              $status = "administrator";
            }
            else {
              $status="";
            }
          }          
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bem-vindo, <?php echo $username; ?>!</title>
  <link rel="icon" href="/assets/img/favicon.svg" title="YRprey">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .welcome-header {
      background-color: rgb(255,26,86); border-color: #ff1a56;
      color: #fff;
      padding: 50px 0;
      text-align: center;
    }
    .welcome-header h1 {
      margin: 0;
      font-size: 3rem;
    }
    .welcome-header p {
      font-size: 1.5rem;
    }
    .nav-link {
      font-size: 1.2rem;
    }
    .content-section {
      padding: 60px 0;
    }
    footer {
      background-color: #343a40;
      color: #fff;
      padding: 20px 0;
      text-align: center;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <?php

  include("navbar.php");

  ?>

  <!-- Welcome Header -->
  <header class="welcome-header">
    <div class="container">
      <h1>Bem-vindo, <?php echo $username; ?>!</h1>
      <p>Estamos felizes em tê-lo de volta <?php echo $status; ?>.</p>
    </div>
  </header>

  <!-- Content Sections -->
  <div class="container content-section">
    <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <img src="assets/img/01.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">To borrow a book</h5>
            <p class="card-text">Borrow book.</p>
            <a href="searchStudent.php" class="btn btn-primary" style="background-color: #ff1a56; border-color: #ff1a56;">Access</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
        <img src="assets/img/02.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">To search for a book</h5>
            <p class="card-text">Search books.</p>
            <a href="search.php" class="btn btn-primary" style="background-color: #ff1a56; border-color: #ff1a56;">Access</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
        <img src="assets/img/03.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">To return a book</h5>
            <p class="card-text">Return books.</p>
            <a href="return.php" class="btn btn-primary" style="background-color: #ff1a56; border-color: #ff1a56;">Access</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright © yrprey 2024</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">·</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">·</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>  

  <!-- Bootstrap JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
