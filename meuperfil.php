<?php
include("header.php");

if (empty($_SESSION['valido'])) {
    header('Location: login.php');
    exit;
}

$email = $_SESSION['email'];
$sql = "SELECT * from usuario where email= ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$resul = $stmt->get_result();
$dados = $resul->fetch_assoc();
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <h1 class="mb-4">Perfil de <?php echo htmlspecialchars($dados['username']); ?></h1>

        <div class="card bg-dark border-secondary mb-4">
            <div class="card-body">
                <h4 class="card-title">Meus Dados</h4>
                <p><strong>Número de cadastro:</strong> <?php echo $dados['id']; ?></p>
                <p><strong>Nome de usuário:</strong> <?php echo htmlspecialchars($dados['username']); ?></p>
                <p><strong>E-mail:</strong> <?php echo htmlspecialchars($email); ?></p>
                <hr>
                <h5>Sobre mim:</h5>
                <p><?php echo !empty($dados['sobre']) ? nl2br(htmlspecialchars($dados['sobre'])) : '<i>Nenhuma informação adicionada.</i>'; ?></p>
            </div>
        </div>

        <div class="card bg-dark border-secondary">
            <div class="card-body">
                <h4 class="card-title">Gerenciar Conta</h4>
                <p>Para modificar seus dados ou excluir sua conta, confirme sua senha abaixo.</p>

                <?php if (isset($_SESSION['incorreto'])) : ?>
                    <div class="alert alert-danger">Senha incorreta.</div>
                    <?php unset($_SESSION['incorreto']); ?>
                <?php endif; ?>
                <?php if (isset($_SESSION['atualizado'])) : ?>
                    <div class="alert alert-success">Dados atualizados com sucesso.</div>
                    <?php unset($_SESSION['atualizado']); ?>
                <?php endif; ?>

                <form action="validarsenha.php" method="post">
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="senha" placeholder="Sua senha" required>
                        <button class="btn btn-primary" type="submit">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
$stmt->close();
include("footer.php");
?>