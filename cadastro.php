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
<body class="principal">
    <form id="conteudo" action="inserir.php" method="post">
        <a href="index.php">Página principal</a>
        <h1>Cadastro</h1>
        <p> Já é cadastrado?<a href="login.php" style="color: blue;">Faça login</a></p>
        <label for="username">Nome de usuário:</label>
        <input type="text" maxlength="40" size="40" name="username" placeholder="Nome de usuário" required>
        <label for="email">Email:</label>
        <input type="email" maxlength="50" size="40" name="email" placeholder="Email" required>
        <label for="password">Senha:</label>
        <input type="password" maxlength="15" size="40" name="senha" placeholder="Senha" required>
         <label for="foto">Foto de perfil:</label>
        <input type="file" id="foto" name="foto">
        <label for="sobre">Sobre você (opcional):</label>
        <textarea style="width: 400px" id="sobre" name="sobre" rows="40" cols="10"></textarea>
        <button type="submit" name="cadastro" onclick="return validarCampos();">Enviar</button>

        <?php
        if(isset($_SESSION['usuario_existe'])):
        ?>
        <div class="msg">
            <p>Usuário já cadastrado</p>
        </div>
        <?php
        endif;
        unset($_SESSION['usuario_existe']);
        ?>
    </form>
</body>
</html>