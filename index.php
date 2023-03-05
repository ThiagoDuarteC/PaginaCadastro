<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste de Criacao de BD e Tabelas</title>
    <style>
        a{
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>
    
    <?php

    // Conexao com o MySql
    $conexao = mysqli_connect("localhost","root","") or die ("<p>Falha na Conexao com o MySql</p>");


    // Criar o Banco de Dados bd_freelers
    $criar_bd = mysqli_query($conexao,"CREATE DATABASE IF NOT EXISTS bd_account");
    echo "<p>Banco de Dados bd_account Criado";


    // Selecionar o Banco de Dados bd_freelers
    mysqli_select_db($conexao,"bd_account") or die ("<p>Falha na selecao do Banco de Dados bd_freelers</p>");


    // --- Criar a tabela cliente
    mysqli_query($conexao,"CREATE TABLE IF NOT EXISTS conta (email VARCHAR (0100) NOT NULL,
    nome VARCHAR (0100),
    senha VARCHAR (050),
    PRIMARY KEY(email),
    UNIQUE(email))
    COLLATE='utf8_general_ci'
    ENGINE=InnoDB")
    or die ("<br>Falha na criação da tabela cliente".mysql_error()."</p>");
    echo "<br>Tabela cliente Criada";

?>

    <h2>Entrar na pagina de cadastro</h2>
    <button><a href="paginaInicial.php">ENTRAR</a></button>

</body>
</html>
