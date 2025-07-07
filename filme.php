<?php
  session_start();
  include("conexao.php");
  $id = $_GET['id'] ?? 0;
  if($id == 0){
    header('Location: cadastro.php');
    exit;
  }
  $sql = "SELECT * from resenha where idfilme = $id";
  $resul = $con->query($sql);


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Detalhes do Filme</title>
  <style>
    body { font-family: Arial, sans-serif; background: #111; color: #fff; padding: 20px; }
    img { max-width: 100%; border-radius: 8px; margin: 10px 0; }
    iframe { width: 100%; height: 400px; margin-top: 20px; }
  </style>
</head>
<body>
  <div id="idfilme" style="display:none;">
    <?php
    echo htmlspecialchars($id);
    ?>
  </div>
  <h1 id="titulo"></h1>

  <div id="poster"></div>

  <p id="descricao"></p>

  <p id="ano-generos"></p>

  <h2>Elenco Principal</h2>
  <ul id="elenco"></ul>

  <h2>Imagens</h2>
  <div id="imagens"></div>

  <h2>Trailer</h2>
  <div id="trailer"></div>

  <script>
    const apiKey = '3d95436f221ecc042835cce231115c26';
    const movieId = Number(document.getElementById("idfilme").innerHTML);

    async function carregarFilme() {
      const url = `https://api.themoviedb.org/3/movie/${movieId}?api_key=${apiKey}&language=pt-BR&append_to_response=videos,images,credits&include_image_language=undefined,null`;

      const resposta = await fetch(url);
      const filme = await resposta.json();

      document.getElementById('titulo').textContent = filme.title;

      //Poster
      const posterDiv = document.getElementById('poster');
      var poster = filme.poster_path;
      if (poster) {
        let posterUrl = `https://image.tmdb.org/t/p/w500${poster}`;
        const posterIMG = document.createElement('img');
        posterIMG.src = posterUrl;
        posterDiv.appendChild(posterIMG);
      }

      document.getElementById('descricao').textContent = filme.overview;

      const dataLancamento = new Date(filme.release_date);
      const ano = dataLancamento.getFullYear();
      const generos = filme.genres.map(g => g.name).join(', ');
      document.getElementById('ano-generos').textContent = `Ano: ${ano} | Gêneros: ${generos}`;

      //Elenco
      const elencoUl = document.getElementById('elenco');
      filme.credits.cast.slice(0, 5).forEach(ator => {
        const li = document.createElement('li');
        li.textContent = ator.name + ' (como ' + ator.character + ')';
        elencoUl.appendChild(li);
      });

      //Imagens
      const imagensDiv = document.getElementById('imagens');
      if (filme.images.backdrops.length > 0) {
        filme.images.backdrops.slice(0, 3).forEach(imgData => {
          const img = document.createElement('img');
          img.src = `https://image.tmdb.org/t/p/w780${imgData.file_path}`;
          img.style = "max-width:100%; border-radius:8px; margin:10px 0;";
          imagensDiv.appendChild(img);
        });
      } 
      else{
        imagensDiv.textContent = 'Nenhuma imagem disponível.';
      }

      // Trailer
      const trailer = filme.videos.results.find(v => v.type === "Trailer" && v.site === "YouTube");
      if (trailer) {
        const iframe = document.createElement('iframe');
        iframe.src = `https://www.youtube.com/embed/${trailer.key}`;
        iframe.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture";
        iframe.allowFullscreen = true;
        document.getElementById('trailer').appendChild(iframe);
      }
    }

    carregarFilme();
  </script>
  <h1> Resenhas</h1>
  <h3> Escreva a sua!</h3>
  <form action="enviarresenha.php" method="post">
    <label for="nota">Nota:</label>
    <input type="number" name="nota" id="nota" min="0" max="10" placeholder="Nota" required>
    <label for="texto">Texto:</label>
    <textarea id="texto" name="texto" rows="15" cols="45"></textarea>
    <input type="hidden" name="poster" id="poster">
    <input id="button" type="submit" value="Enviar">
  </form>
  <hr>
  <h3> Veja as resenhas de outros usuários:</h3>
</body>
</html>
