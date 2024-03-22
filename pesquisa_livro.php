<?php
if (!isset($_GET['titulo'])) {
    header("Location: index.php");
    exit;
}

$titulo = "%" . trim($_GET['titulo']) . "%";
$servidor = "localhost";
$usuario = "root";
$senha = "123";
$banco = "ProjectGit";

try {
    $conn = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Alteração aqui, de $dbh para $conn
    $sth = $conn->prepare('SELECT * FROM `acervo` WHERE `titulo` LIKE :titulo');
    $sth->bindParam(':titulo', $titulo, PDO::PARAM_STR);

    if ($sth->execute()) {
        $resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $resultados = array();
        echo "Erro ao executar a consulta.";
    }
} catch (PDOException $e) {
    $resultados = array();
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}

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

    <main class="content">
        <h2>Resultado da busca</h2>

        <?php

        if (isset($resultados) && count($resultados)) {
            foreach ($resultados as $Resultado) {
                ?>
                <label>
                    <?php echo $Resultado['id']; ?> - <?php echo $Resultado['titulo']; ?>
                </label>
                <br>
                <?php
            }
        } else {
            ?>
            <label>Não foram encontrados resultados pelo termo buscado.</label>
            <?php
        }
        ?>

    </main>
</div>

</body>
</html>




