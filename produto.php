<?php
    require_once("../libs/conexao.php");

    session_start();

    $id_produto = $_POST["id_produto"];
    $quantidade = $_POST["quantidade"];
    $id_usuario = $_SESSION["id"];

    $sql = "INSERT INTO compras
                (
                  id_produto,
                  id_usuario,
                  quantidade
                )
            VALUES
                (
                    {$id_produto},
                    {$id_usuario},
                    {$quantidade}
                );";

    mysqli_query($conexao, $sql) or die("Erro:". mysqli_error($conexao));

    $sql = "SELECT quantidade FROM produto WHERE id_produto = {$id_produto};";

    $result = mysqli_query($conexao, $sql) or die("Erro:". mysqli_error($conexao));

    $quantidadeProduto = mysqli_fetch_assoc($result)["quantidade"];

    if (($quantidadeProduto - $quantidade) > 0) {
        $quantidade = ($quantidadeProduto - $quantidade);
    } else {
        $quantidade = 0;
    }

    $sql = "UPDATE produto SET quantidade = {$quantidade} WHERE id_produto = {$id_produto};";

    mysqli_query($conexao, $sql) or die("Erro:". mysqli_error($conexao));

    header("Location: ../home.php");
?>