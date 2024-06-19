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
  <title>Search Student</title>
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
    .card-img-top {
      max-height: 400px;
      object-fit: cover;
    }
    .card-body {
      position: relative;
    }
    .rating {
      position: absolute;
      top: 10px;
      right: 10px;
      background-color: #ffc107;
      padding: 5px 10px;
      border-radius: 5px;
      font-size: 18px;
      color: #fff;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
<?php
  include("navbar.php");
?>

  <!-- Formulário de Consulta de Livro -->
  <div class="container">
    <div class="card mb-4">
      <h2 class="card-title text-center">Search Student</h2>
      <form id="searchForm">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="searchQuery" name="searchQuery" placeholder="Type studant name or id...">
          <button class="btn btn-primary" type="submit" style="background-color: #ff1a56; border-color: #ff1a56;">Search</button>
        </div>
      </form>
    </div>

    <!-- Resultado da Consulta
    <div id="bookResult" class="d-none">
    
    <h5 class="card-title" id="bookName"></h2>
    <p class="card-text" id="bookSummary"></p>
    <p class="card-text"><strong>Autor:</strong> <span id="bookAuthor"></p>
    <p class="card-text"><strong>Classificação:</strong> <span id="bookRating">5</span> <span class="rating">&#9733;</span></p>
    <p class="card-text"><strong>Cutter do Autor:</strong> <span id="authorCutter">Cutter do Autor</span></p>
        <span class="rating"></span>
    </div>
  </div>
-->

<div id="bookResult" class="card d-none">
      <div class="card-body">
        <h5 class="card-title"><strong>Aluno:</strong> <span id="bookName"></span></h5>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
   document.getElementById('searchForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const searchQuery = document.getElementById('searchQuery').value;

    fetch('searchStud.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `searchQuery=${encodeURIComponent(searchQuery)}`
    })
    .then(response => response.json())
    .then(bookData => {
        if (bookData) {
            // Preenchendo os dados no card
            document.getElementById('bookName').innerHTML = "<a href='library.php?id="+bookData.id+"'>"+bookData.nome+"</a>";

            // Exibindo o card com os dados do livro
            document.getElementById('bookResult').classList.remove('d-none');
        } else {
            // Trate a ausência de dados, se necessário
            alert('Book not found.');
        }
    })
    .catch(error => console.error('Error:', error));
});

  </script>
</body>
</html>
