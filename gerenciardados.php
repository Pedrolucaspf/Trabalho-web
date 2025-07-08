<?php include 'header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card bg-dark border-secondary mb-4">
            <div class="card-body">
                <h1 class="card-title">Atualização de Dados</h1>
                <p class="card-text text-muted">Preencha apenas os campos que deseja alterar.</p>
                <form action="atualizar.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nome de usuário:</label>
                        <input type="text" class="form-control" maxlength="40" name="username" id="username" placeholder="Novo nome de usuário">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" maxlength="50" name="email" id="email" placeholder="Novo email">
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha:</label>
                        <input type="password" class="form-control" maxlength="15" name="senha" id="senha" placeholder="Nova senha">
                    </div>
                    <div class="mb-3">
                        <label for="sobre" class="form-label">Sobre você:</label>
                        <textarea class="form-control" id="sobre" name="sobre" rows="4"></textarea>
                    </div>
                    <button type="submit" name="Atualizar" class="btn btn-primary">Salvar Alterações</button>
                </form>
            </div>
        </div>

        <div class="card bg-danger-subtle border-danger">
            <div class="card-body">
                <h1 class="card-title text-danger">Excluir Conta</h1>
                <p><strong>Atenção:</strong> Esta ação é irreversível e todos os seus dados, incluindo suas resenhas, serão permanentemente apagados.</p>
                <form action="excluir.php" method="post" onsubmit="return confirm('Você tem certeza ABSOLUTA que deseja excluir sua conta? Esta ação não pode ser desfeita.');">
                    <button type="submit" name="Excluir" class="btn btn-danger">Sim, eu tenho certeza e quero excluir minha conta</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>