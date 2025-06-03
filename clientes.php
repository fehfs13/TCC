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
    <h1>Olá, cadastre-se para interagir com a nossa casa!</h1>
</header>

<section class="hero">
    <div class="box-txt">
        <h2>Insira seus dados.</h2>
        
        <form class="formulario" action="cadastroclientes.php" method="post">
            
            <p> Nome Completo:<input type="text" name="nome" placeholder="Nome Completo" required> </p>
            <p> e-mail: <input type="text" name="email" placeholder="e-mail" required> </p>
            <p> Celular: <input type="text" name="celular" placeholder="Celular" required> </p>
            
            <p>  <input type="submit" value="Cadastrar" class="btn-hero"> </p>

        </form>

  
    </div>

<div class="box-img">
    <video width="500" height="281" controls autoplay muted>
        <source src="img/video.mp4" type="video/mp4">
        
    </video>
</div>
</section>

<footer>
    <p>2025 © Hamburgueria Temática Burgueir Mágico. Todos os direitos reservados.</p>
</footer>

</body>
</html>