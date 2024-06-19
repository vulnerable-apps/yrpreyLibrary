<?php
// Conectar ao banco de dados
include("database.php");

if (isset($_GET["id"])) {
    $id= $_GET["id"];
}
elseif (isset($_POST["id"])) {
    $id= $_POST["id"];
}
else {
    exit(header("location: searchStudent.php"));
}
// Função para listar livros emprestados
$id = 1;

function getBorrowedBooks($mysqli, $id) {
    $sql = "SELECT number_code, aluno, titulo FROM borrowbook WHERE id_student = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $books = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $books;
}

// Função para devolver um livro
function returnBook($mysqli, $bookId) {
    $sql = "DELETE FROM borrowbook WHERE number_code = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $bookId);
    $stmt->execute();
    $stmt->close();
}

// Função para emprestar um novo livro
function borrowBook($mysqli, $bookNumber, $id) {
    $query = "SELECT * FROM books WHERE number_code = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $bookNumber);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    
    if ($row) {
        $number_code = $row["number_code"];
        $titulo = $row["titulo"];
        $author = $row["author"];
        
        $sql = "INSERT INTO borrowbook (id_student, number_code, aluno, titulo) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("iiss", $id, $number_code, $author, $titulo);
        $stmt->execute();
        $stmt->close();
    } else {
        echo '<div class="alert alert-danger" role="alert">Book not Found!</div>';
    }
}

// Manipulação das requisições POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'return') {
        $bookId = $_POST['bookId'];
        returnBook($mysqli, $bookId);
    } elseif (isset($_POST['bookNumber'])) {
        $bookNumber = $_POST['bookNumber'];
        borrowBook($mysqli, $bookNumber, $id);
    }
}

// Listar os livros emprestados
$books = getBorrowedBooks($mysqli, $id);

// Fechar a conexão com o banco de dados
//$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - Livros Emprestados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
<div class="container mt-5">
        <div class="user-info">
<?php

$query  = "SELECT * FROM students where id = '$id'"; 
$results = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

  $rows = mysqli_num_rows($results);
      
          if ($rows > 0) {

              $row = mysqli_fetch_assoc($results);
      
              $name = $row["nome"];
          }
?>              
            <img src="assets/img/student.jpg" alt="Imagem do Usuário" class="img-fluid">
            <h2><?php echo $name; ?></h2>
        </div>
        
        <h2 class="mb-4">Livros Emprestados</h2>
        
        <!-- Alerta se o livro não for encontrado -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody id="borrowedBooksList">
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($book['number_code']); ?></td>
                        <td><?php echo htmlspecialchars($book['titulo']); ?></td>
                        <td><?php echo htmlspecialchars($book['aluno']); ?></td>
                        <td>
                            <form method="POST" action="library.php" style="display:inline;">
                                <input type="hidden" name="action" value="return">
                                <input type="hidden" name="bookId" value="<?php echo $book['number_code']; ?>">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <button type="submit" class="btn btn-danger">
                                    Remove
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3 class="mt-4">Emprestar Novo Livro</h3>
        <form id="borrowBookForm" method="POST" action="library.php">
            <div class="form-group">
                <label for="bookNumber">Número do Livro</label>
                <input type="text" class="form-control" id="bookNumber" name="bookNumber" required>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Emprestar</button>
        </form>
    </div>
</body>
</html>
