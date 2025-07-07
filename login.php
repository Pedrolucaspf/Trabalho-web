<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Login</title>
    </head>
    <body>
        <form action="validarlogin.php" method="post">
            <a href="index.php"> Retornar à página principal</a>
            <h1>Login</h1>
            <input type="email" maxlength="50" size="30" name="email" placeholder="Email" required>
            <input type="password" maxlength="25" size="30" name="senha" placeholder="Senha" required>

            <input id="button" type="submit" value="Logar">
            <?php
            if(isset($_SESSION['invalido'])):
            ?>
            <div class="msg">
                <p>Email ou senha inválidos</p>
                <p>Ainda não se cadastrou? Clique <a href="cadastro.php">aqui</a></p>
            </div>
            <?php
            endif;
            unset($_SESSION['invalido']);
            ?>
        </form>
    </body>
</html>