<?php
    require_once("../libs/conexao.php");

    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);

    $sql = "SELECT id,
                   nome,
                   email
              FROM usuarios
             WHERE email = '{$email}'
               AND senha = '{$senha}';";

    $result = mysqli_query($conexao, $sql) or die("Erro: ".mysqli_error($conexao));

    if (mysqli_num_rows($result) > 0) {
        $aUsuario = mysqli_fetch_assoc($result);

        session_start();
        $_SESSION["id"] = $aUsuario["id"];
        $_SESSION["nome"] = $aUsuario["nome"];
        $_SESSION["email"] = $aUsuario["email"];

        header("Location: ../home.php");
    } else {
        header("Location: ../index.php");
    }
?>