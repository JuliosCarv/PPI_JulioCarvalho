<?php 

    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPasswaord = '';
    $dbName = 'cadastro';

    $conexao = new $mysqli($dbHost, $dbUsername, $dbPasswaord, $dbName);

    //if($conexao->connect_errno)
    //{
    //    echo "Erro";   
    //}
    //else
    //{
    //    echo "Conexão efetuada com sucesso";
    //}
?>