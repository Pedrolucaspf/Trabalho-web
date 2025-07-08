<?php
session_start();
include("conexao.php");

// 1. Verificar se o usuário está logado
if (!isset($_SESSION['valido']) || !isset($_SESSION['email'])) {
    $_SESSION['erro_login'] = "Você precisa estar logado para fazer uma resenha.";
    header('Location: login.php');
    exit;
}

// 2. Verificar se o método é POST e se os dados existem
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idFilme'], $_POST['nota'], $_POST['texto'])) {
    $idFilme = (int)$_POST['idFilme'];
    $nota = (float)$_POST['nota'];
    $texto = trim($_POST['texto']);
    $email = $_SESSION['email'];

    // Validar dados
    if ($idFilme <= 0 || $nota < 0 || $nota > 10 || empty($texto)) {
        $_SESSION['erro_resenha'] = "Por favor, preencha todos os campos corretamente.";
        header('Location: filme.php?id=' . $idFilme);
        exit;
    }

    // 3. Obter o ID do usuário
    $sql_user = "SELECT id FROM usuario WHERE email = ?";
    $stmt_user = $con->prepare($sql_user);
    $stmt_user->bind_param("s", $email);
    $stmt_user->execute();
    $result_user = $stmt_user->get_result();

    if ($result_user->num_rows > 0) {
        $user = $result_user->fetch_assoc();
        $idUsuario = $user['id'];

        // 4. Inserir a resenha
        $sql_insert = "INSERT INTO resenha (idfilme, idusuario, conteudo, nota) VALUES (?, ?, ?, ?)";
        $stmt_insert = $con->prepare($sql_insert);
        if ($stmt_insert) {
            $stmt_insert->bind_param("iisd", $idFilme, $idUsuario, $texto, $nota);
            if ($stmt_insert->execute()) {
                $_SESSION['sucesso_resenha'] = "Resenha enviada com sucesso!";

                // ***** NOVO CÓDIGO COMEÇA AQUI *****
                // Após inserir, recalcula e atualiza a nota média do filme
                
                // 1. Calcula a nova média
                $sql_avg = "SELECT AVG(nota) as media FROM resenha WHERE idfilme = ?";
                $stmt_avg = $con->prepare($sql_avg);
                $stmt_avg->bind_param("i", $idFilme);
                $stmt_avg->execute();
                $result_avg = $stmt_avg->get_result()->fetch_assoc();
                $novaMedia = $result_avg['media'];
                $stmt_avg->close();

                if ($novaMedia !== null) {
                    // 2. Atualiza a tabela 'filme' com a nova média
                    $sql_update_filme = "UPDATE filme SET nota_media = ? WHERE id = ?";
                    $stmt_update = $con->prepare($sql_update_filme);
                    // Usamos "d" para double/decimal
                    $stmt_update->bind_param("di", $novaMedia, $idFilme);
                    $stmt_update->execute();
                    $stmt_update->close();
                }
                // ***** NOVO CÓDIGO TERMINA AQUI *****

            } else {
                $_SESSION['erro_resenha'] = "Erro ao enviar a resenha. Tente novamente.";
            }
            $stmt_insert->close();
        } else {
            $_SESSION['erro_resenha'] = "Erro na preparação da consulta.";
        }
    } else {
        $_SESSION['erro_resenha'] = "Usuário não encontrado.";
    }

    $stmt_user->close();
    $con->close();

    header('Location: filme.php?id=' . $idFilme);
    exit;
} else {
    header('Location: index.php');
    exit;
}
?>