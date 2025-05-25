<?php
// Pegando os dados do formulário
$produto = $_POST['produto'];
$quantidade = $_POST['quantidade'];
$custo = $_POST['custo'];
$margem = $_POST['margem'];

require_once 'config.php';

// Preparando o comando
$smtp = $conn->prepare("INSERT INTO produtos (produto, quantidade, custo, margem) VALUES (?, ?, ?, ?)");
$smtp->bind_param("sidi", $produto, $quantidade, $custo, $margem);

// Executando e verificando
if($smtp->execute()) {
    // Redirecionar para index.html após sucesso
    header("Location: sucesso_cadastro.html");
    exit(); // É importante usar exit depois do header para parar o script
} else {
    echo "Erro de mensagem: " . $smtp->error;
}

// Fechando conexões
$smtp->close();
$conn->close();
?>