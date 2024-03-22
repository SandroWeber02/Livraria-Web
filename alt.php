<?php
session_start();
include_once("conexao_bd.php");


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$query = "SELECT * FROM acervo WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
?>
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
    <?php

    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    $row_livro = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>

<main class="content">
    <form method="POST" action="Funalt.php">

        <label>Selecione </label>
        <input type="number" name="id" value="<?php echo $row_livro['id']; ?>"><br><br>

        <label>Título: </label>
        <input type="text" name="titulo"  value="<?php echo $row_livro['titulo']; ?>"><br><br>

        <label>Autor: </label>
        <input type="text" name="autor"  value="<?php echo $row_livro['autor']; ?>"><br><br>

        <label>Ano: </label>
        <input type="number" name="ano"  value="<?php echo $row_livro['ano']; ?>"><br><br>

        <label>Preço: </label>
        <input type="number" name="preco" value="<?php echo $row_livro['preco']; ?>"><br><br>

        <label>Quantidade: </label>
        <input type="number" name="quantidade"  value="<?php echo $row_livro['quantidade']; ?>"><br><br>

        <input type="submit" value="Editar">
    </form>
  </main>
</body>

</html>