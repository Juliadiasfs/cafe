<?php
require_once "conexao.php";

// ...
$nome = $_GET["nome"];
$tipo = $_GET["tipo"];
$descricao = $_GET["descricao"];
$preco = $_GET["preco"];
$id = $_GET["id"];
$imagem = $_GET["imagem"];

// Verifique se um arquivo de imagem foi enviado
if (isset($imagem) && !empty($imagem)) {


    $imagem = "img/" . $imagem;
    $sql = "DELETE PRODUTOS WHERE id = ?";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sssdsi", $id);

        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();

            header("Location: editar-produto-sucesso.php?teste=1&id=$id");
            exit();
        } else {
            // A execução da consulta SQL falhou
            $stmt->close();
            $conn->close();
            header("Location: editar-produto.php?erro=1&id=$id");
            exit();
        }
    } else {
        // A preparação da consulta SQL falhou
        $conn->close();
        header("Location: editar-produto.php?erro=1&id=$id");
        exit();
    }
} else {

    $sql = "UPDATE PRODUTOS SET nome = ?, tipo = ?, descricao = ?,
         preco = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sssdi", $id);

        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();

            header("Location: editar-produto-sucesso.php?teste=2&id=$id");
            exit();
        } else {
            // A execução da consulta SQL falhou
            $stmt->close();
            $conn->close();

            header("Location: editar-produto.php?erro=1&id=$id");
            exit();
        }
    }
}

