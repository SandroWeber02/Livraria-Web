<?php
session_start();
include_once("conexao_bd.php");

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    $sql = "SELECT * FROM acervo WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row_livro = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row_livro !== false) {
        $sql = "UPDATE acervo 
                SET titulo = :titulo, autor = :autor, ano = :ano, preco = :preco, quantidade = :quantidade
                WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':autor', $autor, PDO::PARAM_STR);
        $stmt->bindParam(':ano', $ano, PDO::PARAM_STR);
        $stmt->bindParam(':preco', $preco, PDO::PARAM_STR);
        $stmt->bindParam(':quantidade', $quantidade, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        echo "Livro editado com sucesso!";
    } else {
        echo "Livro não encontrado.";
    }
} catch (PDOException $e) {
    echo "Erro ao editar livro: " . $e->getMessage();
}

$conn = null; 
?>