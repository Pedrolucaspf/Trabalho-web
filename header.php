<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes Base</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-body">
            <div class="container">
                <a class="navbar-brand" href="index.php">FilmesBase</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Página Principal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sobre.php">Sobre</a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <?php if (isset($_SESSION['valido'])) : ?>
                            <?php
                            $email = $_SESSION['email'];
                            $sql_user = "SELECT username FROM usuario WHERE email = ?";
                            $stmt_user = $con->prepare($sql_user);
                            $stmt_user->bind_param("s", $email);
                            $stmt_user->execute();
                            $resul_user = $stmt_user->get_result();
                            $user = $resul_user->fetch_assoc();
                            ?>
                            <span class="navbar-text me-3">
                                Olá, <?php echo htmlspecialchars($user['username']); ?>!
                            </span>
                            <a href="meuperfil.php" class="btn btn-outline-primary me-2">Meu Perfil</a>
                            <a href="sair.php" class="btn btn-outline-danger">Sair</a>
                        <?php else : ?>
                            <a href="login.php" class="btn btn-outline-primary me-2">Login</a>
                            <a href="cadastro.php" class="btn btn-primary">Cadastrar-se</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="container py-5">