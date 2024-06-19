<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - Livros Emprestados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Livros Emprestados</h2>
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
                <!-- Livros emprestados serão inseridos aqui via PHP -->
            </tbody>
        </table>

        <h3 class="mt-4">Emprestar Novo Livro</h3>
        <form id="borrowBookForm" method="POST" action="library.php">
            <div class="form-group">
                <label for="bookNumber">Número do Livro</label>
                <input type="text" class="form-control" id="bookNumber" name="bookNumber" required>
            </div>
            <button type="submit" class="btn btn-primary">Emprestar</button>
        </form>
    </div>

    <script>
        function returnBook(bookId) {
            if (confirm('Tem certeza de que deseja devolver este livro?')) {
                $.ajax({
                    url: 'library.php',
                    type: 'POST',
                    data: { action: 'return', bookId: bookId },
                    success: function(response) {
                        location.reload();
                    },
                    error: function(error) {
                        console.error('Erro ao devolver o livro:', error);
                    }
                });
            }
        }
    </script>
</body>
</html>
