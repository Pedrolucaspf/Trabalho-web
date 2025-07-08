<?php
    session_start();
    include("conexao.php");
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $sobre = $_POST["sobre"];
    }
    
    $sql = "SELECT count(*) as total from usuario where username = '$username'";
    $resul = $con->query($sql);
    $row = mysqli_fetch_assoc($resul);
    if ($row['total'] == 1){
        $_SESSION['username_existe'] = true;
        header('Location: cadastro.php');
        exit;
    }


    $sql2 = "SELECT count(*) as total from usuario where email = '$email'";
    $resul2 = $con->query($sql2);
    $row = mysqli_fetch_assoc($resul2);
    if ($row['total'] == 1){
        $_SESSION['email_existe'] = true;
        header('Location: cadastro.php');
        exit;
    }

    $query = "INSERT INTO usuario (username, email, senha, sobre) values (?,?,?,?)";

    $stmt = $con->prepare($query);
    if($stmt === false){

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