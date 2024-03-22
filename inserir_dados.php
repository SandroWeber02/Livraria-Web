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
// Conectar ao banco de dados (substitua os valores conforme sua configuração)
$servidor = "localhost";
$usuario = "root";
$senha = "123";
$banco = "ProjectGit";

try {
    $conn = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Processar o formulário
    $titulo = $_POST['nomeTitulo'];
    $autor = $_POST['nomeAutor'];
    $ano = $_POST['anoLivro'];
    $preco = $_POST['precoLivro'];
    $quantidade = $_POST['qtdLivro'];
    $nome = $_POST['editora'];

    // Upload da imagem
    $nome_arquivo = $_FILES['foto']['name'];
    $caminho_temporario = $_FILES['foto']['tmp_name'];
    $caminho_destino = './uploads/' . $nome_arquivo; // Diretório onde a imagem será armazenada


    if (move_uploaded_file($caminho_temporario, $caminho_destino)) {
        // Inserir dados no banco de dados
        $sql = "INSERT INTO acervo (titulo, autor, ano, preco, quantidade, editora, foto) 
                VALUES ('$titulo', '$autor', '$ano', '$preco', '$quantidade', '$nome', '$caminho_destino')";
        if ($conn->query($sql) === TRUE) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Livro Cadastrado: " . $conn->errorInfo()[2];
        }
    } else {
        echo "Erro aoa cadastrar";
    }
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco: " . $e->getMessage();
}
?>

<a href="cadastrar_livro.php">Voltar</a>




</body>
</html>