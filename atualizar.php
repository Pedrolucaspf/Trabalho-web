<?php
    session_start();
    include("conexao.php");
    $email = $_SESSION['email'];
    $sql="SELECT * from usuario where email = '$email'";
    $resul = $con->query($sql);
    $dados = $resul->fetch_assoc();
    
    $id = $dados['id'];
    if(isset($id)){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $sobre = $_POST["sobre"];
        if(empty($username)){
            $username = $dados['username'];
        }
        if(empty($email)){
            $email = $email;
        }
        if(empty($senha)){
            $senha = $dados['senha'];
        }
        if(empty($sobre)){
            $sobre = $dados['sobre'];
        }
        $sql = "UPDATE usuario set username = ? , email = ?, senha = ?, sobre = ? where id = ".$id;
        $stmt = $con->prepare($sql);
        if($stmt === false){
             header('Location: meuperfil.php');
            exit;
        }
        $stmt->bind_param("ssss", $username, $email, $senha, $sobre);

        if($stmt->execute()){
            $_SESSION['atualizado'] = true;
            $_SESSION['email'] = $email;
        }            
    }
    $con->close();
    header('Location: meuperfil.php');
    exit;
?>