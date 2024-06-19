<?php
  ob_start();
  session_start();

  include("database.php");

  $user_id="";
    
  if (isset($_GET["id"])) {
    $user_id = $_GET["id"];
  }
  else {
  $user = "oauth";
  $user_id = "";
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
  <title>Register Book</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      max-width: 600px;
      margin-top: 50px;
    }
    .card {
      padding: 20px;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
 <?php
 include("navbar.php");
?>
  <!-- Formulário de Cadastro de Livro -->
  <div class="container">
  <?php
if (isset($_POST["Register"]))  {

  $titulo = $_POST["name"];
  $class = $_POST["class"];
  $cutter = $_POST["cutter"];
  $bookId = $_POST["bookId"];
  $author = $_POST["author"];
  $summary = $_POST["summary"];
  $nota = $_POST["nota"]; 

  $query  = "SELECT * FROM books where cutter = '$cutter' OR number_code='$bookId' OR classified='$class'"; 

  $results = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

  $rows = mysqli_num_rows($results);
      
          if ($rows == 0) {

  
  $sql = "INSERT INTO books (number_code, titulo, classified, cutter, author,summary,rating, qtde) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $mysqli->prepare($sql);
  
  // Verifique se a preparação da consulta foi bem-sucedida
  if ($stmt) {
      // Defina os valores dos parâmetros e seus tipos
      $qtde = 1; // Valor numérico
      
      // Vincule os parâmetros à instrução preparada
      $stmt->bind_param("isssssii", $bookId, $titulo, $class, $cutter, $author, $summary, $nota, $qtde);

  if ($stmt->execute()) {
    print '<br><div class="alert alert-success" role="alert">Book included with success!</div>';
  }
  }
}
else {
  print '<br><div class="alert alert-danger" role="alert">Impossible to include the record. Duplicate data.</div>';
}
}
?>     
    <div class="card">             
      <h2 class="card-title text-center">Register Book</h2>
      <form method="POST" action="">
        <div class="mb-3">
          <label for="bookName" class="form-label">Book name</label>
          <input type="text" class="form-control" id="bookName" name="name" required>
        </div>
        <div class="mb-3">
          <label for="bookName" class="form-label">Book ID</label>
          <input type="text" class="form-control" id="bookName" name="bookId" required>
        </div>        
        <div class="mb-3">
          <label for="bookSummary" class="form-label">Summary</label>
          <textarea class="form-control" id="bookSummary" rows="4" name="summary" required></textarea>
        </div>
        <div class="mb-3">
          <label for="bookSummary" class="form-label">Author</label>
          <textarea class="form-control" id="bookSummary" rows="4" name="author" required></textarea>
        </div>
        <div class="mb-3">
          <label for="bookRating" class="form-label">Classification</label>
          <input type="text" class="form-control" id="bookRating" name="class" required>
        </div>
        <div class="mb-3">
          <label for="authorCutter" class="form-label">Author Cutter</label>
          <input type="text" class="form-control" id="authorCutter" name="cutter" required>
        </div>
        <div class="mb-3">
          <label for="bookSummary" class="form-label">Rating</label>
          <input type="text" class="form-control" id="authorCutter" name="nota" required>
        </div>        
        <input type="submit" class="btn btn-primary w-100" style="background-color: #ff1a56; border-color: #ff1a56;" name="Register" value="Register">
      </form>
    </div>    
  </div>
<br><br>
  <!-- Bootstrap JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
