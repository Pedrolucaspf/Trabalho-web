<?php include 'header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card bg-dark border-secondary">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Cadastro</h1>
                <p class="text-center">Já é cadastrado? <a href="login.php">Faça login</a></p>

                <?php if (isset($_SESSION['email_existe'])) : ?>
                    <div class="alert alert-danger">Email já cadastrado.</div>
                    <?php unset($_SESSION['email_existe']); ?>
                <?php endif; ?>
                <?php if (isset($_SESSION['username_existe'])) : ?>
                    <div class="alert alert-danger">Nome de usuário já cadastrado.</div>
                    <?php unset($_SESSION['username_existe']); ?>
                <?php endif; ?>

                <form action="inserir.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nome de usuário:</label>
                        <input type="text" class="form-control" maxlength="40" name="username" id="username" placeholder="Nome de usuário" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" maxlength="50" name="email" id="email" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha:</label>
                        <input type="password" class="form-control" maxlength="15" name="senha" id="senha" placeholder="Senha" required>
                    </div>
                    <div class="mb-3">
                        <label for="sobre" class="form-label">Sobre você (opcional):</label>
                        <textarea class="form-control" id="sobre" name="sobre" rows="4"></textarea>
                    </div>
                    <div class="d-grid">
                        <button type="submit" name="cadastro" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>