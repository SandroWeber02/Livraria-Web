<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Up Livraria</title>
</head>
<body>


<header class="top-bar">
    <div class="header-content">
        <h1>Up Livraria</h1>
        <div class="search-bar">
            <form action="pesquisa_livro.php" method="GET">
                <input type="text" name="titulo">
                <button>Buscar</button>
            </form>
        </div>
    </div>
    <aside class="sidebar">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="cadastrar_livro.php">Cadastro</a></li>
                <li><a href="alt.php">Alteração</a></li>
            </ul>
        </nav>
    </aside>
</header>

<main class="content">
    <h2>Listagem de Livros</h2>
    <?php
include('conexao_bd.php');

try {

    $conn = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlAcervo = "SELECT id, titulo, autor, ano, preco, quantidade, editora, foto
                  FROM acervo";

    $stmt = $conn->prepare($sqlAcervo);
    $stmt->execute();
    $dadosAcervo = $stmt->fetchAll(PDO::FETCH_ASSOC);


    echo "<div class='card-container'>";

    foreach ($dadosAcervo as $livro) {
        echo "<div class='card'>";
        echo "<img src='{$livro['foto']}' alt='Foto do livro'>";
        echo "<h2>{$livro['titulo']}</h2>";
        echo "<p><strong>Autor:</strong> {$livro['autor']}</p>";
        echo "<p><strong>Editora:</strong> {$livro['editora']}</p>";
        echo "<p><strong>Ano:</strong> {$livro['ano']}</p>";
        echo "<p><strong>Preço:</strong> {$livro['preco']}</p>";
        echo "<p><strong>Quantidade:</strong> {$livro['quantidade']}</p>";
        echo "</div>";
    }
    
    echo "</div>";
    
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco: " . $e->getMessage();
}
?>

</main>
</body>
</html>

