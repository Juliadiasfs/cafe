<?php
require_once "conexao.php";

// ...
$nome = $_POST["nome"];
$tipo = $_POST["tipo"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$id = $_POST["id"];
$imagem = $_POST["imagem"];

// Verifique se um arquivo de imagem foi enviado
if (isset($imagem)) {
    

        $sql = "UPDATE PRODUTOS SET nome = ?, tipo = ?, descricao = ?, preco = ?, imagem = ? WHERE id = ?";

        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("sssssi", $nome, $tipo, $descricao, $preco, $imagem, $id);

            if ($stmt->execute()) {
                $stmt->close();
                $conn->close();

                header("Location: editar-produto-sucesso.php");
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
        // Falha no upload da imagem
        $conn->close();
        header("Location: editar-produto.php?erro=2&id=$id");
        exit();
    }
?>