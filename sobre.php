<?php
    session_start();
    include("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Filmes Base | Sobre</title>
    </head>
    <body>
        <div>
            <div id="menu">
                <?php
                    if(isset($_SESSION['valido'])){
                    $email = $_SESSION['email'];
                    $sql="SELECT username from usuario where email= '$email'";
                    $resul = $con->query($sql);
                    $user = $resul->fetch_assoc();
                    echo "Você está logado como: ".$user['username'];
                ?>
                <span class="opcao">
                    <br><a href="index.php" style="color: rgb(172, 228, 235);">Página principal</a><br>
                </span>
                <span class="opcao">
                    <br>Sobre<br>
                </span>
                <span class="opcao">
                    <br><a href="meuperfil.php" style="color: rgb(172, 228, 235);">Seu perfil</a><br>
                </span>
                <span class="opcao">
                    <a href="sair.php" style="color: rgb(172, 228, 235);">Sair</a><br>
                </span>
                <?php
                    }
                    elseif(empty($_SESSION['valido'])){
                ?>
                <span class="opcao">
                    <a href="cadastro.php">Cadastrar-se |</a>
                    <a href="login.php"> Realizar login</a>
                </span>
                <?php
                    }
                ?>
            </div>
            <p>
                Bem vindo(a)! Nosso objetivo com este site é criar uma comunidade
                que compartilha seus filmes favoritos.
            </p>
            <p>
                Aqui, você pode escrever resenhas para diversos filmes - 
                e ler as resenhas de outros usuários!<br>
                Crie sua conta ou faça login para começar.
            </p>
            <p>
                A única regra que temos é:
                Seja respeitoso em sua escrita, evitando o uso de linguagem inapropriada sempre que possível.
            </p>
            <p>
                Qualquer dúvida, nos contate:<br>
                Email: filmesbase@emaildeverdade.com.br
                Telefone: +99 (00) 3333-5555
            </p><hr/>
        </div> 
    </body>
</html>