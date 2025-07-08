<?php
include("header.php");

$id = $_GET['id'] ?? 0;
if ($id == 0) {
    header('Location: index.php');
    exit;
}


$sql_filme_info = "SELECT nota_media FROM filme WHERE id = ?";
$stmt_filme = $con->prepare($sql_filme_info);
$stmt_filme->bind_param("i", $id);
$stmt_filme->execute();
$filme_info = $stmt_filme->get_result()->fetch_assoc();
$nota_media = $filme_info['nota_media'] ?? null; 
$stmt_filme->close();

$sql_resenhas = "SELECT r.*, u.username 
                 FROM resenha r 
                 JOIN usuario u ON r.idusuario = u.id 
                 WHERE r.idfilme = ? 
                 ORDER BY r.id DESC";
$stmt = $con->prepare($sql_resenhas);
$stmt->bind_param("i", $id);
$stmt->execute();
$resul_resenhas = $stmt->get_result();
?>

<div id="idfilme" style="display:none;"><?php echo htmlspecialchars($id); ?></div>

<div class="row">

    <div class="col-md-4">
        <div id="poster"></div>
    </div>
  
    <div class="col-md-8">
        <h1 id="titulo" class="mb-3"></h1>
        

        <div id="nota-media-container" class="fs-4 mb-3"></div>
        
        <p id="ano-generos" class="text-muted"></p>
        <p id="descricao"></p>

        <h3 class="mt-4">Elenco Principal</h3>
        <ul id="elenco" class="list-unstyled"></ul>

        <h3 class="mt-4">Trailer</h3>
        <div id="trailer" class="ratio ratio-16x9"></div>
    </div>
</div>

<h3 class="mt-5">Imagens</h3>
<div id="imagens" class="row gx-2 gy-2"></div>


<hr class="my-5">
<div class="row">
    <div class="col-md-8">
        <h2 class="mb-4">Resenhas</h2>

        <?php if (isset($_SESSION['valido'])) : ?>
            <h4>Escreva a sua!</h4>
            
            <?php if(isset($_SESSION['sucesso_resenha'])): ?>
                <div class="alert alert-success"><?php echo $_SESSION['sucesso_resenha']; unset($_SESSION['sucesso_resenha']); ?></div>
            <?php endif; ?>
            <?php if(isset($_SESSION['erro_resenha'])): ?>
                <div class="alert alert-danger"><?php echo $_SESSION['erro_resenha']; unset($_SESSION['erro_resenha']); ?></div>
            <?php endif; ?>

            <form action="enviarresenha.php" method="post" class="card card-body bg-dark border-secondary">
                <input type="hidden" name="idFilme" value="<?php echo htmlspecialchars($id); ?>">
                <div class="mb-3">
                    <label for="nota" class="form-label">Nota (0 a 10):</label>
                    <input type="number" class="form-control" name="nota" id="nota" min="0" max="10" step="0.5" placeholder="Sua nota" required>
                </div>
                <div class="mb-3">
                    <label for="texto" class="form-label">Sua Resenha:</label>
                    <textarea class="form-control" id="texto" name="texto" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar Resenha</button>
            </form>
        <?php else : ?>
            <div class="alert alert-info">
                <a href="login.php">Faça login</a> para escrever uma resenha.
            </div>
        <?php endif; ?>

        <h4 class="mt-5">Resenhas de outros usuários:</h4>
        <?php if ($resul_resenhas->num_rows > 0) : ?>
            <?php while ($resenha = $resul_resenhas->fetch_assoc()) : ?>
                <div class="card bg-dark border-secondary mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($resenha['username']); ?></h5>
                        <h6 class="card-subtitle mb-2 text-warning">Nota: <?php echo htmlspecialchars(number_format($resenha['nota'], 1)); ?> / 10</h6>
                        <p class="card-text"><?php echo nl2br(htmlspecialchars($resenha['conteudo'])); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <p>Ainda não há resenhas para este filme. Seja o primeiro!</p>
        <?php endif; ?>
    </div>
</div>

<script>

    const notaMedia = <?php echo ($nota_media !== null) ? number_format($nota_media, 1, '.', '') : 'null'; ?>;
    const notaMediaContainer = document.getElementById('nota-media-container');

    if (notaMedia !== null) {
        notaMediaContainer.innerHTML = `<span class="badge bg-warning text-dark">Nota Média: ${notaMedia.toFixed(1)} / 10</span>`;
    } else {
        notaMediaContainer.innerHTML = `<span class="badge bg-secondary">Ainda sem avaliações</span>`;
    }
    
    const apiKey = '3d95436f221ecc042835cce231115c26';
    const movieId = Number(document.getElementById("idfilme").innerHTML);

    async function carregarFilme() {
        const url = `https://api.themoviedb.org/3/movie/${movieId}?api_key=${apiKey}&language=pt-BR&append_to_response=videos,images,credits&include_image_language=undefined,null`;
        const resposta = await fetch(url);
        const filme = await resposta.json();

        document.getElementById('titulo').textContent = filme.title;
        document.title = filme.title + " | FilmesBase"; 

        const posterDiv = document.getElementById('poster');
        if (filme.poster_path) {
            posterDiv.innerHTML = `<img src="https://image.tmdb.org/t/p/w500${filme.poster_path}" class="img-fluid rounded">`;
        }

        document.getElementById('descricao').textContent = filme.overview;

        const dataLancamento = new Date(filme.release_date);
        const ano = dataLancamento.getFullYear();
        const generos = filme.genres.map(g => g.name).join(', ');
        document.getElementById('ano-generos').textContent = `Ano: ${ano} | Gêneros: ${generos}`;

        const elencoUl = document.getElementById('elenco');
        elencoUl.innerHTML = ''; 
        filme.credits.cast.slice(0, 5).forEach(ator => {
            const li = document.createElement('li');
            li.textContent = `${ator.name} (como ${ator.character})`;
            elencoUl.appendChild(li);
        });

        const imagensDiv = document.getElementById('imagens');
        imagensDiv.innerHTML = ''; 
        if (filme.images.backdrops.length > 0) {
            filme.images.backdrops.slice(0, 4).forEach(imgData => {
                const col = document.createElement('div');
                col.className = 'col-md-3';
                col.innerHTML = `<img src="https://image.tmdb.org/t/p/w780${imgData.file_path}" class="img-fluid rounded">`;
                imagensDiv.appendChild(col);
            });
        } else {
            imagensDiv.innerHTML = '<p>Nenhuma imagem disponível.</p>';
        }

        const trailerDiv = document.getElementById('trailer');
        const trailer = filme.videos.results.find(v => v.type === "Trailer" && v.site === "YouTube");
        if (trailer) {
            trailerDiv.innerHTML = `<iframe src="https://www.youtube.com/embed/${trailer.key}" allowfullscreen></iframe>`;
        } else {
            trailerDiv.innerHTML = '<p>Nenhum trailer encontrado.</p>';
        }
    }

    carregarFilme();
</script>

<?php
$stmt->close();
include("footer.php");
?>