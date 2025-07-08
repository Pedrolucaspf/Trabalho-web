<?php
include("header.php");

$sql = "SELECT * FROM filme ORDER BY id DESC LIMIT 50"; // Ordena por mais recente e limita
$resul = $con->query($sql);
?>

<div class="text-center mb-5">
    <h1>Filmes em Destaque</h1>
    <p class="lead">Explore nossa coleção de filmes e veja o que outros estão dizendo.</p>
</div>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
    <?php while ($row = $resul->fetch_assoc()) : ?>
        <div class="col">
            <div class="card h-100 bg-dark text-white card-movie">
                <a href="filme.php?id=<?= htmlspecialchars($row['id']) ?>">
                    <?php if (!empty($row['poster'])) : ?>
                        <img src="<?= htmlspecialchars($row['poster']) ?>" class="card-img-top" alt="Poster de <?= htmlspecialchars($row['titulo']) ?>">
                    <?php else : ?>
                        <div class="d-flex align-items-center justify-content-center" style="height: 380px; background-color: #343a40;">
                            <span>Sem pôster</span>
                        </div>
                    <?php endif; ?>
                </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">
                        <a href="filme.php?id=<?= htmlspecialchars($row['id']) ?>" class="text-white text-decoration-none">
                            <?= htmlspecialchars($row['titulo']) ?>
                        </a>
                    </h5>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php include("footer.php"); ?>