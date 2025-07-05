<?php
    include 'conexao.php';
    if(isset($_POST['cadastro'])){
        $nome = $_POST['username'];
        $email =$_POST['email'];
        $senha =$_POST['senha'];
        $sobre =$_POST['sobre'];
        $foto =$_POST['foto'];

        $query = "INSERT INTO aluno (nickname, email, senha, sobre, fotoperfil) values (?,?,?,?,?)";
        $stmt = $con->prepare($query);
        if($stmt === false){
            die("Erro na preparação: " . $con->error);
        }

        $stmt->bind_param("ssss", $name, $email, $senha, $sobre, $foto);

        if(!$stmt->execute()){
            echo "Erro ao inserir: " . $stmt->error;
        }
    }
?>