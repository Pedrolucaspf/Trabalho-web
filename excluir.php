<?php
    session_start();
    include("conexao.php");
    $email = $_SESSION['email'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $sql = "DELETE from usuario where email = ?";
        $stmt = $con->prepare($sql);
        if($stmt === false){
            header('Location: index.php');
            exit;
        }

    $stmt->bind_param("s", $email);

    }   
    if($stmt->execute()){
        session_destroy();
        
    }
    header('Location: index.php');
    exit;
?>