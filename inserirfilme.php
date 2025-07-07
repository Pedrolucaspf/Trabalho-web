<html>
    <head>
    </head>
    <body>
        <div id="sql">
        <?php
            require_once 'conexao.php';
            $sql = "SELECT * from filme";
            $resul = $con->query($sql);
            if($resul->num_rows === 0){
                $id = 1;
            }
            else{
                $sql2 = "SELECT MAX(id) from filme";
                $resul2 = $con->query($sql2);
                $row = $resul2->fetch_assoc();
                $id = (int)$row['MAX(id)'] + 1;
            }
            echo htmlspecialchars($id);
        ?>
        </div>
        <script>
            async function addDadosFilme(event){
                event.preventDefault();
                var movieId = Number(document.getElementById("sql").innerHTML);
                const apiKey = '3d95436f221ecc042835cce231115c26';
                for(let i = 0; i < 100; i++){   
                    let url = `https://api.themoviedb.org/3/movie/${movieId}?api_key=${apiKey}&language=pt-BR`;
                    let resposta = await fetch(url);
                    if (!resposta.ok) {
                        movieId = movieId + 1;
                        continue;
                    }
                    let filme = await resposta.json();
                    var titulo = filme.title;
                    var poster = filme.poster_path;
                    if(titulo){
                        //document.getElementById('msg').innerHTML = "Filme a ser adicionado - Id: "+movieId+", titulo:"+titulo;
                        let posterUrl = poster ? `https://image.tmdb.org/t/p/w500${poster}` : null;

                        document.getElementById('idFilme').value = movieId;
                        document.getElementById('titulo').value = titulo;
                        document.getElementById('poster').value = posterUrl || '';
                        document.getElementById('submitFilme').submit();
                        break;
                    }
                    else{
                        movieId = movieId + 1;
                    }
                }
               ;
            }

            document.addEventListener('DOMContentLoaded', () => {
                const form = document.getElementById('submitFilme');
                form.addEventListener('submit', addDadosFilme);
                }
            );
        </script>
        <p id="msg"></p>
        <form id="submitFilme" action="addfilme.php" method="post">
            <input type="hidden" name="idFilme" id="idFilme">
            <input type="hidden" name="titulo" id="titulo">
            <input type="hidden" name="poster" id="poster">
            <button type="submit">
                Adicionar novo filme ao banco de dados
            </button>
        </form>
    </body>
</html>
