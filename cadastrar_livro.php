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
    <div class="form-container">
    <form action="inserir_dados.php" method="post" enctype="multipart/form-data">
    <label for="nomeTitulo">Título:</label>
        <input type="text" id="nomeTitulo" name="nomeTitulo" required><br><br>
        
        <label for="nomeAutor">Autor:</label>
        <input type="text" id="nomeAutor" name="nomeAutor" required><br><br>
        
        <label for="anoLivro">Ano:</label>
        <input type="text" id="anoLivro" name="anoLivro" required><br><br>
        
        <label for="precoLivro">Preço:</label>
        <input type="text" id="precoLivro" name="precoLivro" required><br><br>
        
        <label for="qtdLivro">Quantidade:</label>
        <input type="text" id="qtdLivro" name="qtdLivro" required><br><br>
        
        <label for="editora">Editora:</label>
        <input type="text" id="editora" name="editora" required><br><br>
        
        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto" accept="image/*" required><br><br>
        
        <input type="submit" value="Cadastrar">
    </form>
    </div>
</main>




</body>
</html>

























































