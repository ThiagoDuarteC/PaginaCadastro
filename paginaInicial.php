<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Cadastro</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://kit.fontawesome.com/53ea34e7b5.css" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        
        <div class="conteudo primeiro-conteudo">

            <div class="primeira-coluna">
                <h2 class="titulo cor-primaria">seja bem vindo!</h2>
                <p class="descricao">Para manter-se conectado conosco<br/>faça o login com suas informações pessoais</p>
                <button id="login-js" class="btn troca">entrar</button>
            </div><!--primeira-coluna-->

            <div class="segunda-coluna">
                
                <h2 class="titulo cor-segundaria">Crie uma conta</h2>
                <form method="POST" class="formulario">

                    <label class="cadastro-label">
                        <span>Nome</span>
                        <input type="text" name="nome" class="input" required>
                    </label>
                    <label class="cadastro-label">
                        <span>E-mail</span>
                        <input type="email" name="email" class="input" required>
                    </label>
                    <label class="cadastro-label">
                        <span>Senha</span>
                        <input type="password" name="senha" class="input" required>
                    </label>

                    <button type="submit" class="btn cadastro" name="enviar-cadastro">cadastrar</button>
                </form>

            </div><!--segunda-coluna-->
            
        </div><!--primeiro-conteudo-->
        <div class="conteudo segundo-conteudo">

            <div class="primeira-coluna">
                <h2 class="titulo cor-primaria">Olá!</h2>
                <p class="descricao">Insira seus dados pessoais<br/>e comece sua jornada conosco</p>
                <button id="cadastrar-js" class="btn troca">cadastrar</button>
            </div><!--primeira-coluna-->

            <div class="segunda-coluna">
                <h2 class="titulo cor-segundaria">Entrar</h2>
                <form  method="POST" class="formulario">
                    <label class="login-label">
                        <span>E-mail</span>
                        <input type="email" name="email" class="input" required>
                    </label>
                    <label class="login-label">
                        <span>Senha</span>
                        <input type="password" name="senha" class="input" required>
                    </label>
                    <a class="senha" href="#">Esqueceu a sua senha?</a>
                    <button class="btn login" type="submit" name="enviar-login">entrar</button>
                </form>
            </div><!--segunda-coluna-->

        </div><!--segundo-conteudo-->

    </div><!--container-->

<script src="script.js"></script>
<script src="https://kit.fontawesome.com/53ea34e7b5.js" crossorigin="anonymous"></script>

<?php

if (isset($_POST['enviar-cadastro'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $mysqli = new mysqli("localhost","root","","bd_account");

    $sql = "INSERT INTO `conta` (`nome`, `email`, `senha`) VALUES ('" . $nome . "','" . $email . "', '" . $senha . "')";

    if ($mysqli->query($sql)) {}        
    
}

if(isset($_POST['enviar-login'])){

    $mysqli = new mysqli("localhost","root","","bd_account");

    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    $sql_code = "SELECT * FROM conta WHERE email = '$email' AND senha = '$senha'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    $quantidade = $sql_query->num_rows;

    if($quantidade == 1) {

        echo "<script>alert('Logado com Sucesso');</script>";

    } else {
        echo "<script>alert('Falha ao logar! E-mail ou senha incorretos');</script>";
    }
}

?>

</body>
</html>