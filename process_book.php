<?php
// Conectar ao banco de dados
include("database.php");

// Verificar se o número do livro foi enviado via POST
if(isset($_POST['bookNumber'])) {
    $bookNumber = $_POST['bookNumber'];

    // Conectar ao banco de dados (substitua pelos seus detalhes de conexão)
    $mysqli = new mysqli("localhost", "root", "", "yrpreybib");

    // Verificar a conexão
    if ($mysqli->connect_error) {
        die("Erro de conexão: " . $mysqli->connect_error);
    }

    // Query para devolver o livro (exemplo, ajuste conforme sua estrutura do banco de dados)

    $query  = "SELECT * FROM borrowbook where number_code = '$bookNumber'"; 

    $results = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
  
    $rows = mysqli_num_rows($results);

    if ($rows > 0) {

    $sql = "DELETE FROM borrowbook WHERE number_code = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $bookNumber);

    if ($stmt->execute()) {
        echo "Livro devolvido com sucesso!";
    } else {
        echo "Erro ao devolver o livro: " . $stmt->error;
    }
    $stmt->close();
    $mysqli->close();
}
else {
    echo "Book not exist!".$bookNumber;
}
    // Fechar a conexão com o banco de dados
} else {
    echo "Número do livro não fornecido.";
}
?>
