<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Devolver ou Remover Livro</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
    .user-info {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 20px;
    }
    .user-info img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      margin-right: 20px;
    }    
  </style> 
</head>
<?php
include("navbar.php");
?>
<body>
    <br><br>
    <div class="container">
        <h1>Devolver ou Remover Livro</h1>
        <form id="bookForm">
            <div class="form-group">
                <label for="bookNumber">Número do Livro:</label>
                <input type="text" class="form-control" id="bookNumber" name="bookNumber" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="returnBookBtn">Devolver Livro</button>
            </div>
        </form>
        <div id="resultMessage" class="mt-3"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#bookForm').submit(function(e) {
                e.preventDefault();
                var bookNumber = $('#bookNumber').val();

                $.ajax({
                    type: 'POST',
                    url: 'process_book.php', // Arquivo PHP para processar a devolução ou remoção do livro
                    data: { bookNumber: bookNumber },
                    success: function(response) {
                        $('#resultMessage').html('<div class="alert alert-success" role="alert">' + response + '</div>');
                    },
                    error: function(xhr, status, error) {
                        $('#resultMessage').html('<div class="alert alert-danger" role="alert">Erro: ' + error + '</div>');
                    }
                });
            });          
        });
    </script>
</body>
</html>
