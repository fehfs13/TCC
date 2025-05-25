<?php
session_start();
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'geral') {
    header('Location: login.php?tipo=geral');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão Burgueir Mágico</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<header>
    <h1>Gestão Burgueir Mágico</h1>
</header>

<section class="hero">
    <div class="box-txt">
        <h2>Gestão Geral</h2>
        
            <a href="cadastro.html" class="btn-hero">Cadastrar Item </a>
            <a href="cadastrado.php" class="btn-hero">Estoque </a> 
            <a href="fluxo.php" class="btn-hero">Fluxo de Caixa </a> 
            <a href="manutencao.php" class="btn-hero">Configurações</a>

        <a href="index.html" class="btn-voltar">Voltar </a>     
    </div>

    <div class="box-img">
        <img src="img/logo.png" style="width: 500px; height: auto;">
    </div>
</section>

<footer>
    <p>2025 © Hamburgueria Temática Burgueir Mágico. Todos os direitos reservados.</p>
</footer>

</body>
</html>