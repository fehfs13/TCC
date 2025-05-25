<?php

$dbHost = 'localhost';
$dbUsername = 'root';
$dbSenha = '';
$dbNome = 'cadastro';

$conn = new mysqli($dbHost, $dbUsername, $dbSenha, $dbNome);

if($conn->connect_error){
    die("Falha ao se comunicar com o banco de dados: ".$conn->connect_error);
}

?>