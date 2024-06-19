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
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil do Usuário</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .profile-header {
      background-color: rgb(255,26,86); border-color: #ff1a56;
      color: #fff;
      padding: 50px 0;
      text-align: center;
    }
    .profile-header h1 {
      margin: 0;
      font-size: 3rem;
    }
    .nav-link {
      font-size: 1.2rem;
    }
    .profile-content {
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

  <!-- Profile Header -->
  <header class="profile-header">
    <div class="container">
      <h1>Perfil do Usuário</h1>
      <p>Bem-vindo ao seu perfil!</p>
    </div>
  </header>

  <!-- Profile Content -->
  <div class="container profile-content">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="https://via.placeholder.com/150" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
<?php

$query  = "SELECT * FROM operators where id = '$user_id'"; 
  $results = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

  $rows = mysqli_num_rows($results);
      
          if ($rows > 0) {

              $row = mysqli_fetch_assoc($results);
      
              $id = $row["id"];
              $username = $row["username"];
              $nick = $row["nick"];
              $email = $row["email"];
              $tel = $row["tel"];
              $addres = $row["addres"];
              $idioma = $row["idioma"];
              $city = $row["city"];
              $country = $row["country"];
              $professional = $row["professional"];
          }                              

?>          
            <h5 class="my-3"><?php echo $username; ?></h5>
            <p class="text-muted mb-1"><?php echo $professional; ?></p>
            <p class="text-muted mb-4"><?php echo $city; ?>, <?php echo $country; ?></p>
            <a href="settings.php?id=<?php echo $id; ?>" class="btn btn-primary" style="background-color: #ff1a56; border-color: #ff1a56;"> Edit Profile</a>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $username; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $email; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Telephone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $tel; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $addres; ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card mb-4">
              <div class="card-body">
                <h5 class="card-title">History</h5>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Login realizado em 15/06/2024</li>
                  <li class="list-group-item">Alteração de senha em 10/06/2024</li>
                  <li class="list-group-item">Atualização de perfil em 05/06/2024</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-4">
              <div class="card-body">
                <h5 class="card-title">Language</h5>
                <p class="card-text">Idioma: <?php echo $idioma; ?></p><p>&nbsp;</p>
                <a href="settings.php?id=<?php echo $id; ?>" class="btn btn-primary" style="background-color: #ff1a56; border-color: #ff1a56;">Edit Settings</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <div class="container">
      <p>&copy; 2024 Minha Aplicação. Todos os direitos reservados.</p>
    </div>
  </footer>

  <!-- Bootstrap JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
