<?php
    session_start();
    include("conexao.php");
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST["email"];
        $senha = $_POST["senha"];
    }
    // Aqui é verificado se existe esse email e senha no banco de dados
    // Se existir, retorna 1. Se não, retorna 0.

    $sql = "SELECT * from usuario where email = '$email' and senha = '$senha'";
    $resul = $con->query($sql);
    $row = mysqli_num_rows($resul);
    if ($row == 1){
        $_SESSION['valido'] = true;
        $_SESSION['email'] = $email;
        header('Location: sobre.php');
        exit;
    }else{
        $_SESSION['invalido'] = true;
        unset($SESSION['valido']);
        header('Location: login.php');
        exit;
    }

?>