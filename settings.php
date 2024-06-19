<?php
  ob_start();
  session_start();

  include("database.php");

  $user_id="";
    
  if (isset($_GET["id"])) {
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
  <title>Configurações do Usuário</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .settings-header {
      background-color: rgb(255,26,86); border-color: #ff1a56;
      color: #fff;
      padding: 50px 0;
      text-align: center;
    }
    .settings-header h1 {
      margin: 0;
      font-size: 3rem;
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

  <!-- Settings Header -->
  <header class="settings-header">
    <div class="container">
      <h1>Configurações da Conta</h1>
      <p>Gerencie suas configurações de conta e preferências.</p>
    </div>
  </header>

  <!-- Content Sections -->
  <div class="container content-section">
    <div class="row">
      <div class="col-lg-4">
        <ul class="list-group">
          <li class="list-group-item active" aria-current="true" style="background-color: #ff1a56; border-color: #ff1a56;">Informações Pessoais</li>
          <li class="list-group-item">Segurança</li>
          <li class="list-group-item">Preferências</li>
        </ul>
      </div>      
      <div class="col-lg-8">
      <?php

if (isset($_POST["info"]))    {

$name = $_POST["name"];
$email = $_POST["email"];

$sql = "UPDATE operators SET username=?, email=? WHERE id=?";

$stmt = $mysqli->prepare($sql);

if ($stmt) {

    $stmt->bind_param("ssi", $name, $email, $user_id);

    if ($stmt->execute()) {
    print '<br><div class="alert alert-success" role="alert">Informations updated with success!</div>';
  }

}
}
?>        
        <!-- Informações Pessoais -->
        <div class="card mb-4">
          <div class="card-header">Informações Pessoais</div>
          <div class="card-body">
          <form method="POST" action="">
              <div class="mb-3">
                <label for="firstName" class="form-label">Nome</label>
                <input type="text" class="form-control" id="firstName" value="John" name="name">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" value="john.doe@example.com" name="email">
              </div>
              <input type="submit" class="btn btn-primary" style="background-color: #ff1a56; border-color: #ff1a56;" value="Salvar Alterações" name="info">
            </form>
          </div>
        </div>
<?php
        if (isset($_POST["alter"]))    {

$pass = $_POST["pass"];
$pass1 = $_POST["pass1"];
$pass2 = $_POST["pass2"];

$query  = "SELECT * FROM operators where pass = '$pass'"; 
  $results = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

  $rows = mysqli_num_rows($results);

  if ($rows == 1) {
    
    if ($pass1 == $pass2) {
    
$sql = "UPDATE operators SET pass=? WHERE id=?";

$stmt = $mysqli->prepare($sql);

if ($stmt) {

    $stmt->bind_param("si", $pass1, $user_id);

    if ($stmt->execute()) {
    print '<br><div class="alert alert-success" role="alert">Informations updated with success!</div>';
  }
}
}
else {
  print '<br><div class="alert alert-danger" role="alert">Password diferent!</div>';
}
}
else {
  print '<br><div class="alert alert-danger" role="alert">Password incorret!</div>';
}
        }        
?>        
        <!-- Segurança -->
        <div class="card mb-4">
          <div class="card-header">Segurança</div>
          <div class="card-body">
          <form method="POST" action="">
              <div class="mb-3">
                <label for="currentPassword" class="form-label">Senha Atual</label>
                <input type="password" class="form-control" id="currentPassword" name="pass">
              </div>
              <div class="mb-3">
                <label for="newPassword" class="form-label">Nova Senha</label>
                <input type="password" class="form-control" id="newPassword" name="pass1">
              </div>
              <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirme a Nova Senha</label>
                <input type="password" class="form-control" id="confirmPassword" name="pass2">
              </div>
              <input type="submit" class="btn btn-primary" style="background-color: #ff1a56; border-color: #ff1a56;" value="Alterar Senha" name="alter">
            </form>
          </div>
        </div>

        <?php

if (isset($_POST["langbtn"]))    {

$lang1 = $_POST["lang"];

$sql = "UPDATE operators SET idioma=? WHERE id=?";

$stmt = $mysqli->prepare($sql);

if ($stmt) {

    $stmt->bind_param("si", $lang1, $user_id);

    if ($stmt->execute()) {
    print '<br><div class="alert alert-success" role="alert">Language updated with success!</div>';
  }

}
}
?>        

        <!-- Preferências -->
        <div class="card mb-4">
          <div class="card-header">Preferências</div>
          <div class="card-body">
            <form method="POST" action="">
              <div class="mb-3">
                <label for="language" class="form-label">Idioma</label>
                <select class="form-select" id="language" name="lang">
                  <option selected>Português</option>
                  <option>Inglês</option>
                  <option>Espanhol</option>
                </select>
              </div>
              <input type="submit" class="btn btn-primary" style="background-color: #ff1a56; border-color: #ff1a56;" value= "Salvar Preferências" name="langbtn">
            </form>
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
