<?php
session_start();
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'atendimento') {
    header('Location: login.php?tipo=atendimento');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamburgueria</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <h1>Gestão Burgueir Mágico</h1>
    </header>

<section class="hero">
    <div class="box-txt">
      
        <h2>Atendimento</h2>
              
        <a href="mesa1.php" class="btn-hero">Mesa 01</a>
        <a href="mesa1.php" class="btn-hero">Mesa 02</a> 
        <a href="mesa1.php" class="btn-hero">Mesa 03</a>
        <a href="mesa1.php" class="btn-hero">Mesa 04</a>
        <a href="mesa1.php" class="btn-hero">Mesa 05</a> 
           
        <a href="index.html" class="btn-voltar">Voltar</a>      
                
    </div>
    <div class="box-img">
        <img src="img/logo.png" style="width: 500px; height: auto;">
    </div>
</section>

<footer>

<p>2025 © Hamburgueria Temárica Burgueir Mágico. Todos os direitos reservados.</p>

</footer>

</body>
</html>