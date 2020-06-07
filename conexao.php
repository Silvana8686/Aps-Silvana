<?php
    
    $servidor = "localhost";
    $porta = 3306;
    $bancoDeDados = "loja";
    $usuario = "root";
    $senha = '';
    
    
    $conexao = mysqli_connect($servidor, $usuario, $senha, $bancoDeDados, $porta);


    if(!$conexao) {
        die("Não foi possí­vel se conectar ao banco de dados.\n\n Erro: ".mysqli_error($conexao));
    }