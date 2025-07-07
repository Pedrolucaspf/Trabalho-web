<?php
    session_start();
    include("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Filmes Base | Seu perfil</title>
    </head>
    <body>
        <div id="conteudo">
            <a href="index.php"> Retornar à página principal</a>
            <h1> Perfil do Usuário </h1>
            <?php
                if(empty($_SESSION['valido'])){
                    header('Location: cadastro.php');
                    exit;
                }
                if(isset($_SESSION['valido'])){
                    $email = $_SESSION['email'];
                    $sql="SELECT * from usuario where email= '$email'";
                    $resul = $con->query($sql);
                    $dados = $resul->fetch_assoc();
                    echo "<p> Número de cadastro: " . $dados['id'] . "</p>";
                    echo "<p> Nome de usuário: " . $dados['username'] . "</p>";
                    echo "<p> E-mail: " . $email . "</p><hr/>";
                    echo "<h4> Sobre mim:</h4><br>"; 
                    echo "<p>" . $dados['sobre'] . "</p>";
                }
            ?>
            <hr/><h3> Modificação de dados / Exclusão de conta (PERIGO)</h3>
            <p> Para prosseguir, informe sua senha: </p>
                <form action="validarsenha.php" method="post">
                    <input type="password" maxlength="25" size="40" name="senha" placeholder="Senha" required>
                    <input id="button" type="submit" value="Confirmar">
                    <?php
                        if(isset($_SESSION['incorreto'])):
                    ?>
                    <div class="msg">
                        <p>Senha incorreta.</p>
                    </div>
                    <?php
                        endif;
                        unset($_SESSION['incorreto']);
                    ?>
                    <?php
                        if(isset($_SESSION['atualizado'])):
                    ?>
                    <div class="msg">
                        <p>Dados atualizados com sucesso.</p>
                    </div>
                    <?php
                        endif;
                        unset($_SESSION['atualizado']);
                    ?>
                </form>
        </div>
    </body>
</html>