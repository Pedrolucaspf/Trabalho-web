<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro</title>
</head>
<body>
    <form action="inserir.php" method="post">
        <a href="index.php">Página principal</a>
        <h1>Cadastro</h1>
        <p> Já é cadastrado?<a href="login.php" style="color: blue;">Faça login</a></p>
        <label for="username">Nome de usuário:</label>
        <input type="text" maxlength="40" size="40" name="username" id="username" placeholder="Nome de usuário" required>
        <label for="email">Email:</label>
        <input type="email" maxlength="50" size="40" name="email" id="email" placeholder="Email" required>
        <label for="password">Senha:</label>
        <input type="password" maxlength="15" size="40" name="senha" id="senha" placeholder="Senha" required>
        <label for="sobre">Sobre você (opcional):</label>
        <textarea style="width: 400px" id="sobre" name="sobre" rows="40" cols="10"></textarea>
        <button type="submit" name="cadastro">Enviar</button>
        <div class="msg">
        <?php
        if(isset($_SESSION['email_existe'])){
        ?>
            <p>Email já cadastrado</p>
        <?php
        }
        elseif(isset($_SESSION['username_existe'])){
        ?>
            <p>Nome de usuário já cadastrado</p>
        <?php
        }
        unset($_SESSION['username_existe']);
        unset($_SESSION['email_existe']);
        ?>
        </div>
    </form>
</body>
</html>