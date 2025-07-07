<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Filmes Base | Gerenciar conta</title>
</head>
<body class="principal">
    <form action="atualizar.php" method="post">
        <h1>Atualização de dados</h1>
        <p> Obs: Não é necessário atualizar todos.</p>
        <label for="username">Nome de usuário:</label>
        <input type="text" maxlength="40" size="40" name="username" id="username" placeholder="Nome de usuário" required>
        <label for="email">Email:</label>
        <input type="email" maxlength="50" size="40" name="email" id="email" placeholder="Email" required>
        <label for="password">Senha:</label>
        <input type="password" maxlength="15" size="40" name="senha" id="senha" placeholder="Senha" required>
        <label for="sobre">Sobre você:</label>
        <textarea style="width: 400px" id="sobre" name="sobre" rows="40" cols="10"></textarea>
        <button type="submit" name="Atualizar">Enviar</button>
    </form>
    <hr>
    <h1>Excluir conta</h1>
    <form action="excluir.php" method="post">
        <button type="submit" name="Excluir">Tem certeza?</button>
    </form>
</body>
</html>