<?php
// Pegando os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$celular = $_POST['celular'];

require_once 'config.php';

// Preparando o comando
$smtp = $conn->prepare("INSERT INTO cliente (nome, email, celular) VALUES (?, ?, ?)");
$smtp->bind_param("sss", $nome, $email, $celular);

// Executando e verificando
if($smtp->execute()) {
    
    header("Location: sucesso_cliente.html");
    exit(); 
} else {
    echo "Erro de mensagem: " . $smtp->error;
}

// Fechando conexões
$smtp->close();
$conn->close();
?>