<?php
    include 'conexao.php';
    if(isset($_POST["idFilme"])){
        $id = (int)$_POST["idFilme"];
        if(isset($_POST["titulo"])){
            $titulo = $_POST["titulo"];
            $poster = $_POST['poster'] ?? null;
            $query = "INSERT INTO filme (id, titulo, poster) values (?,?,?)";
            $stmt = $con->prepare($query);
            if($stmt === false){
                //echo "Erro na preparação: " . $con->error;
            }
            $stmt->bind_param("iss", $id, $titulo, $poster);
            if ($stmt->execute()) {
                //echo "Filme inserido com sucesso.";
            } else {
                //echo "Erro ao inserir filme: " . $stmt->error;
            }
        }
        else{
            //echo "erro titulo.";
        } 
    }
    else{
        //echo "erro.";
    }
    header('Location: inserirFilme.php');
    exit;
?>