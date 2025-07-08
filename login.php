<?php include 'header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card bg-dark border-secondary">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Login</h1>

                <?php if (isset($_SESSION['invalido'])) : ?>
                    <div class="alert alert-danger">
                        Email ou senha inválidos.
                    </div>
                    <?php unset($_SESSION['invalido']); ?>
                <?php endif; ?>
                <?php if (isset($_SESSION['erro_login'])) : ?>
                    <div class="alert alert-warning">
                        <?php echo $_SESSION['erro_login']; unset($_SESSION['erro_login']); ?>
                    </div>
                <?php endif; ?>

                <form action="validarlogin.php" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" maxlength="50" name="email" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha:</label>
                        <input type="password" class="form-control" maxlength="25" name="senha" placeholder="Senha" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Logar</button>
                    </div>
                </form>
                <p class="mt-3 text-center">Ainda não se cadastrou? <a href="cadastro.php">Clique aqui</a></p>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>