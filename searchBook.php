<?php

include("database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchQuery = $_POST['searchQuery'];

    // Simulando dados do livro com base na consulta (normalmente você faria uma consulta ao banco de dados aqui)

    $sql = "SELECT titulo, summary, author, rating, cutter FROM books WHERE titulo LIKE '%$searchQuery%' LIMIT 1";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        // Buscar os dados do livro
        $bookData = $result->fetch_assoc();
    } else {
        $bookData = null; // Nenhum dado encontrado
    }

    // Retornar os dados como JSON
    echo json_encode($bookData);    
    

    // Simular uma correspondência se a consulta de pesquisa for 'O Nome do Vento'
}
?>
