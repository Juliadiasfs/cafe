<?php
require_once "conexao.php";
// Obter os dados do formulário
$tipo = $_POST["tipo"];
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$imagem = $_POST["imagem"];

    // Inserir os dados na tabela 'usuario'
    $sql = "INSERT INTO produtos (tipo, nome, descricao, imagem, preco) VALUES 
    ('$tipo', '$nome', '$descricao', '$imagem', '$preco')";

    if ($conn->query($sql) === TRUE) {
        header("Location: cadastrar-produto-sucesso.php");
        exit();
    } else {
        header("Location: cadastrar-produto.php?erro=2");
        exit();
    }
    $conn->close();