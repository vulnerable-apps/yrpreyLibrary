<?php
  ob_start();
  session_start();

  include("database.php");

  $user_id="";
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Empréstimo de Livro</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      max-width: 800px;
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

  <!-- Formulário de Cadastro de Empréstimo -->
  <div class="container">
    <div class="card">
      <h2 class="card-title text-center">Cadastro de Empréstimo de Livro</h2>
      <form>
        <!-- Informações do Aluno -->
        <h4 class="mt-4">Informações do Aluno</h4>
        <div class="mb-3">
          <label for="studentName" class="form-label">Nome do Aluno</label>
          <input type="text" class="form-control" id="studentName" placeholder="Digite o nome do aluno" required>
        </div>
        <div class="mb-3">
          <label for="studentID" class="form-label">ID do Aluno</label>
          <input type="text" class="form-control" id="studentID" placeholder="Digite o ID do aluno" required>
        </div>
        <div class="mb-3">
          <label for="studentEmail" class="form-label">Email do Aluno</label>
          <input type="email" class="form-control" id="studentEmail" placeholder="Digite o email do aluno" required>
        </div>
        <div class="mb-3">
          <label for="studentPhone" class="form-label">Telefone do Aluno</label>
          <input type="tel" class="form-control" id="studentPhone" placeholder="Digite o telefone do aluno" required>
        </div>
        
        <!-- Informações do Livro -->
        <h4 class="mt-4">Informações do Livro</h4>
        <div class="mb-3">
          <label for="bookName" class="form-label">Nome do Livro</label>
          <input type="text" class="form-control" id="bookName" placeholder="Digite o nome do livro" required>
        </div>
        <div class="mb-3">
          <label for="bookAuthor" class="form-label">Autor do Livro</label>
          <input type="text" class="form-control" id="bookAuthor" placeholder="Digite o nome do autor" required>
        </div>
        <div class="mb-3">
          <label for="bookCutter" class="form-label">Cutter do Autor</label>
          <input type="text" class="form-control" id="bookCutter" placeholder="Digite o cutter do autor" required>
        </div>
        <div class="mb-3">
          <label for="loanDate" class="form-label">Data do Empréstimo</label>
          <input type="date" class="form-control" id="loanDate" required>
        </div>
        <div class="mb-3">
          <label for="returnDate" class="form-label">Data de Devolução</label>
          <input type="date" class="form-control" id="returnDate" required>
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Cadastrar Empréstimo</button>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
