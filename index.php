<?php
    session_start();
    include("conexao.php");
    $sql = "SELECT * FROM filme ORDER BY id ASC";
    $resul = $con->query($sql);
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
                    <br>Página principal<br>
                </span>
                <span class="opcao">
                    <br><a href="sobre.php" style="color: rgb(172, 228, 235);">Sobre</a><br>
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
            <h1>Lista de Filmes</h1>
            <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                <?php while($row = $resul->fetch_assoc()){ ?>
                <div style="text-align: center; width: 200px;">
                    <?php if (!empty($row['poster'])): ?>
                        <img src="<?= htmlspecialchars($row['poster']) ?>" style="width: 100%;">
                    <?php else: ?>
                    <div style="width:100%; height:300px; background:#ccc; display:flex; align-items:center; justify-content:center;">
                        <span>Sem pôster</span>
                    </div>
                    <?php endif; ?>
                    <p><a href="filme.php?id=<?= htmlspecialchars($row['id']) ?>"><?= htmlspecialchars($row['titulo']) ?></a></p>
                </div>
                <?php } ?>
            </div>
        </div> 
    </body>
</html>