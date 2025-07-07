<?php
    session_start();
    include("conexao.php");
    $email = $_SESSION['email'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $senha = $_POST['senha'];
    }
    $sql = "SELECT * from usuario where email = '$email' and senha = '$senha'";
    $resul = $con->query($sql);
    $row = mysqli_num_rows($resul);
    if ($row == 1){
        header('Location: gerenciardados.php');
        exit;
    }else{
        $_SESSION['incorreto'] = true;
    }
    $con->close();
    header('Location: meuperfil.php');
    exit;
?>