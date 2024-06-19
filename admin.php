<?php
// Conectar ao banco de dados (substitua pelos seus detalhes de conexão)
include("database.php");
if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

if (isset($_GET["action"])) {
    if ($_GET["action"] === "true") {        
    }
    else {
        exit(header("location: index.php"));        
    }
}
else {

    if (isset($_COOKIE["user"])) {

        if (str_contains($_COOKIE["user"],"admin")) {
          $status = "administrator";
        }
    }
    else {
        exit(header("location: index.php"));
    }
}

// Query para buscar todos os alunos
$sql = "SELECT id, nome FROM students";
$result = $mysqli->query($sql);

// Fechar a conexão com o banco de dados após buscar os alunos
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
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
<body>
<?php

  include("navbar.php");

  ?>    
    <div class="container mt-5">
        <h2 class="mb-4">Lista de Alunos</h2>
        <div id="responseMessage" class="mb-3"></div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody id="studentList">
                <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
                        echo '<td><button class="btn btn-danger" onclick="removeStudent(' . $row['id'] . ')">Remover</button></td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Nenhum aluno encontrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function removeStudent(studentId) {
            if (confirm('Tem certeza de que deseja remover este aluno?')) {
                var customReferer = 'https://arbitrary-incorrect-domain.net?YOUR-LAB-ID.web-security-academy.net';

                // Fazer solicitação para a página PHP passando o Referer personalizado
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'remove_student.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.setRequestHeader('Referer', customReferer); 
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            document.getElementById('responseMessage').innerHTML = '<div class="alert alert-success">' + xhr.responseText + '</div>';
                            // Remover a linha do aluno da tabela
                            var row = document.querySelector('tr[data-id="' + studentId + '"]');
                            if (row) {
                                row.parentNode.removeChild(row);
                            }
                        } else {
                            document.getElementById('responseMessage').innerHTML = '<div class="alert alert-danger">Erro ao remover o aluno.</div>';
                        }
                    }
                };
                xhr.send('id=' + studentId); // Enviar o ID do aluno para remoção
            }
        }
    </script>
</body>
</html>
