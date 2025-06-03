<?php
$tipo = $_GET['tipo'] ?? '';
if (!in_array($tipo, ['geral', 'atendimento'])) {
    echo "<h3>Tipo de acesso inválido.</h3>";
    echo '<a href="index.html">Voltar</a>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Burgueir Mágico</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff8e1;
            margin: 0;
            padding: 0;
        }
        header {
            background-color:rgb(5, 5, 5);
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .hero {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }
        .box-txt {
            background-color: #fff;
            border-radius: 12px;
            padding: 40px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .login-box h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }
        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        .login-box input[type="submit"] {
            width: 100%;
            background-color: rgb(68, 47, 9);
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }
        .login-box input[type="submit"]:hover {
            background-color:  rgb(68, 47, 9);
        }
        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #007bff;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<header>
    <h1>Gestão Burgueir Mágico</h1>
</header>

<section class="hero">
    <div class="box-txt">
        <div class="login-box">
            <h2>Login - <?= ucfirst($tipo) ?></h2>
            <form action="valida_login.php" method="POST">
                <input type="hidden" name="tipo" value="<?= htmlspecialchars($tipo) ?>">
                <input type="text" name="usuario" placeholder="Usuário" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <input type="submit" value="Entrar">
            </form>

            
            </div>
            <p>  </p>

            <a href="index.html" class="btn-voltar">Voltar</a> 
    </div>
</section>

<footer>

<p>2025 © Hamburgueria Temárica Burgueir Mágico. Todos os direitos reservados.</p>

</footer>

</body>
</html>
