<?php
    $host = "localhost:3308";
    $dbname = "filmesbase";
    $user = "root";
    $pass = "";

    $con = new mysqli($host, $user, $pass, $dbname);

    if($con->connect_error){
        echo "Erro ao conectar: ".$con->connect_error;
    }
    else{
        //echo "Conectado com sucesso.";
    }
?>