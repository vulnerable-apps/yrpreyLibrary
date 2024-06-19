<?php
if (isset($_POST['id'])) {
    $studentId = $_POST['id'];
    
    // Verificar o Referer
    $customReferer = 'localhost';
    if (!str_contains($_SERVER['HTTP_REFERER'],$customReferer)) {
        echo "Referer inválido.";
        exit();
    }

    // Conectar ao banco de dados (substitua pelos seus detalhes de conexão)
    include("database.php");

    // Verificar a conexão
    if ($mysqli->connect_error) {
        die("Erro de conexão: " . $mysqli->connect_error);
    }

    // Query para remover o aluno da tabela students
    $sql = "DELETE FROM students WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $studentId);

    if ($stmt->execute()) {
        echo "Student Remove!".$studentId;
    } else {
        echo "Erro to sudent remove: " . $stmt->error;
    }

    // Fechar a conexão com o banco de dados
    $stmt->close();
    $mysqli->close();
} else {
    echo "ID undefined.";
}
?>
