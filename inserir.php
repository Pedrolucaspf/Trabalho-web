<?php
    session_start();
    include("conexao.php");
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $sobre = $_POST["sobre"];
    }
    
    //Verificar se username já foi cadastrado
    $sql = "SELECT count(*) as total from usuario where username = '$username'";
    $resul = $con->query($sql);
    $row = mysqli_fetch_assoc($resul);
    if ($row['total'] == 1){
        $_SESSION['username_existe'] = true;
        header('Location: cadastro.php');
        exit;
    }


    //Verificar se email já foi cadastrado
    $sql2 = "SELECT count(*) as total from usuario where email = '$email'";
    $resul2 = $con->query($sql2);
    $row = mysqli_fetch_assoc($resul2);
    if ($row['total'] == 1){
        $_SESSION['email_existe'] = true;
        header('Location: cadastro.php');
        exit;
    }

    // Aqui são inseridas no banco de dados as informações passadas pelo usuário.
    $query = "INSERT INTO usuario (username, email, senha, sobre) values (?,?,?,?)";

    $stmt = $con->prepare($query);
    if($stmt === false){
        //die("Erro na preparação: " . $con->error);
    }

    $stmt->bind_param("ssss", $username, $email, $senha, $sobre);
    $stmt->execute();
    $stmt->close();
    $con->close();
    $_SESSION['status_cadastro'] = true;
    $_SESSION['email'] = $email;
    $_SESSION['valido'] = true;
    header('Location: sobre.php');
    exit;
?>